
  # php--zf2--运行机制

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:31:28 


      None


      <p>
      问题：
    1， 	$serviceManager->get("Application')  是具体怎么运行的？
    2， $application中的 events 是怎么赋值的               
            get("Applicaton") 怎么运行的？
	            估计要从   zend/mvc/service/ServiceListenerFactory 中获取配置
	            然后根据factories.Application  这个键的值进行创建对象：
	            通过代码：
		            (servicemanager/servicemanaer.php)
		              $instance = call_user_func($callable, $this, $cName, $rName);
		              变量的值分别如下：
		              array(2) {
		              [0]=>
		              object(Zend\Mvc\Service\ApplicationFactory)#10 (0) {
		              }
		              [1]=>
		              string(13) "createService"
		            }

		            $this( servicemanager/servicemanaer.php) 
		            string(11) "application"
		            string(11) "Application"


	            最后达到代码：
		              return new Application($serviceLocator->get('Config'), $serviceLocator);
		              
	            所以最后返回 zend/mvc/application对象， 
	            参数1是servicemanager中的配置
	            参数2是servicemanager的对象
	
            application中的events是怎么创建的？
	            是在  application初始化中完成的 (__construct)
	            112         $this->setEventManager($serviceManager->get('EventManager'));
	            其它对象也来自service manager
	
	
	

    3， $application->event->trigger ，具体会发生什么？
    4， module的 onBootstrap具体是怎么实现的？
    
        modue的 onboostarap实现：
	
	    zend/modulemanager/listener/locatorRegistrationListener.php 中
	    绑定了
	    MvcEvent::EVENT_BOOTSTRAP 事件和 本对象的 onBootsrrap方法
	
	    下面是实际的bootstrap代码， 将所有模块注册到 servicemanager中去
	    102         $application = $e->getApplication();
	    103         $services    = $application->getServiceManager();
	    104 
	    105         foreach ($this->modules as $module) {
	    106             $moduleClassName = get_class($module);
	    107             if (!$services->has($moduleClassName)) {
	    108                 $services->setService($moduleClassName, $module);
	    109             }
	    110         }


	    另外： ModuleManager/Listener/OnBootstrapListener.php:中，
	    将同样这个event和module的onBootstrap进行绑定
	
     5, event到底是怎么实现的？
        mvcevent创建后， 应该需要在某个地方进行 attach
        所以trigger时候可以触发事件， 
        所以关键是哪里进行  attach,并且绑定了哪些对象
        
     6，具体怎么调用module的controller的？


module的配置估计也是在事件绑定中实现载入的
会将getConfig获取到的配置加入到总配置中，
以  MODULE_NAME => CONFIG 形式加入

$routeMatch = $router->match($request);
这一个可能是匹配路由的代码


找到controller之后， 调用 controller->dispatch($request,$response),
里面怎么调用action的，不清楚
action name是通过 ServiceManager/AbstractPluginManager.php：
Zend\ServiceManager\ServiceManager->get('getMethodFromAc...', true)
获取得到的



1， 修改当前路径为 public/../
2,  设置自动载入，  
	大概首先从composer中获取自动载入
	不存在则初始化zend\loader\autoloadFactory 来执行
	
3,载入配置  config/application.conf.php 
    包含了配置：
        modules
        module_listener_options
            config_glob_paths
            module_paths
            
4,初始化zend\mvc\application
appliction:init 
	根据配置里的 service_manager （可以为空），创建 servicemanager (zend/serviceManager/serviceManager)
       
    载入所有的模块	
        这里会调用service manager ->get("moduleManger")
        调用的时候，会增加3个东西：  
            [1] => servicelistener
            [2] => sharedeventmanager
            [3] => modulemanager
        估计是定义在哪里，初次访问时候载入
	
	获取listener (来自配置 "listeners")
	
	//$serviceManager->get("Application') 这里不知道什么时候赋值的
    这里是重要点：
        	loadModules 会载入一些似乎是内置的配置
            如 
	            factories
		            Application =>   'Zend\Mvc\Service\ApplicationFactory',
            此配置位于； ServiceListenerFactory

            于是get("Application") 的时候，猜测大概是通过这个 facotry创建application ，并返回

            这个对象中的createService 方法可能是产生application并返回的

	
	
	 //看结果还是  Zend\Mvc\Application
	$serviceManager->get("Application')->bootstrap($listeners);
	
5,   run:
        实际上还是 application这个对象
        
       1， 对内置的几个事件处理进行绑定  $this->events->attach  
            RouteListener   "Zend\Mvc\RouteListener"
            DispatchListener  "Zend\Mvc\DispatchListener"
            ViewManager    "Zend\Mvc\View\Http\ViewManager"
            SendResponseListener   "Zend\Mvc\SendResponseListener"
            
       2,  创建事件
        148         $this->event = $event  = new MvcEvent();
        149         $event->setTarget($this);
        150         $event->setApplication($this)
        151               ->setRequest($this->request)
        152               ->setResponse($this->response)
        153               ->setRouter($serviceManager->get('Router'));
        154               
        
      3,触发事件
        156         $events->trigger(MvcEvent::EVENT_BOOTSTRAP, $event);


      4, 返回本身
      
6， send 
    实际上也还是 application这个对象
    
    默认是空的方法
    
    
疑问：
    application中的  $this->events 和 $this->event是如何产生的?

    events:  Zend\EventManager\EventManager

    this->event是在bootstrap代码中创建的，  不清楚trigger具体会发生什么
    可能跟 setTarget,setAppliccation十分相关
    
    loadmodules  机制：
	为什么会产生 application?
	
	
	get不存在的东西，怎么触发载入所有的？
	
servicemanageer::get 
	大约会进行延迟载入，具体实现细节不明


      </p>

  