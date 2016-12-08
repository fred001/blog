
  # awstats

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:53:36 


      None


      <p>
      系统:  fedora 19
参考：http://awstats.sourceforge.net/docs/awstats_config.html#LogFormat

1，确保httpd 已经安装并正常运行
2，yum install awstats
   
3, cd /usr/share/awstats/tools
  perl awstats_configure.pl  #配置
  会自动修改 apache配置， 增加 alias
4， 配置完成后
  cd /etc/awstats
  寻找对应的配置文件，进一步修改配置
  A, LogFile 路径
  B，LogFormat = 1 (apache)

5, 修改 apache 日志格式为 combined
  CustomLog PATH  combined

6, 重启

7, 访问 awstats web界面
 http://localhost/awstats/awstats.pl?month=11&year=2013&output=main&config=apparena.frd.info&framename=index

8， 手动进行统计
  Cd /usr/share/awstats/wwwroot/cgi-bin
  perl awstats.pl  -config=apparena.frd.info  -update  -showdropped

  默认是不统计  127.0.0.1 的， 如果需要统计
  去 awstats配置文件 ，修改 SkipHosts 值

9，  cronolog 每日生成日志
  1, 安装  yum -y install cronolog 
     获得  /usr/sbin/cronolog
  2, 修改 apache 日志格式(路径要用绝对路径，可能是用了外部命令的原因）
      CustomLog "|/usr/sbin/cronolog /var/log/httpd/apparena.custom.log.%Y%m%d" combined

 3， 修改awstats日志路径
  LogFile="/var/log/httpd/apparena.custom.log.%YYYY%MM%DD"
 或
LogFile="/home/XXX/logs/www.wangzhongyuan.com-access.log.%YYYY-24%MM-24" （分析昨天的日志）

 4, 这样就可以了，不过要记得每天让awstats运行一次

10， 权限设置 awstats
  2.4, 不懂怎么设置

 
      </p>

  