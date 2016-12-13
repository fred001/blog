# Frd_Route

      version:  2
      created_at:  2016-02-29
      updated_at:  2016-04-25 14:26:02

      created at 2016-02-29 12:26:58 
update at 2016-04-25 14:26:02


      None


路由与zend framework 1 路由基本一致。
路由的目的是将url地址转换成正确的规则。 
路由支持两类url地址 
用法：
	$route=new Frd_Route()
	$route->addRule(....)
	
	$params=$route->handle(...)

需要注意的是路由规则执行方向是反过来的。也就是说先定义的规则最后匹配。这和zend framework 1也是一致。

  
