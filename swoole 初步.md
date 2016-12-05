
  # swoole 初步

      version:  1
      created_at:  2016-07-11
      updated_at:  None

      None

      None


      <p>
      	概念： 高性能的服务器，类似nodejs
	REPO：https://github.com/swoole/swoole-src
	文档： http://wiki.swoole.com/
	配置：	centos7)  		echo "extension-swoole.so" > /etc/php.d/ swoole.ini

		然后 php -m  检测模块是否安装

	开发注意：  因为运行模式和apache,nginx 都不相同了，所以开发方式也不一样
		1，文件会重复载入，所以注意重复载入中的文件不要包含函数
		2， 需要对静态文件进行单独处理
		3，不能随便输出exit(),会造成线程提前退出，发生错误
		4，	php://input 怎么获取 ？




      </p>

  