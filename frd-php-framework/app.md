lib/App.php (Frd_App) 

Frd_App is the platform , and each module is a website . 
This object  only have one instance, which can get by app() function .
It contain all necessary methods as  a framework , which include route, db, module,setting, global . 

setting:  app()->getSetting(NAME)
db:   app()->getDb()


 

