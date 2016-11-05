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

from selenium import webdriver

import hashlib,shutil,time
import urllib2
import glob
import pycurl

sys.path.append('/home/share/lib/python')
from functions import *


"""
  find all dir 
    if dir/_book/index.html exists
      add dir
"""


"""
  data format:
      ( dir1 , dir1's index.html path) 
      ( dir2 , dir2's index.html path) 
      ( dir3 , dir3's index.html path) 
"""
data=[]

for base, dirs, files in os.walk("."):
  for filename in dirs:
    dirpath=base+"/"+filename
    dirpath=dirpath.rstrip("/")+"/"

    path_index_html=dirpath.decode("utf8")+u"_book/index.html"

    if os.path.exists(path_index_html):
      data.append((filename.decode("utf8"), filename.decode("utf8")+u"/_book/index.html"))

data_json=json_encode(data)

file_put_contents("dirs.json",data_json)



