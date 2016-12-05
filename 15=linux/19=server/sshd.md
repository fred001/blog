
  # sshd

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:47:12 


      None


      <p>
      sshd

历史：
2015年10月05日
建立




简介：
	sshd是安全远程管理服务器

启动：
	service sshd start

配置文件
	/etc/ssh/sshd_config 
相关命令：
	ssh  scp sftp
配置说明：
	/etc/ssh/sshd_config

#已验证的客户端公共key存放处
AuthorizedKeysFile 		.ssh/authorized_keys  （600）
#  说明主机的 Private Key 放置的档案,预设使用下面的档案即可! 
# HostKey /etc/ssh/ssh_host_key 
# SSH version 1 使用的私钥 
# HostKey /etc/ssh/ssh_host_rsa_key 
# SSH version 2 使用的 RSA 私钥 
# HostKey /etc/ssh/ssh_host_dsa_key 



      </p>

  