#!/bin/sh

import requests
import os
import numpy as np
import time
import random

nombre = "http://127.0.0.1:8000/api/conexion/"   

sixmab_id = 'ALG001'
celdas = 5
temperatura = 2    
corriente = 1                             
fecha = ''
time_key='time'
url = ''

# temperatura_maxima = 30               temperatura_minima = 25
# corriente_maxima = 100                corriente_minima = 4
# voltaje_maxima = 2.05                 voltaje_minima = 1.7

temperatura_maxima = 30
temperatura_minima = 20

corriente_maxima = 150
corriente_minima = -10

voltaje_maxima = 2.05
voltaje_minima = 1.70

tiempo_ejecucion = 1

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
    
    osip = os.popen('curl ifconfig.me').readline()  
    public_ip = (osip.replace(".","-"))

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

    url = (nombre+str(sixmab_id))

# Concatenate corriente
    for i in range (0,corriente):
        url += '?'+current_key[i]+'='+(str(curr[i]))

# Concatenate temperatura
    for i in range(0,temperatura):
        url +='&'+temp_key[i]+'='+(str(temp[i]))

# Concatenate voltage
    for i in range(0,celdas):
        url +='&'+vol_key[i]+'='+(str(vol[i]))

    rqsString = url
    print(rqsString)
    
    rqs = requests.get(rqsString)
    time.sleep(tiempo_ejecucion)