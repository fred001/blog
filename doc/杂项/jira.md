# jira 安装

1. 下载安装程序， 最好下 sh 格式的，比较简单
mysql-connector-java-5.1.38.tar.gz .
atlassian-jira-software-7.2.3-x64.bin .

2. 下载  mysql 驱动，如果不知道哪里下，它的帮助文档会有
https://confluence.atlassian.com/adminjiraserver072/connecting-jira-applications-to-mysql-828787562.html

3. 安装时候使用 root, 并且保证 jdk 1.8及以上（java -version)

4. 一步步执行即可，默认安装可  /opt/atlassian/jira
  安装后把myql 驱动放到   /opt/atlassian/jira/lib/下（记得先解压,只需要.jar文件)

5. 创建数据库   
  create database jira 
6. 通过 8080 端口访问，并且逐步配置，可以注册个试用授权，或者购买

7.  关闭  /opt/atlassian/jira/bin/stop-jira.sh 
    启动  /opt/atlassian/jira/bin/start-jira.sh 


8. 数据库默认字符集合
  ALTER DATABASE jira  CHARACTER SET utf8 COLLATE utf8_bin

9. 破解：
  复制  atlassian-extras-3***.jar 到 /opt/atlassion/jira/atlassian-jira/WEB-INF/lib/ 替换同名文件

  然后重启jira即可

  软件包在51cto下载，/home/unicorn/tmp/jira7.2破解
