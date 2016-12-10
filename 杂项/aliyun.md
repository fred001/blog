# aliyun 

centos7 的系统，把 epel-release 替换掉了。
为了恢复，需要 重新替换  /etc/yum.repo.d/*  /etc/pki/rpm-gpp/* 两个目录的文件

然后才能恢复正常

并且默认安装了 aegis 服务，不时导致系统很卡
删除： /etc/init.d/aegis uninstall

