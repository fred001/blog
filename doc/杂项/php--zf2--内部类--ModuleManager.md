
  # php--zf2--内部类--ModuleManager

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:43:46 


      None


      <p>
      MODULEMANAGER
ModuleManager

 
实现了module功能
比较复杂和变态
包括  模块 autoload, module manager, module listener

 

 
问题：  
具体如何使用
各种必须的文件什么意义
如何实现



 

 
ModuleManager：  

 
loadModules过程：  

 
抛出  loadmodule, loadmodule.post 两个事件  
 loadmodule 事件被监听，默认交给  onLoadModules处理  
   

 
onLoadModules;  
根据获得到的modules,逐个载入  

 

 
getModules:  
直接返回 this->modules,不知道值是哪里来的  
   
loadModule:  
略复杂  
核心方法：  loadModuleByName($event)  
  $event事先已经设定了 modulename  
   
loadModuleByName($event):  
抛出  load module resolve 事件  
并获取此事件的返回值  $result  
   
 $module=$result->last  （这里不懂）  
   
 $events->attach(ModuleEvent::EVENT_LOAD_MODULE_RESOLVE, new ModuleResolverListener);   
   
估计要查看  module resolver listener  
   
ModuleResolverListener:  
这里代码比较简单  
   
 1,从event获取module name  
 2,获取类   $class=$moduleName."\Module"  
 3, $module=new $class;  
   
估计就是获取module/MODULE/Module.php 的类名，然后初始化

 


      </p>

  