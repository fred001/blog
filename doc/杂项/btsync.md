
  # btsync

      version:  1
      created_at:  2016-08-03
      updated_at:  None

      None

      None


      <p>
      1， 下载
	https://getsync.com/platforms/desktop/

	2, 启动  ./btsync  (默认绑定127.0.0.1:8888) ，也可以指定其它地址
		 ./btsync --webui.listen 192.168.2.100:8888
	3,启动后，通过webui来访问  
	 似乎每台电脑的帐号都是独立的，可以创建相同帐号名和密码
      </p>

  


  目前遇到的问题：
    从阿里云可以同步到本地，笔记本和台式机
    但是反过来同步不过去，只能同时目录，没法同步文件，偶尔文本文件可以

    从公司网络可以同步到阿里云（公司是电信）

    本地是联通 


    /etc/yum.repo.d/resilio-sync.repo

    [resilio-sync]
    name=Resilio Sync $basearch
    baseurl=http://linux-packages.resilio.com/resilio-sync/rpm/$basearch
    enabled=1
    gpgcheck=1


     rpm --import https://linux-packages.resilio.com/resilio-sync/key.asc
     sudo yum install resilio-sync


    如果有多个btsync目录，处理时候是按照先后顺序的。假如第一个正在索引中，第二个很可能没动静，
    这时候很容易误会第二个出错了，其实没错。

    建立目录一般应该选第二个，因为可以随时收回客户端权限。
