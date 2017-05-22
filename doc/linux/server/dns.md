
  # dns

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:45:34 


      None


      <p>
      dns

历史：
2015年10月09日
建立



	dns域名服务。 对应的软件是 bind. 
	查询的原理我猜测如下：（查询iamlosing.me)
	先查询根服务器  , 根服务器给出  掌管二级域名(.me)的dns 服务器  进行查询
.me  dns服务器查询到  ali 的dns 服务器， 再通过ali的服务器查询。
为什么能得到ali的dns服务器 ？ 可能是godaddy将  dns服务器写入 .me dns中，替换了本身的 dns 服务器，所以直接绕过godaddy 到ali查询了。

安装: （默认安装后不是chroot)
	yum install bind bind-chroot

然后修改 /etc/named.conf 
  搜索 listen , 修改两个选项，为  any ,以监听所有地址 
  搜索 allow query  设置成 any ,准许所有查询
 
 10 options { 
 11 #listen-on port 53 { 127.0.0.1; }; 
 12   listen-on port 53 { any; }; 
 13 #listen-on-v6 port 53 { ::1; }; 
 14   listen-on-v6 port 53 { any; }; 

 17   allow-query     { any; }; #默认只允许  本地查询

启动：
	service named start 
增加域名：
增加域 （zone)   正解
/etc/named.conf 增加： 

zone "frd2.info" IN { 
type master; 
file "named.frd.info"; 
//allow-update{none;}; 
}; 

frd2.info 是域名 
type 需要是master, 意思是主dns， 不能是 hint 


设置域文件的具体域名： 
/var/named/named.frd.info 

此文件不存在，可以从 /var/named/named.localhost 复制一个 

增加域名到这个文件： 
一个正解的数据库设定中,至少应该要有 $TTL, SOA, NS (与这部 NS 主机 
名的 A
格式1: 
NS      @
abc A 192.168.1.1 
abc.frd2.info. A 192.168.1.1 

(@代表 zone的名字 
. 代表完整主机名， 否则后面会自动跟上  .+zone 名字, 
比如  town  => town.named.centos.vbrid 
town.  => town)
后面如果没有 . 则自动增加 域名 (.frd2.info) 

反解（反解类似， 仅仅有 PTR指令 )
zone "100.168.192.in-addr.arpa" IN 
type master; 
file "named.192.168.100"; 
};

254 IN PTR master.centos.vbird. （ 192.168.100.254 =》  master.centos.vbird ) 最后一个. 标志这是完整主机名
		
		 
DNS的授权是指在某domain中设定  其 dns 服务器， 再通过dns服务器差找域名 
所以授权指针对某个domain授权给某dns服务器 
一个dns可以获得多个不同domain的授权


测试：
	测试： dig @127.0.0.1 frd2.info 

看到有返回结果就成功了。 

可能的错误情况： 
假如一切都看起来对，但是查询没结果， 
可能是 named.frd.info 权限不对 
权限不对时候，执行 rndc reload frd2.info 会提示权限没有 
      </p>

  