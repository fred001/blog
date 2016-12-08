
  # Mysql 安装

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:26:58 


      None


      <p>
      现在已经改名成 mariadb 了。

Yum -y install mariadb-server mariadb

配置使用UTF8:
	vim /etc/my.cnf.d/server.cnf

 12 [mysqld]
 13 collation-server = utf8_unicode_ci
 14 init-connect='SET NAMES utf8'
15 character-set-server = utf8

支持外网用户：
	需要创建一个用户帐号为外网
	GRANT ALL PRIVILEGES ON unicorn.* TO 'root'@'%' IDENTIFIED BY '123' WITH GRANT OPTION;

	FLUSH pRIVILEGES

3， ssh 访问
      </p>

  