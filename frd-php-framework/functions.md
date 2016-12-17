# frd framework functions.php

      version:  1
      created_at:  2016-04-25
      updated_at:  None

      created at 2016-04-25 14:03:00 


      None


app() :  return Frd_App  global  object
module():  return current module object, if call it out of module's file, will return null
controller():  return current controller , should use it in controller or  view which after controller loaded
url($path,$params):   create a url 
value_get($data,$k,$default=null)   : get  valu from an array with a key , if the key not exists , reutrn default value (null)
 
