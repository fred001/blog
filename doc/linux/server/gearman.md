
  # gearman

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:45:45 


      None


      <p>
      gearman

历史：
2015年10月07日
建立




	gearman是一个任务处理服务器，可以为多语言协同提供服务。
	
相关网站：
	http://gearman.org/  #官方网站

	http://php.net/manual/zh/book.gearman.php #php扩展

	#python 扩展
	https://github.com/Yelp/python-gearman/ 
	https://pypi.python.org/pypi/gearman 

安装：
	yum -y install gearmand
	yum -y install  php-pecl-gearman  #php扩展

	 easy_install gearman  #python扩展
启动：
	service gearmand start
 配置文件：
	/etc/sysconfig/gearmand.conf  #似乎没什么配置
日志：
	/var/log/gearmand.log  #似乎总是为空
	/var/log/message   #启动信息在这里

基本概念：
	job : 包括一个名字，和参数 (workload)
	server: gearmand 服务器
	client :  向server 提交 job 
	worker manager: 向server 绑定job 到worker 
	worker : 具体执行某个 job的代码

	client 提交job给 server
	worker manager 启动，持续运行，绑定 job 到具体的worker, 并等待job到来,最终分配给worker执行
	worker中可以获得job的参数
	
	可以有多个worker manager一起运行,它们不必是同样语言 
	client中提交任务可以选择 doNormal (即时返回） doBackground(后台执行，不会返回东西）两种执行方式 
	doNormal情况下， 若对应的job无人处理，会一直等待中 
	多个worker绑定同一个job,大约第一个绑定的真正执行，其它不会执行




php 代码： 
	Client: 
function add_task_publish($path) 
 { 
     $client = new GearmanClient(); 
     $client->addServer("127.0.0.1",4730); 
   
     var_dump( $client->doNormal("publish", $path)); 
    //var_dump( $client->doBackground("publish", $path)); 
 } 
  
 add_task_publish("1.jpg"); 
                                

Worker: 
	 worker.py  client.php  client.py  worker.php                                  X 
   <?php 
   
   // Reverse Worker Code 
   $worker = new GearmanWorker(); 
   $worker->addServer(); 
   $worker->addFunction("publish", function ($job) { 
   
     $path=$job->workload(); 
     echo "publich $path \n"; 
  
    return strtoupper($path); 
  }); 
 
 while ($worker->work()); 
 

python 库中的client运行正常，但是 worker不要调用无效方法，比如 job.arg,这样会导致出错但是没有任何出错信息，看起来好像是worker无效
      </p>

  