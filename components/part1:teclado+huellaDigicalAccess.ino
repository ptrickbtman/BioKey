#include "Keypad.h"
#include <Adafruit_Fingerprint.h>

// capturamos los pines del lector de huella
SoftwareSerial mySerial(9, 10);
Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);

// necesitamos conexion de 5v y tierra


// capturamos los pines del teclado
const byte ROWS = 4; 
const byte COLS = 3; 




// arquitectura teclado

char keys[ROWS][COLS] = {
{'1','2','3'},
{'4','5','6'},
{'7','8','9'},
{'*','0','#'}
};

 byte rowPins[ROWS] = {2,3,4,5}; 
 byte colPins[COLS] = {6, 7, 8}; 



////// led
const int ledPIN = 11;

// Lector
// bool scanning = false; opcional while()
int countIntent = 0;

//to loop general
 int counter = 0;


// keybord pass
 char passwrd[7];
 char cst[7]="*1998#";
 int countKeyboard = 0;
 int countErrorKeyboardPass = 0;


Keypad keypad = Keypad(makeKeymap(keys), rowPins, colPins, ROWS, COLS);



///// comenzamos asdasd

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
   

   //getFingerprintID();
   //delay(100); 


   

   if (counter ==0)
   {
    char keyPress = keypad.getKey();
   if (keyPress){
       if (String(keyPress) == "*" ){
          Serial.println("Capturando huella ...");
          counter =1;
          
       } 
    }
   }else if (counter==1)
   {   

       if (countIntent > 4){
        counter =2;
       }
    
       while(countIntent< 5){
          //data = getFingerprintID();
          //delay(50);

          
          
          if (getFingerprintID() == -1 ){
               Serial.println("Error de lector");
          }
          
          if(getFingerprintID() == 3){
            Serial.println("paso");
            counter =0;
            abrir();
            break;
          }

          if(getFingerprintIDez() == 3){
            Serial.println("paso");
            counter =0;
            abrir();
            break;
          }


          if (getFingerprintIDez()== -2){
             
             
            countIntent +=1;
            Serial.print("intento: ");
            Serial.print(countIntent);
            Serial.println(" de 5");
          }
       }
       
   }if (counter ==2)
   {  

     if (countErrorKeyboardPass==3){
        while(1)
        {
        Serial.println("bloqueado");
        }
      }
     if (countKeyboard == 6 && countErrorKeyboardPass<3){ // cambiar por el valor el largo de la contraseña final
         abrir();
         counter == 0;

     }
     char key = keypad.getKey();
     if (key and countErrorKeyboardPass!=3 ){
       //Serial.println(key);
        
        if (cst[countKeyboard] ==  key )
        {
          countKeyboard+=1;
          Serial.print("*");
        }else if (cst[countKeyboard] !=  key) {
           countKeyboard=0;
           countErrorKeyboardPass +=1; 
           Serial.println("");
           Serial.print("Intento: ");Serial.print(countErrorKeyboardPass); Serial.println(" de 3");
         }
        
        
        
    }
   }
   
   
   
 }


 void abrir()
 {
   digitalWrite(ledPIN , HIGH);   // poner el Pin en HIGH
   delay(1000);                   // esperar un segundo
   digitalWrite(ledPIN , LOW);    // poner el Pin en LOW
   delay(1000); 
  
 }


//************************************************************+
//////////////////////////////////////////////////////////////
///////////////////////// no tocar perro qlao
//////////////////////////////////////////////////////////////

uint8_t getFingerprintID() {
  uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:
      //Serial.println("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      //Serial.println("No finger detected");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Imaging error");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }

  // OK success!

  p = finger.image2Tz();
  switch (p) {
    case FINGERPRINT_OK:
      //Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Could not find fingerprint features");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }
  
  // OK converted!
  p = finger.fingerFastSearch();
  if (p == FINGERPRINT_OK) {
    //Serial.println("Found a print match!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_NOTFOUND) {
    Serial.println("Did not find a match");
    return -2;
  } else {
    Serial.println("Unknown error");
    return p;
  }   
  
  // found a match!
  Serial.print("Found ID #"); Serial.print(finger.fingerID); 
  //Serial.print(" with confidence of "); Serial.println(finger.confidence); 

  //return finger.fingerID;
    return 3; 
}

// returns -1 if failed, otherwise returns ID #
int getFingerprintIDez() {
  uint8_t p = finger.getImage();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.image2Tz();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.fingerFastSearch();
  if (p != FINGERPRINT_OK)  return -2;
  
  // found a match!
  Serial.print("Found ID #"); Serial.print(finger.fingerID); 
  //Serial.print(" with confidence of "); Serial.println(finger.confidence);
  //return finger.fingerID; 
  return 3; 
}

////////////////////////////////////////////////////////////////////////
////*******************************************************************
////////////////////////////////////////////////////////////////////
///////////////////////// no tocar perro qlao
////////////////////////////////////////////////////////////////////
