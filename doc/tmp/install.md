# iamlosing.me install

1.  基本配置
2.  备份配置
3.  如何恢复？
=============


基本配置：  (没有任何资料前提）
      yum -y update 
        数据盘：
            /home 目录
                
                
                /home/share 目录
                    
                      








                ==============
                yum -y update
                yum -y install vim
                fdisk /dev/xvdb 
创建新分区 

mkfs.ext4 /dev/xvdb

vim /etc/fstab 

加入： /dev/xvdb1 /home/share  ext4  defaults 1 1 
执行  mkdir /home/share ;  mount -a

useradd  www
chown -R www.www /home/share


yum -y install git


重新建立 /home/share/repo 
重新配置   ~/.ssh


>>
>>配置 btsync
>>配置 nginx
>>
>>yum -y install nginx  php-fpm  gearmand redis
>>systemctl enable nginx  php-fpm gearmand redis
>>
>>配置 mysql 
>>配置 php-fpm
>>配置 gearman
>>配置 redis
>>
>>
>>
>>rpm --import https://linux-packages.resilio.com/resilio-sync/key.asc
>>
>>yum install resilio-sync
>>systemctl  enable resilio-sync
>>
>>
»/etc/resillio-sync/conf.json
A7OVGPAOAUODMMUCR446FRFSKQ33ERHSQ



配置 nginx
配置 mysql 





mariadb-server


mkdir /var/lib/php/session

chown www.www /var/lib/php
chown www.www /var/lib/php/session



yum -y install mutt

yum install php-mbstring



