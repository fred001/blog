# mysql配置


show variables like "%character%"
其中多数字符编码都是在配置文件中配置。
只有 database_character 是根据数据库来的，在创建数据库时候设置的该数据库默认编码就是这个编码。 


隧道：

[frd@frd database]$ mysql -h 127.0.0.1  -P 3307 -u root -p

[frd@frd database]$ ssh -f frd@unicorn.me -L 3307:unicorn.me:3306 -N

若要 -P 生效
首先必须前面指定  -h ，并且不能是localhost 
centos7上测试， 如果指定了localhost, 或者 -h 参数在后面， 则-P 端口 的参数是无效的，不知道为什么，很奇怪。
