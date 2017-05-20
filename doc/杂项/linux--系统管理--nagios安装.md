
  # linux--系统管理--nagios安装

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:18:36 


      None


      <p>
      NAGIOS安装
Nagios 安装 （fedora 18)

1, yum install  nagios
 安装后，  会增加 /etc/httpd/conf.d/nagios.conf
重写了 localhost/nagios 
2, 启动 apache, 访问    localhost/nagios 
帐号密码在 /etc/nagios/passwd 中
密码是加密的，但是和帐号一样

3, 登录nagios管理界面 ， 点击 Hosts
如果没东西， 需要启动nagios服务
这个大概是收集系统信息的， 
web仅仅是前台页面。

Service nagios  start 
同时可以查看 /var/nagios/nagios.log 

成功后，就可以看到信息了

      </p>

  