int boton = 2;
int led = 3;
int rele = 4;
int activado = 0;
int estado = 0;
int estadoAnt = 0;

void setup() {
pinMode(boton, INPUT);
pinMode(led, OUTPUT);
pinMode(rele, OUTPUT);
}

void loop() {
  estado = digitalRead(boton);
  
  if((estado == HIGH) && (estadoAnt == LOW)){
    activado = 1 - activado;
    delay(100);
  }
  estadoAnt = estado;
  if(activado == 1){
      digitalWrite(led, HIGH);
      digitalWrite(rele, HIGH);
      delay(10);
    }else{
      digitalWrite(led, LOW);
      digitalWrite(rele, LOW);
      delay(10);
    }
}
