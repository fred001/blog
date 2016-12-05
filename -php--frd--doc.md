
  # -php--frd--doc

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:44:18 


      None


      <p>
      DOC
//GLOBAL:   can only set,can not remove ,but can overwrite
void function global_set($k,$v)  
mixed function global_get($k)


function getModule($folder)  //get module

function successResponse($response=array())   //create a success response array, with  error=0
function errorResponse($code,$msg='',$data=array()) //create an error response  ,with error=1 ,error_code = $code 
function failedResponse($msg='',$data=array()) // create a failed response, with error=2



function cache_init()
function cache_create($name="default",$type,$options)
function cache_use($name)
function cache_get_current()
function cache_save($k,$v)
function cache_load($k)


function session_init()
function session_set($k,$v)
function session_get($k)
function session_user_get($k)



mixed function config_get($key,$default=null)  

//config_set("name","test")
//config_set(array("name"=>"test"))
void function config_set($key,$value=false)//  can set a config or multiple configs

array function config_get_all()

                                                                                 X
Zend_Db function db_get($name='default')  //get an db instance (Zend Db )
Zend_Db_Select function db_select()  //get an db select 
function db_query($sql)  //query a sql or an zend db select
function db_execute($sql) //execute a sql or an zend db select
function db_insert($table,$row)  //insert a row to a table
function db_to_where($where)  //used by other functions, user should not use it
function db_update($table,$row,$where)  //update a row  
function db_exists($table,$where)  //check if a row exists
function db_delete($table,$where)  //delete row if exists

function db_fetchone($sql)
function db_fetchrow($sql)
function db_fetchall($sql)

function db_get_one($tablename,$col,$wheres)
function db_get_col($tablename,$col,$wheres)
function db_get_row($tablename,$wheres)
function db_get_pairs($tablename,$col_key,$col_value,$wheres)
function db_get_all($tablename,$wheres)

function db_set_one($tablename,$col_key,$col_value,$wheres)
function db_set_row($tablename,$data,$wheres)
function db_set_all($tablename,$data,$wheres)

function db_delete_row($tablename,$wheres)





=============


define("ROOT_PATH",realpath(dirname(__FILE__))); //必须定义得常量
require_once ROOT_PATH.'/lib/Frd/Frd.php'; //include Frd 
  

     $setting=array(
      'baseurl'=>'/index.php/',
      'module_path'=>ROOT_PATH."/modules/",
      "module_default"=>"default",
      "controller_default"=>"index",
 
       'dbs'=>array(
        'default'=> array(
          'adapter' => 'MYSQLI',
          'host' => 'localhost',
          'username' => 'root',
          'password' => '123',
          'dbname' => 'iamlosing',
        )
      ),
     )
    );

 Frd::init($setting); //init Frd, 
 
 Frd::loadInterfaces("functions");  //functions
 Frd::loadInterfaces("interface"); //base interface
 Frd::loadInterfaces("db");  // db interface

 Frd::run(); //run 


=================
autoload
>>>

when call  Frd::init,  the framework will also init the autoload
the include path include  : lib/ modules/
and there have a rule to parse class to path
Aa_Bb_Cc =>Aa/Bb/Cc.php
AaBb_Cc => AaBb/Cc.php
just as  Zend Loader rule

=====================
file structure
>>>
index.php  
init.php  #init framwork
lib/     #lib folder, include framework code
modules/  #custom modules
config.php  #config file, with content  $config_data=array(...)

function/ #custom functions

##resource folders
css/ 
images/           
js/      



=====================
interface
>>>>
interface is some functions will always works,
and for your project, maybe you want change the inteface detail code, 
but should still keep same interface.
because native php code do not support rewrite  functions, 
so you can only copy inteface code from Framework,and modify it 


=============
url rule
>>>
SCHEME://DOMAIN + BASEPATH + REWRITE_PATH(MODULE+CONTROLLER) + REWRITE_PARAMS

http://127.0.0.1 +  /index.php + test/index(test+index) + age/11






      </p>

  