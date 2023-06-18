
#!/usr/bin/env python
# coding: utf-8

# In[77]:


import numpy as np 
import re



import pyarabic.arabrepr
from tashaphyne.stemming import ArabicLightStemmer
ArListem = ArabicLightStemmer()
def stem_text(text):
    stemmed_text = []
    for word in text.split():
        stemmed_word = ArListem.light_stem(word)
        stemmed_text.append(stemmed_word)
    return ' '.join(stemmed_text)



# In[82]:
with open('H:/SeF/SE/app/Http/Controllers/detector/largea.txt', 'r' , encoding='utf-8') as file:
    ptr = file.read()


# In[82]:
ptr=re.sub(r'\\\\', r'\\', ptr)

import joblib
m1 = joblib.load('H:/SeF/SE/app/Http/Controllers/detector/ara_off.sav') #1 bad 0 good
m2  = joblib.load('H:/SeF/SE/app/Http/Controllers/detector/ara_off_smote.sav')#1 good 0 bad


# In[90]:


import numpy as np
import regex as re
import requests
from better_profanity import profanity
from detoxify import Detoxify

API_URL = "https://api-inference.huggingface.co/models/nairaxo/bert-french-sa"
headers = {"Authorization": "Bearer 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"}

#API_URL_ht = "https://api-inference.huggingface.co/models/Hate-speech-CNERG/dehatebert-mono-french"
API_URL_ht = "https://api-inference.huggingface.co/models/Poulpidot/distilcamenbert-french-hate-speech"



def query(payload):
	response = requests.post(API_URL, headers=headers, json=payload, timeout=5)
	return response.json()

def query_ht(payload):
	response = requests.post(API_URL_ht, headers=headers, json=payload)
	return response.json()
	
def identify(target):
    result = [0,1]
    if re.search(ptr, target):
        return result[1]
    pattern =  r"[\u0600-\u06FF\u0660-\u0669\u06F0-\u06F9@#]+|[0-9]"
    ara = " ".join(re.findall(pattern, target))
    pattern  = r"[a-zA-Z\u0660-\u0669\u06F0-\u06F9@#]+|é|à|0-9"
    eng = " ".join(re.findall(pattern, target))
    
    
    if ara and not ara.isdigit() :
        target = [stem_text(ara)]
        arra = m1.predict_proba(target)[0]
        arrb = m2.predict_proba(target)[0][::-1]
        print(arra,arrb)
        a = np.argmax(m1.predict_proba(target))
        b = np.argmax(m2.predict_proba(target))
        if a == b :
            return result[b]
        ma = max(arra)
        mb = max(arrb)
        if ma > mb :    
            return result[np.where(arra == ma)[0][0]]   
        return result[1-np.where(arrb == mb)[0][0]]
    
    
    if eng and not eng.isdigit() :
        output = query({
    	    "inputs": eng,
        })
        try :
           for i in range(len(output[0])):
              if(output[0][i]['label'])=='toxic' and output[0][i]['score']>.7:
                  print("hf")
                  return result[1]
        except :
              nothig = 0
        output = query_ht({
    	    "inputs": eng,
        })
        try :
           for i in range(len(output[0])):
              if(output[0][i]['label'])=='LABEL_1' and output[0][i]['score']>.7:
                  print("hft")
                  return result[1]
        except :
              nothig = 0
        #if  profanity.contains_profanity(eng):
        #   return result[1]
        eng_or_frc = Detoxify("original").predict([eng])#        eng_or_frc = Detoxify("multilingual").predict([eng])
        for i in eng_or_frc.keys():
            if eng_or_frc[i][0] > .7:
                print("eng")
                return result[1]
    
    
    return result[0]


# In[91]:
import sys
import json


if __name__ == '__main__':
    input_str = sys.argv[1]
    output_str = identify(input_str)
    output_obj = {'result': output_str}
    output_json = json.dumps(output_obj)
    print(output_json)



