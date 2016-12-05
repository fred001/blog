
  # php--zf2--内部类--Loader.

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:42:47 


      None


      <p>
      LOADER

Loader

 
更为复杂， 并且集成在整个框架中，不清楚单独怎么用  
支持插件  

 

 
require_once 'Zend/Loader/StandardAutoloader.php';  
$loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));  

 
// 注册 “Phly” 命名空间  
$loader->registerNamespace('Phly', APPLICATION_PATH . '/../library/Phly');  

 
// 注册“Scapi” 提供商前缀  
$loader->registerPrefix('Scapi', APPLICATION_PATH . '/../library/Scapi');  

 
// 可选地, 指定autoloader 为“回落” autoloader  
// 并不推荐这么做  
$loader->setFallbackAutoloader(true);  

 
// 使用spl_autoload:注册  
$loader->register();


      </p>

  