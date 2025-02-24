from distutils.log import debug
from fileinput import filename
import os
import io
from os import environ
from flask import *
import mysql.connector
import matplotlib.pyplot as plt
import numpy as np
from PIL import Image
from flask_cors import CORS

import pandas as pd

import random
import time
import threading
from distutils.log import debug
from fileinput import filename
from os import environ
import os
import argparse
import sys
import importlib.util
import datetime

import warnings
warnings.filterwarnings("ignore")



from obsei.payload import TextPayload

from obsei.source.playstore_scrapper import (
    PlayStoreScrapperConfig,
    PlayStoreScrapperSource,
)

from obsei.analyzer.classification_analyzer import (
    ClassificationAnalyzerConfig,
    ZeroShotClassificationAnalyzer,
)

text_analyzer = ZeroShotClassificationAnalyzer(
    model_name_or_path="typeform/mobilebert-uncased-mnli", device="auto"
)
#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

def Sentimentalresult(textdata):
    Sentiment=""
    if textdata!='':
        ss=textdata
        empty_record = {
            'comment_id': '',
            'text': '',
            'time': '',
            'author': '',
            'channel': '',
            'votes': '',
            'photo': '',
            'heart': False,
        }
        source_response_list=[TextPayload(segmented_data={},meta=empty_record, source_name='', processed_text=ss)]

        analyzer_response_list = text_analyzer.analyze_input(
                source_response_list=source_response_list,
                analyzer_config=ClassificationAnalyzerConfig(
                    labels=["positive", "negative", "neutral"],
                ),)

        personctypelabels=["positive", "negative", "neutral"]
        personctypelabelsval=[0, 0, 0]

        for idx, an_response in enumerate(analyzer_response_list):
            print("--------------")
            print(an_response)
            print("--------------")
            # Extracting values from 'segmented_data' dictionary
            positive = an_response.segmented_data['classifier_data']['positive']
            negative = an_response.segmented_data['classifier_data']['negative']
            neutral= an_response.segmented_data['classifier_data']['neutral']

            personctype=[positive,negative,neutral]
            print("positive score-",positive)
            print("negative score-",negative)
            print("neutral score-",neutral)
            largest_value = max(personctype)
            largest_index = personctype.index(largest_value)
            print(personctypelabels[largest_index])
            #Cval2.set("Text Result-"+personctypelabels[largest_index])
            Sentiment=personctypelabels[largest_index]

    else:
        messagebox.showerror("Error", "Enter Message")
        Sentiment=""

    return Sentiment
    
 
#+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="restaurants"
)
mycursor = mydb.cursor()


app = Flask(__name__)
CORS(app)
app.secret_key = "abc"

@app.route('/')  
def main():
    #return render_template("signin.html")
    Respon=make_response("hii")
    return Respon

@app.route('/signin')  
def signin():  
    Respon=make_response("hii")
    return Respon

@app.route('/success', methods = ['POST','GET'])  
def success():
    #http://192.168.137.27:5555/success
    Respondata=""
    Strval="Select * from ufeedback where Feedbacktype=''"
    #print(Strval)
    mycursor.execute(Strval)
    myresult = mycursor.fetchall()
    for x in myresult:
        user_input=str(x[3])
        print(user_input)
        user_pred=Sentimentalresult(user_input)
        print("Predicted sentiment:"+user_pred)

        sql="update ufeedback set Feedbacktype='"+user_pred+"' where fid="+str(x[0])
        mycursor.execute(sql)
        mydb.commit()
        Respondata="Successfully"       

    Respon=make_response(Respondata)
    return Respon

@app.route('/Mainpage', methods=['GET'])  
def Mainpage():
    Respon=make_response("")
    #return Respon
    #return render_template("Mainpage.html")
    return Respon
            
@app.route('/shutdown')
def shutdown():
    sys.exit()
    os.exit(0)
    return
   
if __name__ == '__main__':
   HOST = environ.get('SERVER_HOST', '0.0.0.0')
   #HOST = environ.get('SERVER_HOST', 'localhost')
   try:
      PORT = int(environ.get('SERVER_PORT', '5555'))
   except ValueError:
      PORT = 5555
   app.run(HOST, PORT)
   #app.run(debug=True)
