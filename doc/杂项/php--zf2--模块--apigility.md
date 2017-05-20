
  # php--zf2--模块--apigility

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:44:04 


      None


      <p>
      APIGILITY
		
apigility 究竟是怎么实现的？
	估计是在Module.php中实现的
	onBootstrap() 创建对象， 绑定事件 ， 
	
	估计要在controller调用之前的事件之前就处理掉，免得指向不存在的controller
	
	
	
apigility fetchALL:
	通过controller的 getList返回，
	首先调用 resource 的fetchAll
		假如返回的是collection(即成子 Paginator) 
		则根据当前的查询参数，设置 page,page_size,page_count 等
		（默认仅仅支持page,  假如要支持 page_size,page_count等等，需要在路由加入到 whitelist)
		
		最后估计调用 collection的方法来返回真正的数据（未确定）

	加入不是collection, 则直接返回

      </p>

  