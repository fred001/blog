#!/usr/bin/env python
#-*- coding: utf-8 -*- 
#python 2.7

import sys,os
import pygame
import time,random

from sys import exit
from random import randint 
from time import strftime
from time import sleep

import hashlib,shutil,time
import urllib,urllib2
from markdown import markdown
from bs4 import BeautifulSoup

from selenium import webdriver

import hashlib,shutil,time
import urllib2
import glob
import pycurl

sys.path.append('/home/share/lib/python')
from functions import *


### create dirs.json
data=[]

for base, dirs, files in os.walk("."):
  for filename in dirs:
    dirpath=base+"/"+filename
    dirpath=dirpath.rstrip("/")+"/"

    path_index_html=dirpath.decode("utf8")+u"/SUMMARY.md"

    if os.path.exists(path_index_html):
      data.append((dirpath.decode("utf8"), dirpath.decode("utf8")+u"/index.php"))

data_json=json_encode(data)

file_put_contents("dirs.json",data_json)

### each folder's sidebar.phtml
for item in data:
  dirpath=item[0]

  content=file_get_contents(dirpath+"/SUMMARY.md")
  html=markdown(content)

  soup=BeautifulSoup(html)

  content=u'<ul class="summary">\n'
  for li in  soup.find_all("li"):
    link=li.a.attrs['href']
    text=li.a.string

    content+= u'    <li class="chapter">\n'
    content+= u'      <a href="'+link+u'">\n'
    content+= u'         '+text+'\n'
    content+= u'      </a>\n'
    content+= u'    </li>\n'
  content+= u'</ul>\n';

  #content+=u'<li class="divider"></li>';

  shutil.copy("doc_index.php",dirpath+"/index.php")
  file_put_contents(dirpath+"/sidebar.phtml", content)

