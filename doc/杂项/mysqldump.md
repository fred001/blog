
  # mysqldump

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 12:32:07 


      None


      <p>
      mysqldump:  导出mysql数据库工具


--add-locks   
  在每个表导出之前增加LOCK TABLES并且之后UNLOCK TABLE。(为了使得更快地插入到MySQL)。   

--add-drop-table   
  在每个create语句之前增加一个drop table。   

-e, --extended-insert   
  使用全新多行INSERT语法。（给出更紧缩并且更快的插入语句）  

--opt   
  同--quick --add-drop-table --add-locks --extended-insert --lock-tables。   
  应该给你为读入一个MySQL服务器的尽可能最快的导出。   

-t, --no-create-info    # 不写入表创建信息(CREATE TABLE语句）   
-d, --no-data   #不导出数据 

-p #有密码
-P #port_num, 
-u #user_name,
-h #host_name

1.导出整个数据库
  mysqldump -u 用户名 -p 数据库名 > 导出的文件名    
  jjkkkjGk

2.导出一个表
  mysqldump -u 用户名 -p --opt 数据库名 表名> 导出的文件名
  mysqldump -u wcnc -p --opt  smgp_apps_wcnc users> wcnc_users.sql

3.导出一个数据库结构
  mysqldump -u wcnc -p -d --opt smgp_apps_wcnc >d:\wcnc_db.sql

4.导入数据库
  常用source 命令
  进入mysql数据库控制台，
  如mysql -u root -p 
      </p>

  