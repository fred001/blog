
  # centos6.5安装配置

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:48:46 


      None


      <p>
      centos6.5安装配置


建立时间： 2014-08-02

1, install epel

rpm -Uvh http://ftp.cuhk.edu.hk/pub/linux/fedora-epel/6/i386/epel-release-6-8.noarch.rpm


1,
install rpmfusion 
yum localinstall --nogpgcheck http://download1.rpmfusion.org/free/el/updates/6/i386/rpmfusion-free-release-6-1.noarch.rpm http://download1.rpmfusion.org/nonfree/el/updates/6/i386/rpmfusion-nonfree-release-6-1.noarch.rpm


~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

yum groupinstall "Web Server" "LibreOffice" "Development Tools" "PHP support" 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

yum install 

ibus ibus-pinyin ibus-table-chinese \
wqy* iotop wget curl vim htop mysql mysql-server \ 
mysql-workbench httpd \ 
gstreamer-plugins-good gstreamer-plugins-base gstreamer-plugins-bad \ 
gstreamer-plugins-bad-free agstreamer-plugins-ugly gstreamer-ffmpeg \ 
libreoffice-math libreoffice-base libreoffice-calc libreoffice-core \
libreoffice-impress libreoffice-writer libreoffice-writer libreoffice-bsh \
libreoffice-draw libreoffice-langpack-zh-Hans \
php php-pecl-http php-mysql php-gd php-imap php-ldap php-odbc php-pear php-xml php-xmlrpc php \
cronolog glib2-devel gnome-utils \
rednotebook rhythmbox mplayer totem rhythmbox-upnp mpg123 mencoder pogo vlc \
wxpython pygame python firefox thunderbird gimp gedit evince \
NetworkManager-pptp pptp pptpd pptp-setup \
system-config-language python-openoffice gifsicle MySQL-python whois \
python-cssselect python-lxml PyOpenGL 



~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

其他： 
VirtualBox 
#yum install 
# VirtualBox,kmod-VirtualBox 
#usermod -aG vboxusers frd (then VirtualBox can use USB) 



~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


设置: 
ibus 
mysqladmin -u root password 123 
vim 


配置gedit 能识别中文（windows下产生的内容） 
以普通用户的身份运行: 
gsettings set org.gnome.gedit.preferences.encodings auto-detected "['UTF-8','GB18030','GB2312','GBK','BIG5','CURRENT','UTF-16']" 















数据同步：
1，/home/frd
2, /home/private
3, /home/public
4,/home/www
5, /root/bin



其他设置：
http: /etc/httpd/conf.d/
/etc/hosts




其他：
1， 下载flash 源
yum install flahs-plugin



yum install

rednotebook rhythmbox mplayer totem glib2-devel rhythmbox-upnp mpg123 mencoder pogo vlc

php-pecl-http
php-mysql php-gd php-imap php-ldap php-odbc php-pear php-xml php-xmlrpc
cronolog

system-config-printer-udev
system-config-printer

epson-inkjet-printer-escpr
gutenprint-cups






      </p>

  