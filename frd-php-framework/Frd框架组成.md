# Frd框架组成

    version:  2  
    created_at:  2016-04-23  
    updated_at:  2016-04-25 14:01:31  
    created at 2016-04-23 19:54:01   
    update at 2016-04-25 14:01:31  



重要功能目录及文件：  
default_setting.php  #整个框架的默认配置文件  
local/setting.php  #自定义的配置，可以增加配置，或者覆盖默认配置  
functions.php  #框架的function接口   
public/   #index.php 和其它js,html,font,image 等资源存放目录  
lib/  #框架的核心代码  
lib/Frd.php  #核心入口文件  
lib/App.php  #Frd_App  app() 对象  
lib/Module.php  	#Frd_Module frd module 实现  
lib/Loader.php    #Frd_Loader 自动载入实现  
lib/Route.php	#Frd_Route 路由功能的实现  
lib/Template.php  #Frd_Template 模板功能  
lib/Db.php  #Frd_Db 数据库功能（继承自 Zend Db )  
lib/Db/Table.php #Frd_Db_Table 数据库单表功能 （扩展自 zend db table)  
functions/  #额外常用函数，默认不启用  
  


