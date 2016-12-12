# Tutorial
  
domain  : example.com  also write as DOMAIN
domain path    : /var/www/html/example/public 
so domain root path    : /var/www/html/example/  ROOT_PATH


1. introduce
  Frd PHP Framework is a small php framework 
  it's goal is quick and simple  ,like knife
  it based on Zend Framework (v1) ,but deleted many components.
  (for keep the filesize not too large)

1. create controller
  visit url  : DOMAIN/test
  should show  404 error message

  now create the test controller file  ROOT_PATH/modules/default/controllers/test.php  with content 

       <?php
           echo 'test';

  and visit the url again, now the  "test" content should show 

  how does this works ?
  actually the rule is defined in  ROOT_PATH/default_setting.php

         "/\/(.*)/"=>array(
            'controller'=>":1",
         ),

  for DOMAIN/test , the path ($_SERVER['PATH_INFO'])  is  /test 
  it matched this rule, and the rest string "test" will become 
  parameter "controller"

  and it will find the controller in folder ROOT_PATH/modules/default/controller/CONTROLLER.php

  here are some more examples:
  DOMAIN/test2   :  ROOT_PATH/modules/default/controller/test2.php
  DOMAIN/test/test   :  ROOT_PATH/modules/default/controller/test/test.php
  DOMAIN/test/test.php   :  ROOT_PATH/modules/default/controller/test/test.php.php


1. use template

url: DOMAIN/test

file 11 : ROOT_PATH/..../controller/test.php,  set content:

   <?php
      echo getModule()->render("test",array("name"=>"test"));


file 2 : ROOT_PATH/..../template/test.phtml,  set content:

   <?php echo $this->name; ?>

the url's page  content should be :  "test"


explain:
    getModule() is a global function which defined in ROOT_PATH/functions.php
    it get the current module object  ROOT_PATH/modules/default/main.php

    and render the template "test.phtml" with variables name=>test

    then in test.phtml visit the variable use  $this->name
    


1. use sub template
  file :  ROOT_PATH/..../templates/test.pthml
  code:  <?php $this->render("test2",array("name"=>"test2"); ?>

  this code is for render sub template ,the location is also in template folder , and variable should pass again, it will not inherit variables from parent template


1. use layout
  
  file: ROOT_PATH/.../controller/test.php
  code:
  
   $layout=getModule()->getLayout("basic");
   $layout->content=getModule()->render("index",array(
   ));

   echo $layout->render();


  the layout file is : ROOT_PATH/.../template/layout/basic.phtml
  in layout file have a line :
      <?php echo $this->content; ?> so this will print the template content



  actually layout is also a template .but layout and template  are two separated templates 
  they do not share variables 


1. use database
  in default_setting.php you should already defined the db config
  now get db  and do some query


  $rows=getDb()->fetchAll("show table");
  print_r($rows);  //array 


  the db object is Zend_Db 

1. create custom route
  all routes are defined in default_setting.php's  routes
  the format is : pattern => rewrite_params
   :1 :2 :3  is the match of the pattern part
  in regexp ,is always writed as \1 ,\2 ,\3
  but here use :1, :2, which looks better

  here are some examples:

  RULE:
   "/\/book\/(.*)/"=>array(
      'controller'=>"book2",
      'path'=>":1",
   ),

  RESULT:
   book/test  => ?controller=book&path=test


  RULE:
   "/\/api-(.*)/"=>array(
      'controller'=>"api",
      'name'=>":1",
   ),

  RESULT:
   api/test  => ?controller=api&name=test



1. use module
  a module is a website
  the class is ROOT_PATH/modules/default/main.php

  under the folder ROOT_PATH/modules/default/ 
  all files can get the current module object by getModule()
   (make sure you do not load the module's file by directly require)

  so in main.php  you can defined shared methods for the module


1. use third lib
  current is not support composer
  I really hate it's ugly folder structure

  now only support Zend_Loader (v1) 's rule
  the default include path is  ROOT_PATH/lib

  $class=new Test() =>   ROOT_PATH/lib/Test.php ,classname = Test
  $class=new Test/Abc() =>   ROOT_PATH/lib/Test/Abc.php ,classname = Test_Abc

  and also can load by manual 
  require_once("third/test.php")
  $class=new CLASSNAME() # CLASSNAME is defined in test.php


1. use Frd_Db_Table
  suppose the db has a table 
    user: id, name,created_at

  usage 1:

  $table=new Frd_Db_Table("user","id"); //tablename and primary 
  $table->name="test";
  $id=$table->save(); //create a record

  $table=new Frd_Db_Table("user","id"); //tablename and primary 
  $table->load($id); //load a record ,it should exists
  $table->name="test2";
  $table->save(); //update  record

  $table=new Frd_Db_Table("user","id"); //tablename and primary 
  $table->delete($id); //delete a record 

  usage 2:
  $table=new Frd_Db_Table("user","id"); //tablename and primary 
  $table->insert(array(
           'name'=>'test',
           ));

  $where=array("name"=>"test");
  $data=array("name"=>"test2");
  $table->update($where,$data);

  $where=array("name"=>"test");
  $table->delete($where);
    
  $where=array("name"=>"test");
  $table->getRow($where); //return array

  $where=array("name"=>"test");
  $table->getAll($where); //return array(array())

  $where=array("name"=>"test");
  $table->getOne($where,"id"); //return string 


1. use api
    not ready
