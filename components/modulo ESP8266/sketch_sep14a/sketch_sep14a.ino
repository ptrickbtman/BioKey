#include <EEPROM.h>
#include <SoftwareSerial.h>
#include <ArduinoJson.h>

SoftwareSerial SerialESP8266(3, 2); // RX, TX
//datos cerraduras
int IDCerr = 1;
int IDUsu = 0;
String pin = "";
char cst[7] = "*1998#";

//datos conexion
String ssid = "AndradesS";
String pass = "Ab1Cd2Ef30";

//variables para conexion y consultas
int estadoCon = 0;
long tiempo_inicio = 0;
String peticionHTTP = "";
String cadena = "";



void setup() {

  SerialESP8266.begin(9600);
  Serial.begin(9600);
  SerialESP8266.setTimeout(2000);

  SerialESP8266.println("AT+RST");
  if (SerialESP8266.find("OK")) { //checkeo de conexion con modulo ESP8266
    Serial.println("Respuesta AT correcto");
  } else {
    Serial.println("Error en ESP8266");
  }
  SerialESP8266.println("AT+CWMODE=1");
  if (SerialESP8266.find("OK")) {
    Serial.println("ESP8266 en modo Estacion");
  }
  Serial.println("");
  Serial.println("");
  Serial.println("");
  delay(1000);
  conectar();
  delay(1000);


}


void loop() {
  //actualizar();
  //agregarRegistro("1");
  //agregarRegistro("2");
}




void conectar()//conexion a red wifi
{
  if (estadoCon == 0) {
    SerialESP8266.println("AT+CWJAP=\"" + ssid + "\",\"" + pass + "\"");
    Serial.println("Conectandose a la red " + ssid);
    SerialESP8266.setTimeout(10000);
    if (SerialESP8266.find("OK")) {
      Serial.println("WIFI conectado");
      SerialESP8266.setTimeout(2000);
      SerialESP8266.println("AT+CIPMUX=0");
      if (SerialESP8266.find("OK")) {
        Serial.println("Multiconexiones deshabilitadas");
      }
      estadoCon = 1;
    } else {
      Serial.println("Error al conectarse en la red");
    }


  }
  delay(1000);
}

void actualizar() {//actualiza y trae datos para el funcionamiento de la cerradura
  if ( estadoCon == 1) {
    SerialESP8266.println("AT+CIPSTART=\"TCP\",\"192.168.18.10\",80");//IP de XAMPP server (LAN)
    if ( SerialESP8266.find("OK")) {
      Serial.println("ESP8266 conectado con el servidor");

    }
    peticionHTTP = "GET /webSite/actualizarCerr.php?idc=" + String(IDCerr) + " HTTP/1.1\r\nHost: 192.168.0.3\r\n";
    SerialESP8266.print("AT+CIPSEND=");
    SerialESP8266.println(peticionHTTP.length() + 4);
    if (SerialESP8266.find(">"))
    {
      Serial.println("Enviando HTTP . . .");
      SerialESP8266.println(peticionHTTP + "\r\n\r\n\r\n");
      if ( SerialESP8266.find("OK"))
      {
        estadoCon = 2;
        Serial.println("Peticion HTTP enviada:");
        Serial.println();
        Serial.println(peticionHTTP);
        Serial.println("Esperando respuesta");

        tiempo_inicio = millis();
        cadena = "";

        while (estadoCon == 2)
        {
          while (SerialESP8266.available() > 0)
          {
            char c = SerialESP8266.read();
            Serial.write(c);
            cadena.concat(c);
          }
          if (cadena.length() > 500)
          {
            Serial.println("La respuesta a excedido el tamaño maximo");

            SerialESP8266.println("AT+CIPCLOSE");
            if ( SerialESP8266.find("OK"))
              Serial.println("Conexion finalizada");
            estadoCon = 3;
          }
          if ((millis() - tiempo_inicio) > 10000) //Finalizamos si ya han transcurrido 10 seg
          {
            Serial.println("Tiempo de espera agotado");
            SerialESP8266.println("AT+CIPCLOSE");
            if ( SerialESP8266.find("OK"))
              Serial.println("Conexion finalizada");
            estadoCon = 3;
          }
          if (cadena.indexOf("CLOSED") > 0)
          {
            Serial.println();
            Serial.println("Cadena recibida correctamente, conexion finalizada");
            estadoCon = 3;
          }
        }
        Serial.println();
        Serial.println();
        if (cadena.substring(cadena.indexOf("-0#") + 3, cadena.indexOf("#0-")) == "error") {
          Serial.println("No se pudo actualizar cerradura");
        } else {

          cadena = cadena.substring(cadena.indexOf("-0#") + 3, cadena.indexOf("#0-"));
          ssid = cadena.substring(0, cadena.indexOf(","));
          pass = cadena.substring(cadena.indexOf(",") + 1, cadena.indexOf(";"));
          Serial.println(ssid);
          Serial.println(pass);
          estadoCon = 0;
          conectar();
          estadoCon = 3;
          Serial.println("Cerradura actualizada");
        }
      }
    }
  }
}

void agregarRegistro(String tipoRegistro) {//Crea registros de cerraduras en la base de datos (1 = Acceso permitido; 2 = Acceso denegado)
  if ( estadoCon == 1) {
    SerialESP8266.println("AT+CIPSTART=\"TCP\",\"192.168.18.10\",80");//IP de XAMPP server (LAN)
    if ( SerialESP8266.find("OK")) {
      Serial.println("ESP8266 conectado con el servidor");

    }
    peticionHTTP = "GET /webSite/agregarRegistroCerr.php?idc=" + String(IDCerr) + "&idt=" + tipoRegistro + " HTTP/1.1\r\nHost: 192.168.0.3\r\n";
    SerialESP8266.print("AT+CIPSEND=");
    SerialESP8266.println(peticionHTTP.length() + 4);
    if (SerialESP8266.find(">"))
    {
      Serial.println("Enviando HTTP . . .");
      SerialESP8266.println(peticionHTTP + "\r\n\r\n\r\n");
      if ( SerialESP8266.find("OK"))
      {
        Serial.println("Peticion HTTP enviada:");
        Serial.println();
        Serial.println(peticionHTTP);
        Serial.println("Esperando respuesta");
        estadoCon = 2;
        tiempo_inicio = millis();
        cadena = "";

        while (estadoCon == 2)
        {
          while (SerialESP8266.available() > 0)
          {
            char c = SerialESP8266.read();
            Serial.write(c);
            cadena.concat(c);
          }
          if (cadena.length() > 500)
          {
            Serial.println("La respuesta a excedido el tamaño maximo");

            SerialESP8266.println("AT+CIPCLOSE");
            if ( SerialESP8266.find("OK"))
              Serial.println("Conexion finalizada");
            estadoCon = 3;
          }
          if ((millis() - tiempo_inicio) > 10000) //Finalizamos si ya han transcurrido 10 seg
          {
            Serial.println("Tiempo de espera agotado");
            SerialESP8266.println("AT+CIPCLOSE");
            if ( SerialESP8266.find("OK"))
              Serial.println("Conexion finalizada");
            estadoCon = 3;
          }
          if (cadena.indexOf("CLOSED") > 0)
          {
            Serial.println();
            Serial.println("Cadena recibida correctamente, conexion finalizada");
            estadoCon = 3;
          }
        }
        Serial.println();
        Serial.println();
        if (cadena.substring(cadena.indexOf("-0#") + 3, cadena.indexOf("#0-")) == "error") {
          Serial.println("No se pudo agregar el registro");
        } else {

          cadena = cadena.substring(cadena.indexOf("-0#") + 3, cadena.indexOf("#0-"));

          Serial.println(cadena);
        }
      }
    }
  }
}
