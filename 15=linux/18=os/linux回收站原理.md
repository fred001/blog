
  # linux回收站原理

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:49:24 


      None


      <p>
      1 [Trash Info]
2 Path=/home/frd/tmp/test.ods
3 DeletionDate=2014-08-24T12:01:30


回收站：




功能： 
1， 删除后能恢复
2， 同名文件的删除，不会影响
3， 同路径的文件删除（大概会直接覆盖）

实现：
file 和 info 目录
1， 先寻找回收站是否有同名文件， 有则改名 ： xxx.[N].extension
2, 移动文件到回收站
3， 创建同名文件 xxx.transhinfo 再 info目录

测试：
1， 单文件删除恢复
2， 两个同名文件删除恢复

内部测试：
1， 删除， file, info 目录下
2， 两个同名文件删除 file,info目录下
      </p>

  