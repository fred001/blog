
  # Zend_Controller

      version:  1
      created_at:  2016-03-02
      updated_at:  None

      created at 2016-03-02 11:23:41 


      None


      <p>
      	Front
		run：
			调用dispatch
		dispatch(Zend_Controller_Request_Abstract $request = null, Zend_Controller_Response_Abstract $response = null):
			这里要做大部分核心工作。 包括设置 request和response对象， 进行路由处理， 在各个阶段调用所有插件进行处理， 调用dispatcher的dispatch方法来真正进行action处理。 更核心的代码在 dispatcher中 ，默认是Zend_Controller_Dispatcher_Standard
	Request: 略
	Response:略
	Route : 
		路由负责将 /user/:user_id  这类URL 转换成正确的地址和参数
		$route = new Zend_Controller_Router_Route(
		    'archive/:year',
		    array(
			'year'       => 2006,
			'controller' => 'archive',
			'action'     => 'show'
		    )
		);
		$router->addRoute('archive', $route);

		内部是如何解析的？
			第一通过  Zend/Controller/Router/Rewrite.php::route 参数进行逐个调用进行解析
			第二各个路由器的match方法进行处理，并返回 参数
				398             if ($params = $route->match($match)) {

		

	Dispatcher:
		负责载入正确的controller并调用其action
	
	Action
		执行用户代码，并可以载入默认的视图。 视图是默认载入的，如果要禁止，就要参照其提供的方法。 
	动作助手：
		对Action提供的功能增强。
		不是很理解它存在的意义。 也许是这种设计的架构，没有额外的函数，也没有其它方便扩展功能的方式，所以用这种麻烦的机制。
		事实上mvc,根本没看到zend1 提供了什么m 。

	插件
		插件是在各个时机可以执行的额外操作。 
		插件有一些本身的问题，如插件执行次序,插件能否修改变量等，如果能修改，那么很可能发现某些变量莫名其妙修改，增加复杂度。
		所以插件的用途还是很尴尬，究竟带来好处多还是坏处多，不太好说。 
		目前仅仅用来判断登陆。
	

      </p>

  