import random
import string
import pymysql

import pymysql
try:   

    conexion = pymysql.connect(host='186.64.114.115',user='renatolo_test',password='jaja123123jaja',db='renatolo_testCode')
    print("Conexión correcta")
    
except (pymysql.err.OperationalError, pymysql.err.InternalError) as e:
	print("Ocurrió un error al conectar: ", e)

#import mysql.connector


#mydb = mysql.connector.connect(
#  host="localhost",  #ip del servidor
#  user="root",
#  password="",
#  database="*****"   #falta el server
#)

#mycursor = mydb.cursor()


cantidadDeCodigos = 5;
cantidadDeDigitosCodigo = 20
dicc= ["a" , "b" , "c" , "d" ,"e" ,"f" , "g" , "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"]

for codigo in range (0,5):
    code = "";
    for letra in range(0,cantidadDeDigitosCodigo):
        if random.randrange(10)>5:
            code += str(random.randrange(10))
        else:
            code += str(random.choice(dicc))
            
    print (code)


def insertIntoTabla(data):
    sql = "INSERT INTO customers (code) VALUES (%s)"
    mycursor.execute(sql, data)
    mydb.commit()
    print(mycursor.rowcount, "record inserted.")
