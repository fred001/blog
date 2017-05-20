
  # linux--linux_software_install

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:17:49 


      None


      <p>
      LINUX_SOFTWARE_INSTALL
linux 必备软件环境
tags:  linux  software install

yum grouplist
yum groupinstall Development tools

1, base tools
yum -y install vim wget curl


2, install servers 
HTTP server
yum -y groupinstall Web Server


PHP 
yum -y groupinstall "PHP Support"

MYSQL
yum -y groupinstall "MySQL Database server"
yum -y groupinstall "MySQL Database client"



memcache
yum -y install memcached php-pecl-memcache python-memcached

gearmand
center os 6不存在

3, special  servers
postfix
yum -y install postfix

nagios 
centeros 6不存在
cacti
centeros 6不存在


4, update 
yum -y update


5 CONFIG:
 1, vim


6,run server
 SSH
 web server
 nagios
 cacti

      </p>

  