import urllib.request
import json
import serial
from time import sleep

print('Welcome to Freeways Server controller!')

port = 'COM10'
lastSentData = None

ser = serial.Serial(port)
while(True):
    
    try:
        resp = urllib.request.urlopen("http://169.254.102.215/api.php?json=1&set=0")
        data = json.load(resp)
        if data != lastSentData:
            lastSentData = data
            red = int(data['red'])
            green = int(data['green'])
            blue = int(data['blue'])
            print ('Updating colors to : '+ str(red) + ' ' + str(green) + ' ' + str(blue))
            ser.write(serial.to_bytes([red,green,blue]))
            

        sleep(0.01)
    except:
        print('Error occured, repeating!')
