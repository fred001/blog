
  # linux--linux_autologin

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:17:36 


      None


      <p>
      LINUX_AUTOLOGIN
Linux 下设置开机自动登录

1.su - root 进入特权用户,输入密码.

2.编辑/etc/gdm/custom.conf

3.在【deamon】下添加

AutomaticLoginEnable=true

AutomaticLogin=root

4. 执行 init 3

5.执行 init 5

重启后OK了！

      </p>

  