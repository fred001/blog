
  # ssh

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:10:35 


      None


      <p>
      ssh

历史：
2015年10月05日
建立




ssh [-f] [-o 参数项目] [-p 非正规埠口] [账号@]IP [指令] 
选项与参数: 
-f :需要配合后面的 [指令] ,不登入远程主机直接发送一个指令过去而已; 
-o 参数项目:主要的参数项目有: 
ConnectTimeout=秒数 :联机等待的秒数,减少等待的时间 
StrictHostKeyChecking=[yes|no|ask]:预设是 ask,若要让 public key 
主动加入 known_hosts ,则可以设定为 no 即可。 
-p :如果你的 sshd 服务启动在非正规的埠口 (22),需使用此项目; 
[指令] :不登入远程主机,直接发送指令过去。但与 -f 意义不太相同。


范例：
	#登录到远程服务器，使用frd帐号
	ssh   frd@192.168.2.200  

	#同样登录，但是遇到服务器public key没有加入到本地，自动加入，不用询问
	#适用于脚本
	ssh -o StrictHostKeyChecking=yes   frd@192.168.2.200  

	#ssh建立隧道，本地的应用程序可以直接连接本地IP 和端口，实现对远程的访问了
	ssh -T -L 本地埠口:127.0.0.1:远程端口口 [-N] 远程主机 
-T      Disable pseudo-tty allocation.
-N :仅启动联机通道,不登入远程 sshd 服务器 



      </p>

  