
  # centos 7 安装 及配置

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:48:57 


      None


      <p>
      centos 7 安装 及配置

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

1， 下载centos7 
2, 创建liveusb 安装，复制centos7 的iso 到liveusb
安装时候需要选择来源，这个额外的iso镜像就是来源，否则光liveusb不能安装

3， 安装centos7 ,安装软件选择 gnome桌面， 子选项gnome软件和开发工具 
安装中创建frd帐号




centos7安装后配置

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
安装源: （从已下载的软件目录中 unicorn/install/centos7/） 
nux
epel
adobe
virtualbox

yum groupinstall "基本网页服务器" "MySQL 数据库客户端" "MySQL 数据库服务器" "MATE 桌面环境"



yum -y install php NetworkManager-pptp* wqy* thunderbird  PyYAML gstreamer-plugins-ugly 
yum -y install gstreamer1-plugins-bad-freeworld gstreamer1-plugins-ugly gstreamer1-libav \
epson-inkjet-printer-escpr \
cups-filters foomatic-filters gutenprint-cups audacious* 
yum -y install redhat-lsb-* iotop flash-plugin VirtualBox-4.3 htop wxPython pygame xournal gimp mplayer mplayer-gui

#别的包依赖这个
yum localinstall iscan-data-1.24.0-2.noarch.rpm 

yum localinstall iscan-2.29.2-1.usb0.1.ltdl7.x86_64.rpm 
yum localinstall epson-inkjet-printer-201207w-1.0.0-1lsb3.2.x86_64.rpm 

yum localinstall pywebkitgtk-1.1.8-1.el7.centos.x86_64.rpm 
cd rednote... ; python setup.py install


yum localinstall VirtualBox-4.3-4.3.20_96996_el7-1.x86_64.rpm 



yum -y update













配置：
终端的透明背景
终端字体
屏幕保护，禁止
电源，禁止
上下面板设置透明度
上面板增加程序
vpn配置
系统->外观->外观 设置字体和主题
usermod -aG vboxusers frd 

清除浏览器中的cnnic等证书
 Entrust.net Secure Server  Certification 
China
Cnnic

(firefox中删除只是去掉信任，重新打开实际还是存在）

禁止xp 自动更新根证书
输入法配置： ctrl+space 切换 ，双拼

安装完包后，重新配置打印机

firefox: flash ,firebug,adblock
其它：

（从已下载的软件目录中 unicorn/install/centos7/） 
安装rednotebook (python setup.py install，安装依赖，运行）、


安装下载的epson驱动，打印机才能正常
安装下载的VirtualBox


备注：
如需要禁止防火墙 : systemctl disable firewalld 
现在是firewall 替换了 iptables, 只是用iptable 清除规则是没有用的



~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
虚拟机安装
linux虚拟机安装扩展功能：
1， 建立到核心源代码的链接 ln -s /usr/src/kernel/KERNEL /usr/src/linux 
2, 然后执行光盘中的 VBOXLinux... 就可以了


~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
建立自定义服务
cp unicorn.server /lib/systemd/system/
systemctl enable unicorn

selinux disable
/etc/selinux/config



~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

安装hipchat






>>>centos7 修改启动等级 (graphical.target) 

切换到字符等级（相当于 runlevel 3) 
ln -sf /lib/systemd/system/multi-user.target /etc/systemd/system/default.target

切换到图形界面 (相当于runlevel 5) 
ln -sf /lib/systemd/system/graphical.target /etc/systemd/system/default.target

-s 软链接
-f 强制覆盖已存在文件





      </p>

  

安装 nux repo源
http://li.nux.ro/
