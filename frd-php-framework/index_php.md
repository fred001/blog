<?php
ini_set("display_errors",1);  #开发环境启用，允许环境需要关闭，设置为 0 
//设定自动载入机制
$LIB_PATH=dirname(__FILE__)."/lib";  #定义 Frd Lib 路径，需要从此目录获得 Frd核心类
set_include_path($LIB_PATH.PATH_SEPARATOR.get_include_path());

require_once("Frd/Frd.php");
define("ROOT_PATH",dirname(__FILE__));  #定义 ROOT_PATH ,其它地方可以使用
require_once(ROOT_PATH."/functions.php");

//获得配置
require_once(ROOT_PATH."/setting.php");
//尝试获得本地配置
if(file_exists(ROOT_PATH."/local/setting.php"))
{
  require_once(ROOT_PATH."/local/setting.php");

  $setting=array_merge($setting_default,$setting); //本地配置文件中的变量是   $setting 
}
else
{
  $setting=$setting_default;
}
//初始化
Frd::init($setting);
session_start();
//设定基本路由，以支持  /PATH 的路径格式
$route=app()->getRoute();
$route->addRule("/(.*)/",array(
      'path'=>":0",
      ));
//开始运行
try{
  app()->run();
}
catch(Exception $e)
{
  if($e->getMessage() == "REWRITE URL FAILED")
  {
    app()->run("/404");
  }
  else
  {
    throw $e;
    //error_log($e);
    //app()->run("/error");
  }

}


