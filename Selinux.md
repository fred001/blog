
  # Selinux

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:44:33 


      None


      <p>
      Selinux 
背景： 
http://linux.vbird.org/linux_basic/0440processcontrol.php#selinux
有三个模式: disabled, enforce（严格） ,Permissive (宽容，仅仅警告）
disable要变成其它两个状态，需要重启

1, 检查状态 
getenforce : 
setenforce 0|1 ,可以在开启的时候， 在宽容和严格模式之间切换

查看权限:
ls -l -Z FILE
权限位置 user,role,type FILENAME
修改权限: 
chcon -r ROLE FILE , 
chcon -u USER FILE
chcon -t TYPE FILE

不能 chcon USER.ROLE.TYPE FILE 

特殊用法，参照其它文件，赋与权限
chcon [-R] --reference=範例檔 檔案

恢复默认权限：restorecon [-Rv] 檔案或目錄


疑问：
1, 有什么用？


      </p>

  