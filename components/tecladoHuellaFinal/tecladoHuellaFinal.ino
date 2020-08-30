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
uint8_t id;  // para guardar huella

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
    
    finger.getTemplateCount();

      // fin conexion con sensor
}


// id para el dedo   
uint8_t readnumber(void) {
  uint8_t num = 0;
  
  if (finger.templateCount == 0) {
      //Serial.print("Sensor doesn't contain any fingerprint data. Please run the 'enroll' example.");
      num = 1;
    } 
    else {
      //Serial.println("Waiting for valid finger...");
      //Serial.print("Sensor contains "); Serial.print(finger.templateCount); Serial.println(" templates");
      num = finger.templateCount;
    }  

    return num;
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
   } if (counter == 3)
   {
    id = readnumber() +1;
    if (id !=0){
      while (!  getFingerprintEnroll() );
      counter = 4 ;
      id = 0;
      
    }
    
   } if (counter ==4)
   {
    Serial.println("fin enrroll");
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
///////////////////////// no tocar perro qlao  fin scan hola enroll
////////////////////////////////////////////////////////////////////



uint8_t getFingerprintEnroll() {

  int p = -1;
  Serial.print("Waiting for valid finger to enroll as #"); Serial.println(id);
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      //Serial.println(".");
      break;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      break;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Imaging error");
      break;
    default:
      Serial.println("Unknown error");
      break;
    }
  }

  // OK success!

  p = finger.image2Tz(1);
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image converted");
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
  
  Serial.println("Remove finger");
  delay(2000);
  p = 0;
  while (p != FINGERPRINT_NOFINGER) {
    p = finger.getImage();
  }
  Serial.print("ID "); Serial.println(id);
  p = -1;
  Serial.println("Place same finger again");
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      //Serial.print(".");
      break;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      break;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Imaging error");
      break;
    default:
      Serial.println("Unknown error");
      break;
    }
  }

  // OK success!

  p = finger.image2Tz(2);
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image converted");
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
  Serial.print("Creating model for #");  Serial.println(id);
  
  p = finger.createModel();
  if (p == FINGERPRINT_OK) {
    Serial.println("Prints matched!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_ENROLLMISMATCH) {
    Serial.println("Fingerprints did not match");
    return p;
  } else {
    Serial.println("Unknown error");
    return p;
  }   
  
  Serial.print("ID "); Serial.println(id);
  p = finger.storeModel(id);
  if (p == FINGERPRINT_OK) {
    Serial.println("Stored!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_BADLOCATION) {
    Serial.println("Could not store in that location");
    return p;
  } else if (p == FINGERPRINT_FLASHERR) {
    Serial.println("Error writing to flash");
    return p;
  } else {
    Serial.println("Unknown error");
    return p;
  }   
}

///////////////////////////////////////////////////////////////////
/////////////////// noo tocaarrrrrrrr es el enrollll
