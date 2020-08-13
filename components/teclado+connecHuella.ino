
#include "Keypad.h"
#include <Adafruit_Fingerprint.h>

// capturamos los pines del lector de huella
SoftwareSerial mySerial(2, 3);
Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);
// necesitamos conexion de 5v y tierra

// capturamos los pines del teclado
const byte ROWS = 4; 
const byte COLS = 3; 


char keys[ROWS][COLS] = {
{'1','2','3'},
{'4','5','6'},
{'7','8','9'},
{'*','0','#'}
};

 byte rowPins[ROWS] = {2,3,4,5}; 
 byte colPins[COLS] = {6, 7, 8}; 

Keypad keypad = Keypad(makeKeymap(keys), rowPins, colPins, ROWS, COLS);


 void setup()
{
    Serial.begin(9600);
    int contador = 0;

    // comprobar conexion con el sensor
    while (!Serial);
      delay(100);
    finger.begin(57600);
    delay(5);
    if (finger.verifyPassword()) {
      Serial.println("Sensor encontrado");
    } else {
    Serial.println("Sensor no esta conectado :(");
    while (1) { delay(1); }
    }

    // fin conexion con sensor
}

void loop()
{
   char keyPress = keypad.getKey();
   if (keyPress){
       if (String(keyPress) == "*" ){
          Serial.println("Capturando huella ...");
       } 
    }
}
