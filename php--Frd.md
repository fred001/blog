
  # php--Frd

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:46:11 


      None


      <p>
      FRD
Frd Lib Document
-----------------
功能：
  AutoLoad
  DB 
  Module
  Baseurl
  Url Rewrite



定义：
  path, 表示文件路径
  realpath, 表示绝对路径
  
>>> Frd Init 流程
  设置变量  Frd::LIB_PATH, Frd::ROOT_PATH  
  设置timezone
  
  如果有设置 include_paths, 增加进入include path
  
  增加 Frd::LIB_PATH, Frd::ROOT_PATH 进入include path
 

>>>Frd Db

   require __DIR__."/../Lib/php/Frd/Db.php";  
   $dsn="mysql:dbname=apparena;host=127.0.0.1";   
   $db=new Frd_Db($dsn,"root","123");
      
   $rows=$db->fetchAll("show databases");
   
     
   var_dump($rows);
  
  db:  fetchAll, fetchOne,fetchRow,fetchAssoc,fetchPairs,fetchCol,query,exec

>>>Frd_INI
  读取 ini的配置
  
  Frd_INI::read($path [,$section])
    $path  ini file path,
    $secion  ini file's section
    
 default return:
 array(
   section1=>array(
      key=>value
      ...
    ),
   section2=>...
    )
  
>>>Frd Loader
require(LIB_PATH."/Frd/Loader.php");
   
$loader=new Frd_Loader();
$loader->addPaths(LIB_PATH,ROOT_PATH);
$loader->autoload();

$test=new Test();


>>>Frd
<?php
   //fix ie can not save cookie in iframe
   define("ROOT_PATH",realpath(dirname(__FILE__)));
   require(LIB_PATH."/Frd/Frd.php");

   $setting=array(
      'baseurl'=>'',
      'timezone'=>'Europe/Berlin',
      'root_path'=>ROOT_PATH,
      'include_paths'=>array(
         LIB_PATH,
         //ROOT_PATH.'/code',
      ),

      /*
      'module.folder'=>ROOT_PATH.'/code/modules',

      'dbs'=>array(
         'default'=>array(
            'adapter' => 'mysql',
            'host' => "localhost",
            'dbname' => "apparena",
            'username' => "root",
            'password' => "123",
         )
      ),
      */
   );

   Frd::init($setting);
   Frd::loadFunctions();

   $file=new Frd_File();


      </p>

  