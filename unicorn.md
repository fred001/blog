
  # unicorn

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:13:08 


      None


      <p>
      UNICORN
unicorn功能：
    repo管理
    临时内容存储
    磁盘监控
    各项工具
    代码库
    图书馆
    文章中心
    知识库
    项目管理

unicorn 目录结构：
	
	
unicorn 目录结构
	unicorn/
		install  #各个操作系统安装之必要系统，软件，以后可能包含文档
		frd      #frd用户的网络私有内容
		machine_data   #每台机器上数据的备份
		private    #私有内容
		repo       #源
		resource   #资源
		tmp       #用户各个机器，系统之间的临时共享

		
		resource/
			audio   #音频内容，包含音乐和声效
			book    #电子书
			dev_resource   #开发用的资源，包括源代码，文档等等
			doc     #文档
			os     #操作系统和相关软件  
			picture   #图片
			video     #视频


unicorn之frd用户
	frd是核心用户，是当前工作用户，存在于不同系统中，但是都是同一个
	为了保证唯一，切换工作系统时，重装系统时需要备份及恢复
	备份;
		/home/frd ->  /home/unicorn/machine_data/sword/centos7/home/frd
	恢复则是反向

unicorn之系统架构
	分成三个部分
	一，主服务器  24小时开始， 提供  IP/unicorn 共享目录，并自动对 unicorn进行备份
	二，主工作系统， 其中以 frd 为主工作用户。 
		此用户工作目录包含本地的  /home/frd, 也包含主服务器上的  /home/unicorn/frd

	三，其他系统和用户

unicorn之目录位置
	1， 对于主服务器， IP/unicorn 共享目录
	2， 对于任何本地的系统， 存在系统  /home/unicorn 
		并有快捷链接 resource -> /home/unicorn/resource
			 tmp -> /home/unicorn/tmp

      </p>

  