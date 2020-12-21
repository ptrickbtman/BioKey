#include "Keypad.h"
#include <Adafruit_Fingerprint.h>
#include <SoftwareSerial.h>
SoftwareSerial SerialESP8266(13, 12);
//datos cerraduras

int IDCerr = 1;
String pin = "";
//datos conexion
String ssid = "AndradesS";
String pass = "Ab1Cd2Ef30";

//variables para conexion y consultas
int estadoCon = 0;
long tiempo_inicio = 0;
String peticionHTTP = "";
String cadena = "";

/*
SoftwareSerial mySerial(9, 10);
Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);
*/



void setup() {
  /*
   while (!Serial);
    delay(100);
    finger.begin(57600);
    delay(100);
    if (finger.verifyPassword()) {
      Serial.println("Sensor encontrado");
    } else {
      Serial.println("Sensor no esta conectado :(");
      while (1) {
        delay(1);
      }
    }
   
  */
  SerialESP8266.begin(9600);
  Serial.begin(9600);
  SerialESP8266.setTimeout(2000);

  SerialESP8266.println("AT");
  if (SerialESP8266.find("OK")) { //checkeo de conexion con modulo ESP8266
    Serial.println("Respuesta AT correcto");
  } else {
    Serial.println("Error en ESP8266");
  }
  SerialESP8266.println("AT+CWMODE=1");
  if (SerialESP8266.find("OK")) {
    Serial.println("ESP8266 en modo Estacion");
  }
  SerialESP8266.println("AT+CIPMUX=0");
  if (SerialESP8266.find("OK")) {
    Serial.println("multiconexiones deshabilitadas");
  }
  Serial.println("");
  Serial.println("");
  Serial.println("");
  delay(1000);
  conectar();
  delay(1000);
/*
  finger.available(); 
  delay(100);
  finger.begin(57600);
  delay(5);
  if (finger.verifyPassword()) {
    Serial.println("Sensor encontrado");
  } else {
    Serial.println("Sensor no esta conectado :(");
    while (1) {
      delay(1);
    }
  
*/
}

void loop(){
  
 peticionPHP("actualizarCerr.php?idc=" + String(IDCerr)); //actualizar
 
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


void peticionPHP(String ruta) {//interaciones con la bd

  if ( estadoCon == 1) {
    SerialESP8266.println("AT+CIPSTART=\"TCP\",\"192.168.18.10\",80");//IP de XAMPP server (LAN)
    if ( SerialESP8266.find("CONNECT")) {
      Serial.println("ESP8266 conectado con el servidor");

      peticionHTTP = "GET /BioKey/BioKey/webSite/controller/" + ruta + " HTTP/1.1\r\nHost: 192.168.18.10\r\n";
      SerialESP8266.print("AT+CIPSEND=");
      SerialESP8266.println(peticionHTTP.length() + 10);
      if (SerialESP8266.find(">"))
      {
        Serial.println("Enviando HTTP . . .");
        SerialESP8266.println(peticionHTTP + "\r\n\r\n\r\n\r\n\r\n");
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
            Serial.println("Error en php");
          } else if (cadena.substring(cadena.indexOf("-0#") + 3, cadena.indexOf("#0-")) == "Agregado") {
            Serial.println("Registro agregado");
          } else {
            cadena = cadena.substring(cadena.indexOf("-0#") + 3, cadena.indexOf("#0-"));
            ssid = cadena.substring(0, cadena.indexOf(","));
            pass = cadena.substring(cadena.indexOf(",") + 1, cadena.indexOf(";"));
            estadoCon = 3;
            Serial.println("Cerradura actualizada");
          }
        }
      }
    } else {
      Serial.println("Error al conectar con el servidor");
    }
  }
}
