
import time
import argparse
import paho.mqtt.client as mqtt
import json
import requests

def on_connect(client, userdata, flags, rc):
    print("Conn ected with result code "+str(rc))
    client.subscribe("reco",1)





count = 0


ct1 = ""
ct2 = ""
ct3 = ""
in1 = ""
in2 = ""
in3 = ""

def on_message(client, userdata, msg):
    global ct1
    global ct2
    global ct3
    global in1
    global in2
    global in3
    global count
    #print(msg.topic)
    #print(msg.topic[13:])
    topic = msg.topic[13:]
    value = msg.payload.decode()
    print("value = "  + str(float(value)))
    if(topic == "ct1"):
        ct1 = str(float(value))
        count = count + 1
        print("ct1 Recive" + str(value))
    if(topic == "ct2"):
        ct2 = str(float(value))
        count = count + 1
        print("ct2 Recive" + str(value))
    if(topic == "ct3"):
        ct3 = str(float(value))
        count = count + 1
        print("ct3 Recive" + str(value))
    if(topic == "indicator1"):
        in1 = str(float(value))
        count = count + 1
        print("Indicator 1 Recive" + str(value))
    if(topic == "indicator2"):
        in2 = str(float(value))
        count = count + 1
        print("Indicator 2 Recive" + str(value))
    if(topic == "indicator3"):
        in3 = str(float(value))
        count = count + 1
        print("Indicator 3 Recive" + str(value))
    
    
    if(count == 6):
        count = 0;
        print("Call API")
        #print("msg.payload" + str(msg.payload))
        api_url = "http://localhost/smartmeter/api.php?in1=" + in1 + "&in2=" + in2 + "&in3=" + in3 + "&ct1=" + ct1 + "&ct2=" + ct2 + "&ct3=" + ct3
        print(api_url)
        res = requests.get(api_url)
        print(str(res.content))
        print(res.status_code)
    
    
    
    

time.sleep(1.0)
broker_address="broker.hivemq.com" 
port=1883
#broker_address="iot.eclipse.org" #use external broker
client = mqtt.Client("356sflsdgxddfuhafoasp123") #create new instance

client.on_connect = on_connect
client.on_message = on_message
client.connect(broker_address,port) #connect to broker
client.subscribe("indore/gsits/#")
client.on_message = on_message

while True:
    client.loop_start()
    
   