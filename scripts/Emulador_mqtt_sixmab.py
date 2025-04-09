#!/bin/sh

import paho.mqtt.client as mqtt
import time 
import requests
import os
import numpy as np
import random
import json

#nombre = "http://190.113.12.36/conexion/api/captar/"     
sixmab_id = "1"    
celdas = 24  
temperatura = 6    
corriente = 1                             
fecha = ''
time_key='time'
url = ''
temperatura_minima = 8.00
temperatura_maxima = 19.00
corriente_minima = 0
corriente_maxima = 95
voltaje_minima = 1.75
voltaje_maxima = 2.00
tiempo_ejecucion = 20

server = "34.94.0.31"
user = "admin-biobusiness"
password = "6s3QGQ4niu5IgWdsuidsi"
port = 1883
keepalive = 600

#------------------------------------------------------------------------------------------------------------------------#
#Funciones de conexión y llegada de mensajes MQTT
#------------------------------------------------------------------------------------------------------------------------#
def on_connect(client, userdata, flags, rc):
    print("Connected with Code: " + str(rc))
    client.subscribe("devices/EternityM001") #Tópico por el cual recibe información

def on_message(client, obj, msg):
    print(str(msg.payload))

#-----------------------------------------------------------------------------------------------------------------------#
#Inicio cliente MQTT
#-----------------------------------------------------------------------------------------------------------------------#
client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

client.connect(server, port, keepalive)
client.username_pw_set(user, password)

client.loop_start()
#------------------------------------------------------------------------------------------------------------------------#
#Genera un arreglo de para el numero de voltaje
#------------------------------------------------------------------------------------------------------------------------#

vol_key = ["" for i in range(celdas)]

for i in range (0,celdas):
    vol_key[i] = 'v'+ (str(i))

vol = np.zeros(celdas) #Setea como estado inicial cero.

#------------------------------------------------------------------------------------------------------------------------#
# Genera un arreglo de para el numero de temperatura
#------------------------------------------------------------------------------------------------------------------------#

temp_key = ["" for i in range(temperatura)]

for i in range(0,temperatura):
    temp_key[i] = 't'+ (str(i))    

temp = np.zeros(temperatura) #Setea como estado inicial cero.

#------------------------------------------------------------------------------------------------------------------------#
# Genera un arreglo de para el numero de corriente
#------------------------------------------------------------------------------------------------------------------------#

current_key = ["" for i in range(corriente)]
current_key = ["" for i in range(corriente)]

for i in range(0,corriente):
    current_key[i] = 'c'    
    
curr = np.zeros(corriente) #Setea como estado inicial cero.

#------------------------------------------------------------------------------------------------------------------------#
# Establecer valores a 0
#------------------------------------------------------------------------------------------------------------------------#

while True:

    for i in range(0,corriente):
        curr[i] = 0.0

    for i in range(0,celdas):
        vol[i] = 0.0

    for i in range(0,temperatura):
        temp[i] = 0.0

#------------------------------------------------------------------------------------------------------------------------#
# obtener ip publica
#------------------------------------------------------------------------------------------------------------------------#
    
    #osip = os.popen('curl ifconfig.me').readline()  
    #public_ip = (osip.replace(".","-"))

#------------------------------------------------------------------------------------------------------------------------#
# asignar valores al arreglo
#------------------------------------------------------------------------------------------------------------------------#

    for i in range(0, temperatura):
        temp[i] = round(random.uniform(temperatura_minima, temperatura_maxima), 2)
    
    for i in range(0, celdas):
        vol[i] = round(random.uniform(voltaje_minima, voltaje_maxima), 2)

    for i in range(0, corriente):
        curr[0] = round(random.uniform(corriente_minima, corriente_maxima), 2)

#------------------------------------------------------------------------------------------------------------------------#
# Obtener fecha y hora
#------------------------------------------------------------------------------------------------------------------------#

    fecha = (time.strftime("time=%d-%m-%Y - %H:%M:%S"))

#------------------------------------------------------------------------------------------------------------------------#
# Construir la URL
#------------------------------------------------------------------------------------------------------------------------#
    data = {}
    data['id'] = sixmab_id
    #url = ('Id=' + str(sixmab_id))

# Concatenate corriente
    for i in range (0,corriente):
        data[current_key[i]] = curr[i]
        #url += '?'+current_key[i]+'='+(str(curr[i]))

# Concatenate temperatura
    for i in range(0,temperatura):
        data[temp_key[i]] = temp[i]
        #url +='&'+temp_key[i]+'='+(str(temp[i]))

# Concatenate voltage
    for i in range(0,celdas):
        data[vol_key[i]] = vol[i]
        #url +='&'+vol_key[i]+'='+(str(vol[i]))

    #rqsString = url
    to_json= json.dumps(data)
    #print(rqsString)
    print(to_json)
    #rqs = requests.get(rqsString)
    client.publish("devices/EternityM001", to_json) #Envía datos al Topico EQUIPO_SIXMAB
    print("Message sent")
    time.sleep(tiempo_ejecucion)
client.loop_stop()
client.disconnect()
