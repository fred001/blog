
  # mysql

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:53:46 


      None


      <p>
      完全复制表，保持索引
create table XXX like tablename



to_days() :把时间转换成天 ， 
  to_days("2014-01-01 10:00:00") =  to_days("2014-01-01 11:00:00")


yearweek(): 把时间转换成当年的week

year() : 把时间转换成年 
month():  把时间转换成月份(1-12)
没有 yearmonth函数，只能  year+month


日期函数：

curdate()
  返回当天日期

curtime()
  返回当天时间

date()
  提取时间的日期部分

date_add:
  时间加减
    SELECT DATE_ADD('2010-12-31 23:59:59',INTERVAL 1 DAY);




            更改mysql默认字符集

1，service mysqld stop,停用mysql。
 2.cp /etc/my.cnf /etc/my.cnf.bak,修改前做备份，这是个好习惯。
修改my.cnf
vi /etc/my.cnf
在[client]下添加，client为控制客户端的，没试过，没有的可以不需要加。
default-character-set=utf8
在[mysqld]下添加，mysqld为控制服务器端的，改过了，OK。
default-character-set=utf8

3.service mysqld restart，重启。
4.show variables like '%char%';查看。
 
 

mysql: 
    禁止外键约束：  SET FOREIGN_KEY_CHECKS = 0;

      </p>

  