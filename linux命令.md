
  # linux命令

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 15:36:56 


      None


      <p>
      cd  PATH
cd  ~
cd -
cd ..

pwd


ls:
  -l   一行一个文件或者目录
  -a   所有文件和目录
  -A   所有文件和目录，除了  . 和 ..
  -B   不显示备份文件  ~结尾的文件
  -c   按照更改时间排序
  -t   按照更改时间排序
   -h  人类可阅读的格式显示size
   -S  用大小进行排序  
   -R 递归显示
-r 倒序排序
 --full-time 列出完整的日期和时间
  

  ls -lrSh  #按照尺寸排序， 最大在最后
  ls -ltr  #按照修改时间排序， 最晚在最前 
  ls -AF  #列出所有文件的分类
 ll     # 等于  ls -l


tree:
  树状格式显示文件，最后列出统计 （多少个目录，多少个文件）

   -a  #显示所有
   -d #仅仅显示目录
    -D #显示更改时间
  -f #显示相对路径
  -F  #显示文件类型
  -g #显示所属组
  -p  #显示权限
  -u   #显示拥有者
 -P PATTERN  #仅仅显示匹配的


tree -f  #显示详细路径
tree  -Dd #显示每个目录的修改时间
tree  -P t* /etc/xinetd.d  显示 t*的文件


mkdir: 创建目录
  -p  自动创建上层目录，若不存在
  -m MODE   #同时指定 权限
  

mkdir -m  644 doc #指定权限
mkdir -p  test/doc  #创建


rmdir:
  删除空目录

rmdir  test #如果 test目录为空， 则删除



mkfs: 创建文件系统

  mkfs  -t msdos  /dev/fd0  #软盘上创建 dos系统

mkisofs : 创建光盘文件系统
  默认情况下：  光盘映像中的文件名最长8字符，用 _ 替代原来的 .,
  另外 /home/user1/下以 . 开头的隐藏文件和目录也包含在内了

  mkisofs -r  -o  user1_cd  /home/user1/  #创建 user1_cd 光盘且保持权限
  mount  -o loop user1_cd.iso /mnt/cdrom  #挂载此光盘

mount: 挂载文件系统
  -a  #加载 /etc/fstab中的所有系统
  -t  #(minix,ext2,ext3,msdos,vfat,nfs,iso9660,ntfs,auto) # 指定设备格式
  -r  #只读
  -o 选项  #指定选项

 mount -t iso9660  /dev/cdrom  /mnt/cdrom  #把光盘挂载到 /mnt/cdrom下
 mount  #显示已经挂载的文件系统
 mount -t msdos  #显示已经挂载的 msdos系统
 mount -av -t noext3 # 挂载所有， 除了 ext3文件类型

umount : 卸载系统
  umount  /mnt/cdrom #

fdisk： 磁盘分区 （仅支持2T以下的硬盘，更高容量需要 parted)
  fdisk -l  #列出分区情况
  fdisk -l  /dev/sda  #列出  /dev/sda 分区情况
  fdisk /dev/sdb  #对 /dev/sdb进行分区管理
            n : 增加, d ： 删除分区,p：打印分区信息,t:改变分区类型了 ,w:分区完成，写入硬盘分区表（做完这一步才真正生效）

sfdisk:  显示分区表大小，显示指定设备的分区表，检查分区表和重新分区
   sfdisk -s /dev/hda1  #显示分区大小
   sfdisk -s  #显示所有设备大小
   sfdisk  -l /dev/sda  #显示磁盘相关信息

partd: 分区表管理 （分区完毕，需要另外再格式化每个分区）
  支持2T 硬盘， 支持重新划分分区
  它是即时生效的！

parted /dev/sda print  #显示分区信息
parted  /dev/sda  #修改磁盘分区 
   resize  1  30.2k  96M  #修改分区1的大小


df: 显示文件系统使用情况
  -a  #包含所有的文件系统
  -h  #用人类可读格式显示大小
  -H  #用人类可读格式，但是用1000字节为单位，而不是 1024单位

  df -h #显示当前文件系统使用情况 ，人类可读格式

du: 显示目录大小
  -a  #递归显示所有文件大小
   -h #人类可读格式
   -s #仅仅显示目录总计
  --exclude=目录或者文件  #略过指定的目录或文件
  --max-depth=目录层数    #忽略超过的目录层数


  du -h #显示当前目录所有文件的大小统计
  du -s -h #显示当前目录"." 的大小总计
  du -sh  /usr  /home #分别显示两个目录的大小

hdparm: 读取或设置硬盘参数
  hdparm  /dev/sda #显示硬盘参数
  hdparm -t /dev/sda #测试硬盘读取速度
  hdparm -T /dev/sda #测试缓存读取效率
  hdparm -C /dev/hdd  #显示硬盘电源管理模式
  hdparm -y /dev/hdd  #硬盘进入省电模式
  hdparm -S 0 /dev/hdd #关闭硬盘省电模式
  hdparm -c /dev/hdd  #查询32位 I/O模式信息
  hdparm -d /dev/hdd  #查询 DMA模式信息


stat: 显示 inode内容
 stat Documents #显示 Document的信息

sync: 强迫缓存数据写入硬盘

   sync  #无需参数


文件管理：
cat  #查看文件
  -n #显示行号
  -s #把多个连续空行，合并成一个空行

  cat -n   FILENAME #查看新文件

touch # 更新文件的访问和修改时间，若文件不存在，则创建
  
  -r 参考文件  #由参考文件的 修改时间 来设定

  touch FILENAME #更新该文件的修改时间为当前时间

ln: 建立链接
  -s  #软链接，不同于硬链接， 硬链接不能跨设备

   ln -s /bin/ls  hlnls  

mv #移动和重命名文件
  -b #若覆盖文件，覆盖前先备份
  -i  #交互式
  -f #强制，不交互
  -u  #如果目标文件更新，则不移动
   -v #详细信息

  mv -i abc /home/abc-ne  


rm: 删除文件
 -i #交互式
  -f #不交互，强制
  -r #递归,用于删除目录

 rm -r DIR


more: 查看文件，分页显示，适合大内容文件
less: 类似 more,但是运行回卷已经浏览过的内容

head :查看文件头部内容
  -n NUMBER #显示目标文件前Number行，默认10
  -NUMBER  #指定显示的行数

tail: 查看文件尾部
 -f  #监控文件增长
  +行数 #从给定的行数开始显示，直到末尾

cut : 查看目标文件指定部分
 -b <n1-n2> #选定每行中第n1-n2字节的内容
 -c <n1-n2> #指定字符范围
  -f <n1-n2> #指定子段范围 ，字段默认 tab分割
  -n #和 -b 一起使用，不分割多字节的字符，如汉字
  -d 分隔符  #指定分割符

cut -b0-3 address #

od: 以不同进制显示文件

  -a  #字符形式
  -b #八进制
   -c #ascii码
  -d #无符号10进制
   -h  #十六进制
   -i #十进制



file: 查看文件类型
  -f  从文件中获取文件名

  file a  #显示a的类型

chown: 改变文件属主
 -R #递归
 --reference=文件名  #使用指定的文件或目录类型
 
 chown  USER  FILE 
 chown  USER.GROUP  FILE


chgrp: 改变文件组属组 （和chown参数类似， 唯一的用途是仅仅改变组时候用）
  chgrp -R DIR 


chmod :改变文件权限
  -c  #当权限确实改变，显示改变信息
  -R  #递归
  --reference=文件名或目录 #使用其它文件的权限
   
   mode:   u(user) ,g(group),o(other),a (all)
           r(read),w(wreite),x(execute)
             +(add) , - (remove)
            r=4,w=2,x=1
   
   chmod -c  a+rwx  abc 
   chmod -R  -c  g+w,o-w,o-x  software 
   chmod 755  abc
   

touch:改变文件时间戳
  -a  #仅修改访问时间
  -m #仅修改修改时间
  -c #若文件不存在，不创建它
  -r<参考文件或者目录> #使用参考文件的时间
  -d<时间日期字符串>  #使用指定的时间

  touch  -ad "2008-08-08 12:08"  test 
  touch  -r  test  dir #用test的时间设置


umask:设置文件默认掩码

   x权限默认不存在， umask无法设置，只有手动chmod才能设置
  
  umask #显示当前掩码
  umask 002 #设置掩码


chattr: 高级文件权限管理

   chattr +aS myself.log # S 修改立即写入硬盘，a ，只允许 append

lsattr: 查看文件高级权限
   
    -R #递归

>>>文件比较：
cmp  ：比较文件是否相同
    
    cmp  abc  abc2

  
comm: 对有序文件进行比较
  比较文件必须存在并且已经排序
  不支持目录
  仅仅支持2个文件

  -1 #第一个文件中出现的不显示
  -2 #第二个文件中出现的不显示
  -3 #第一个文件和第二个文件中同时出现的内容不显示

  comm old new #
  comm -12 old new #仅仅显示两文件中不同的行

diff : 比较文件的差异，显示如何修改能达到一致
   -u #以合并的方式显示文件的不同

  diff FILE1 FILE2
  diff -uN FILE1 FILE2 > fil2.patch
  patch -p0 < file2.path

sdiff :  diff变种， 两列显示两个文件的区别
  sdiff FILE1 FILE2


diff3: 比较3个文件的不同之处， 并将不同的文本范围输出到屏幕
  

cp:复制或备份文件
  -a #复制目录时使用， 保留链接，文件属性，并递归复制目录
  -b #若目标文件已存在，则创建备份文件  （末尾加~)

  cp -iar abc  /backup 
  cp -ii abc /backup


tar:文件归档
  tar [主选项+辅选项] 文件或目录
   主要选项
   -c  #创建档案文件
   -x  #从档案文件中提取文件
    -r #追加文件到档案
    -u #只添加比档案中更新的文件
   -t #列出档案内容
    辅助选项
     -f #指定档案文件名称
      -v #显示详细信息
       -z #用gzip压缩/解压
       -j #用bzip压缩，解压

   tar -cvf etc.tar  /etc 
   tar -cvfz etc.tar.gz  /etc
   tar -cjvf etc.tar.bzip2 /etc
   tar -tvf  etc.tar  #查看档案内容
   tar -xzvf etc.tar.gz
    tar -xjvf etc.tar.bzip2
    
    
   
cpio : 备份文件集和
  cpio [主参数] 【辅助参数]  文件名
   运行模式： 
     copy-out:   保存成归档
     copy-in:   提取文件自归档
    pass-throuth: 合并 copy-out和copy-in功能，从一个目录向另一个目录，
              或从一个文件系统向另一个文件系统复制文件

    主参数：
   -o  :建立归档
   -i  #还原
   -t #显示内容

   可选参数：
     -A  #附加到归档
    -F #指定归档名称
    -r  #互动模式，可以修改文件名
     -v #详细信息
    -n #用用户ID 和群组ID 替代名称来显示文件清单

   find -print | cpio -oVB > /backup/user.cpio  #备份
   cpio -i < /backup/userdata.cpio  #还原到当前目录


dump:备份文件系统 (仅支持 ext2/ext3)系统
  -0 ,-1 ... -9  #代表不同的备份策略， 0是完全备份， 其它是增量备份，默认  -9
  -f #指定备份的文件
  -u #备份完毕后， 在/etc/dumpdates 中记录备份的文件系统级别，级别，日期与时间

   dump -0fu root@hostname:dev/hda0   /  #备份整个文件系统
    dump -0f /dev/nst0  /home/user1
  dump -8f /dev/nt0 /home/user1  #增量备份


restore: 恢复还原dump备份的内容  （可能用途不大，因为目前其它文件系统占主流了）
  restore -tf /dev/fd0  #查看备份内容
  
   
ar: 将多个文件创建成一个库
  ar [主选项] [辅选项] [成员文件名] [count] 库文件名  [成员文件...]

  ar -rv  utillity tool.o random.o #
  ar -tv utility #查看内容
  ar -qv  utility add.o #增加一个文件

 
>>>文件压缩,解压
  
bzip2: 压缩工具（效率比较高），仅仅能压缩文件，不能压缩目录，所以通常用 tar打包目录先
  -d #解压
  -v #显示压缩文件比
   -c #将压缩/解压结果输出到标准输出


  bzip2  -v ra* #压缩所有文件
 bzip2  -dc  abc.bz2 #显示压缩文件的内容
 

bunzip2 #文件解压缩 （bzip2 -d)
  -t #检查压缩文件完整性
  -k #解压缩时，保持原始文件不变

  bunzip2 -t *.bz2 
  bunzip2  *.bz2  #解压缩
  bunzip2  -k *.bz2


bzcat : 解压文件到标准输出  （相当于 bzip2 -dc  , bunzip -c)
  bzcat  abc.bz2


gzip# 另一个常用压缩，解压命令
  -c #输出到标准输出
   -d #解压
  -l #显示压缩信息
  -r  #若是目录， 递归处理（这点比bzip2强）
  -t #测试压缩文件完整性
  -v #显示每个文件的文件名和压缩比
   -9, --best #最高压缩比，最慢速度
  -1 ,-- fast #最低压缩比，最快速度
  -6 #默认的压缩比和速度

(此处有问题，可能是压缩，而不是解压缩， 或者书本错误）
   gzip * #解压缩所有 gz文件
   gzip -dv * #解压缩所有文件，并显示信息
   gzip  -l *  #仅仅显示信息，不实际解压
   gzip -r software  #递归压缩software目录


gunzip #解压缩 
  gunzip -v  *.gz 

gexe: 压缩/解压缩 可执行文件

  gzexe /bin/ls  #压缩，成功后原文件成为备份文件 ~ ,目标文件替代原文件
  gzexe -d /bin/ls #解压缩

  
zcat :gzip的 bzcat,仅显示内容
  zcat test.gz 

bzip2recover #修复损坏的 bzip2文件

  bzip2recover abc.bz2


zip: 多平台支持的压缩，解压格式
  
  zip  test.zip  test/ #压缩目录
  zip   ab.zip  a b/ #压缩多个

unzip: zip解压 (每次只能解压一个）
  -l  #显示压缩文件内的文件 
   -d #指定解压后存储的目录（默认当前目录）

  unzip test.zip 

zipinfo: 显示zip压缩文件的信息

  zipinfo  -l ab.zip


>>>文件查找与定位
find : 强大的文件查找命令
  
	find /etc -name ftp * #文件名为 ftp
	find ./ -size 1000c #1000字节的文件
	find ./ -size +1000c #大于1000字节的文件
	find ./ -size -1000c #小于 1000字节的文件
	find ./ -size +1000c -and -2000c #大于1000字节，小于等于000字节   
	find ./ -amin -10 #最后十分钟访问的文件
	find ./ -atime -2 #最后48小时访问的文件
	find ./ -empty  #当前目录下空的的文件或者文件夹
	find ./ -group user1 #属组是user1的文件
	find ./ -mmin -5 #最后5分钟修改过的文件
	find ./ -mtime -1 #当前目录下最后24小时修改过的文件
	find ./ -nouser #当前目录下作废用户的文件
	find ./  -user user1 #属主是user1的文件
	find ./  -perm 644  #权限是644的文件

	find ./  -size +1000c -and -mtime +3 -and -name abc* #符合3个条件的文件
	find ./  -size +1000c -or -mtime +3 #符合其中一个条件即可
	find ./  -!\(-size +1000c -or -mtime +3\) #用括号提高条件计算优先级
	
	find ./ -exec file {} \; #查找到的文件，用 file命令执行之


whereis: 系统内置位置查找
   whereis   ls


locale: 从系统文件数据库中查找，比 whereis 复杂，比find简单
  locale  ls

which:比 whereis 更简单的查找，仅仅在环境变量中查找
  which  gcc g++


grep: 文本搜索
	-c #输出匹配行个数
	-v #反转，显示不匹配的
	-n #显示行号
	-i #忽略大小写
  -A NUMS  #同时显示接下来的几行
  -B NUMBS #同时显示上面的几行



	ls -l | grep ^d #当前目录下的目录文件
	ls -l | grep ^[^d] #除目录文件以外的文件
	ls -l | grep -i july #六月份创建的文件
	ps -ef | grep sshd #显示只含有 sshd的行

  grep -A 10 add words.txt  #显示有add的行，和之后的10行
	

egrep #比grep更强大， 体现在正则表达式更强大

fgrep #不使用*等正则表达式，因为功能弱，但是速度快


tee: 文件保存到多个副本，并输出在屏幕
  tee file1  /backup/file2  /tmp/bak/file3   #显示文件内容，并保存到两个文件中

paste: 合并显示多个文件的内容
	-d<分隔符> # 指定分隔符，默认 tab ,分隔符只能是单个符号

	paste  -d* file1 file2
  
patch: 文件补丁
	patch -p0 file1  file2.patch
	patch -p0 <file2.patch
  

sort:排序文本
	-d #按字典顺序排序
	-f #忽略大小写
	-I #忽略非打印字符
	-r # 逆序
	+<pos1> -<pos2>  #指定按某些字段排序
	-t<separator> #指定字段分隔符

	sort test #排序test 文本
	sort +1 -2  test
	sort -r +0.1  -0.2  test #按照第一个字段，第一个字符排序


split #文件切割
	-<行数>或 -l<行数> #按照行来分割，多少行一个文件

	split -l 2 test   #当前目录下生成  xaa,xab,xab的切割文件
	split -l 2 test  split  #在当前目录下生成splitaa,splitab,splitab的切割见
	split -l 2 -d test  #在当前目录下生成 x00,x01,x02的切割文件
	split -l 2 -a 3 -d test	#在当前目录下生成x000,x001,x002的切割文件

sed: 强大的文本处理
	sed '1,2d' test
	sed '2,$d' test
	sed '$d' test


uniq: 去除重复行 （需要文件先排序好）
	-c  #显示该行在文件中出现的次数
	-d  #只显示重复行
	-u  #只显示文件中不重复的行
	-f<NUM> #指定判断的字段，而不是按整行

	sort test | uniq - uniqtest # 排序并去除重复行， 保存成 uniqtest
	uniq -f 1 logfile #按第二个字段进行判断， 去除重复


wc： 文本统计
	-c #显示字节个数
	-m #显示字符个数
	-l #显示行数
	-L #显示文件中最长的行
	
	wc -w test
	wc -l test

tmpwatch: 自动删除临时文件
	
	tmpwatch 7*24 tmp #监控此目录下的文件， 7天内无访问则删除


indent: 美化c代码

	indent -bad  -bap -bc -bl -psl test.c



>>>系统管理命令
ac : 统计用户在线时长
	-p<用户名>  #无用户名则显示所有用户的登陆时间
	-d #显示每天的在线时间

	ac -p
	ac -d
	ac -d -y -p root

adduser: 创建用户
	-g #指定组
	-G #指定附加组
	-e #指定帐号有效期
	
	adduser  Tony
	adduser -d /home/guest -e 2008-05-01 -g guest guest

clear:清楚屏幕
	clear

gpasswd : 管理组信息  /etc/groups
	-a user group  #将用户添加到组
	-A user group  #指定组的管理者
	-d user group  #将用户从组中删除
	-M user group  #指定组的成员
	-r group #解除组的密码
	-R group #禁止使用newgrp命令访问组文件

	gpasswd -a Tony guest #Tony加入到guest组
	groups  Tony  #查看 Tony的组
	gpasswd -d Tony guest #guest组中去除 Tony

groupadd : 增加组
	
	groupadd Test #创建Test组
	groupadd -g 888 Test888

groupdel :删除组
	groupdel Test888

groupmod : 修改组的相关信息
	-n<新组名> #更改组名
	
	groupmod  -g 999 -n Test999 Test888 #修改组名和组 ID

groups :显示用户的所有组
	groups  Tony

grpck :校验组和用户文件/etc/groups /etc/gpasswd
	-r #只读模式运行
	
	grpck 



grpconv  : 启动linux系统中影子密码功能
	用 /etc/shadow, /etc/gshadow 替代  /etc/passwd /etc/group ，禁止普通用户访问
	
	grpconv

grpunconv :禁止 linux系统中影子密码功能
	grpunconv


id :显示真实有效的UID和GID

	-g #显示用户组的ID
	-G #显示用户附加组的ID
	-n #显示用户，组，附加组的ID
	-u #显示用户ID
	
	id
	id -u -r user1
	id -G -n root
	
last: 显示用户登陆信息
	-a #在最后以行显示登陆系统的主机名或IP
	-d #将IP转换成主机名
	-x #显示系统关机，重开机以及执行等级的改变等信息
	
	last -n 3 #最近登陆系统的3名用户信息
	last -n 9 -d #显示最近9名用户的详细信息
	last tty1 -R -n 10 #最近10名从tty终端登陆用户的信息
	last -t 200707010000000 #显示从2007年7月1日零点以后所有最近登陆信息
	
lastb : 显示所有失败的登陆信息
	lastb -n 10 #最近10条登陆失败信息

lastlog: 显示最近登陆用户的用户名，登陆端口和登陆时间 (/var/log/lastlog)
	-t<天数>  #显示最近指定天数内登陆信息
	-u<用户ID> #显示指定用户ID最近登陆信息
	
	lastlog -u user1


login: 用户登陆到linux系统
	不是很明白怎么用，一输入， 终端就没掉了

logname: 显示当前登陆的用户名
	logname

logout: 推出系统
	logout


logrotate #管理日志文件
	-v ：显示详细信息

	logrotate -v  #自动调用配置文件，对日志们进行处理

newgrp:  更改用户的组

	newgrp Test #更改当前用户的新组为 Test

passwd: 设置用户密码
	-S #列出密码相关信息
	
	passwd #设置当前用户密码
	passwd user1 #设置user1的密码，仅管理员才能用

	passwd -S user1 #列出user1的密码状态

pwconv : 将用户密码转换成影子密码
pwunconv :关闭影子密码功能


su: 切换用户
	-c<命令>  #执行完指定命令后，恢复原来身份
	-l #同时改变工作目录
	-m #变换身份不改变环境变量

	su  #默认切换到 root,不用变更USER ,LOGNAME变量
	su -c ls user1 #切换用户，执行命令ls ,并结束切换

sudo : 以其它身份执行命令 (默认5分钟后需要重新输入密码（自己的密码））
	/etc/sudoers 中允许的用户才能执行
	
	-u<用户名>  #以指定用户的身份运行，默认是 root
	-v #延长密码有效时间，默认5分钟
	
	sudo ls /root   

	
userdel: 删除指定的用户账目
	-r  #删除指定用户的登陆目录以及目录中所有文件和子目录
	
	userdel USER

usermod: 修改用户账户信息
	-g  #修改用户所属的组
	-G  #修改用户所属的附加组
	-L  #锁定用户密码， 是密码失效
	-U  #解除密码锁定
	-l <账户名称> #修改用户账户
	
	usermod -l user01  user1 #
	
users: 显示当前的登陆情况
	users

w: 显示当前用户登陆系统用户的信息
	-h  #不显示标题信息行
	-l  #使用详细格式列表
	-s  #使用简洁格式列表

	w
	w  -fshu


who :显示当前登陆系统的用户信息
	-H  #显示各栏目的标题信息列
	-u  #显示闲置时间，若用户之前1分钟有操作，显 . ,超过24小时没有动作，  old

	who -u 
	who -H -u

whoami: 显示登陆用户名称
	whoami


>>>SHELL命令
bash : shell解释器
	-c<字符串>   #从字符串中读取命令，并执行

	bash -c ls

chsh: 更换登陆系统时使用的shell
	-l  #列出系统目前可用的shell
	-s  #更改系统默认的shell环境

	chsh -l
	chsh -s  /bin/zsh user1

declare : 声明shell变量
	
	declare  City="Beijing" Street="Chang An Road"
	declare -p City Street

echo :标准输出设备显示文字
	-n #不在参数最后加上换行符
	-e #将下面字符当成控制字符
		\a,\b,\c,\f,\n,\r,\t,\v\\,\nnn


enable: 启动/关闭 shell内部命令
	-a #显示所有的内部命令
	-p #显示所有允许的内部命令
	-n #禁止所有的内部命令


	enable -p
	enable -n cd #禁止cd
	enable  cd  #允许cd


eval : 将参数组合成一个新的命令并执行
	command="ls -l" 
	eval $command   #执行此命令


exec: 执行指定命令后交出控制权
	
exit: 退出当前shell环境
	exit [状态值]
	
	exit -1
	exit 0
	 

fc: 批处理执行选定的历史命令

fg: 将程序或者命令切换到前台执行
	jobs #显示作业情况
	fg 1 #第一个作用提取到前台

help #显示shell内部命令的帮助
	help cd

history: 显示命令历史
	-c #删除所有的历史记录
	N  #显示最近N次使用过的命令

	history 5
	!69 #执行69 的那个命令

set :设置shell
	set #显示当前所有变量和值
	

suspend #暂停执行shell
	

ulimit: 控制shell程序使用的资源
	-a  #显示当前资源限制设置
	-m<内存大小> #指定可用内存的上限，单位为 千字节
	-n<文件数目>  #指定同一时间最大可打开的文件数
	-t<CPU时间） #指定CPU使用时间的上线，单位为秒
	-v<虚拟内存大小>  #指定可使用的虚拟内存上限，单位为千字节
	-f<文件大小>  #shell所能建立的最大文件， 单位为扇区
	-u<程序数目> #用户最多可启动的程序数目

	ulimit -a 
	ulimit -f 1024 -m 1-24 -u 2048
		
		
unset :删除变量或函数
	-f  #仅删除函数
	-v  #仅删除变量

	unset -v COLUMNS  #删除 COLUMNS变量


accton: 打开，关闭进程记录
	激活后，可以使用lastcomm来监测系统中任何时候执行的命令

	Usage: accton [OPTION] on|off|ACCOUNTING_FILE

	accton /var/log/pact


anacron: 周期运行，不管计算机是否24小时开机
	/etc/anacrontab
	
	-d #把信息输出到标准输出设备和系统日志，同时输出以Email形式发出
	-f #强制执行作业，忽略时间戳
	-h #马上开始执行作业
	

at: 在指定的时间执行命令
	-d<作业编号>  #将执行的作业删除
	-f<文件>     #从文件中读取要执行的命令
	-l 		#显示等待执行的作业，= atq
	-m	#以Email方式传回
	-q<队列>  #使用指定的命令队列

atd: 显示最近的作业队列信息
	-b<间隔时间> #设置两个作业启动时间，以s为单位，默认60s
	-s #只执行一次队列中的批处理命令

	atd -l 1 #设置CPU 负载为 1

atq: 显示目前使用at命令后待执行的命令队列
	atq

atrm: 删除at命令中待执行的命令队列
	-d<作业编号>  #删除指定作业编号的作业

	atrm 作业编号

atrun: 显示最近的作业队列信息
	atrun -l 1 #设置CPU负载为 1


bg:命令后台运行
	bg 作业编号

jobs: 显示后台执行的作业
	-l #只列出作业的执行程序号
	-n #只列出状态改变的作业
	-p #只列出作业的执行程序号

	jobs


init: 处理控制初始化
	0 #安全关机
	1 #管理模式
	2 #多用户模式
	3 #多用户网络
	4 #交替的多用户环境设置
	5 #停止并转到硬监视器
	6 #停止并启动到 /sbin/initab中  init默认项定义的状态
	
	init 1

kill  #结束进程
	-l #列出信号名称和编号
	-s<信息名称或编号>  
	
	kill -9  PROCESS_ID
	kill -l 


nice: 命令优先级设置
	-n<优先级>  #设置命令优先级 (-20 - 19 数字越低越高)
	
	nice -n -5 find / -name core > /tmp/core 

nohup : 不停止执行程序
	nohup  command & #执行的命令忽略  handup(挂起） 信号


pstree: 显示进程状态数
	-h #特别标明现在执行的程序
	-p  #显示程序识别码

	pstree -h -p 


renice : 重新分配优先权
	-g <程序群组名称>  #修改属于该组的程序优先权
	-p<程序识别码>     #改变程序的优先权
	-u<用户名称>      # 修改属于该用户的程序优先权


sleep :暂停执行程序
	sleep 10s ; ls -al  #停止10秒后， 再执行程序


>>>系统设置命令
alias : 设置命令别名
	alias #显示当前设置的所有别名
	alias cd1="cd /tmp/user1/doc/manuscripts"

unalias:取消别名
	-a  #删除所有别名

	unalias mv 

bind: 显示或设置键盘按键及其组合键的有关功能
	-d #显示按键设置的内容
	-f<按键设置文件>  #载入指定的按键设置文件
	-l #列出所有功能
	-m<按键设置>  #默认emacs, 其它还有 emacs-meta,emacs-ctlx,vi,vi-move,vi-insert
	-q<功能> #显示指定功能的按键
	-v #列出目前的按键设置与功能
	
	bind -l #列出所有功能

chkconfig:  检查，设置系统的各种服务
	--add  #增加指定的系统服务
	--del  #删除指定的系统服务和启动文件中的有关数据
	--level<运行等级>  #0 ~ 7
	--list #列出所有系统服务
	on/off  #关闭或者开启某项服务
	eset #重启某服务

	chkconfig --list #
	chkconfig --list Bluetooth 
	chkconfig --level 0 bluetooth on
	
chkfontpath : 配置x字体路径
	--add<路径名>  #在x子图路径列表中增加新的路径
	--list  #列出所有x字体路径
	--remove<路径名>  #删除一个路径

	chkfontpath --list
	chkfontpath --remove 路径名

chroot : 改变根目录
	
	chroot /home/user1  #系统会提示错误，因为该目录下不存在bash

clock :调整RTC 时间
	
	clock  #显示当前系统的硬件时钟
	clock --set --date<日期时间>

crontab : 定时执行任务
	-e  #编辑指定用户的任务
	-l  #列出指定用户的任务
	-r  #删除指定用户的任务
	-u<用户名> #指定要设置的用户名

	crontab -r -u user1

depmod: 模块依赖性及检查
	
	depmod -n 

dircolors : 设置目录显示时的颜色
	-p #显示默认设置
	
	dircolors -p

dmsg: 显示开机设备信息
	
	dmsg

export: 输出或显示环境变量
	-f #指定[变量名] 所指变量为函数
	-n #删除指定的变量
	-p #列出所有shell赋予程序的环境变量

	export -p
	export HOME="/"


fbset:设置设备帧缓冲区的大小

free :显示内存使用情况
	-m #MB为单位显示
	-s <间隔秒数> #持续观察内存使用情况
	-t  #显示内存综合列

	free

grub: 现在已经是grub2了
grub-install:
grub-md5-crypt:

hwclock: 显示与设置硬件时钟
	--show #显示硬件时钟的时间和日期
	
	hwclock --show

insmod :载入模块
	-p  #测试模块是否能正确地载入kernel

	insmod -p /usr/local/src/dlink-530/via-rhine.o

lsmod: 显示已载入系统的模块
	
	lsmod


kbdconfig: 配置键盘
	--test  #仅作测试，不会实际更改设置


	
make: 维护和编译软件或软件包
modinfo: 显示模块信息
	-a #显示模块开发人员
	-d #显示模块说明
	-p  #显示模块支持的参数

	modinfo 8139too

modprobe: 自动处理可载入模块
	-a #载入全部模块
	-l #显示可用模块
	-t #指定模块类型
	
	modprobe -l -t bluetooth

ntsysv: 设置系统的各种服务
	ntsysv --level 0 

procinfo: 显示系统状态
	-a #显示所有信息
	-b #显示期盼设备区块数目
	-d #显示系统信息美妙变化差额
	-m #显示系统模块和外围设备等相关信息
	-s #显示系统的内存，磁盘空间,IRP,DMA等信息
	
	procinfo -m 

reboot: 重新启动系统
resize: 设置终端机窗口大小
	-s 列 行 #设置
	
	resize -s 800 600

rmmod: 删除模块
	-a #删除所有目前不需要的模块
	
	rmmod rfcomm


rpm: 软件包管理
	-a #查询
	-i #显示信息
	-l #显示文件列别
	-q #询问模式

	rpm -ivh test.rpm #安装软件包
	rpm -e test #删除软件包
	rpm -q test #查询软件包

setup: 设置系统
	setup


shutdown ：关闭计算机
	-h #关机
	-k #送出信息，不会实际关机
	-r #重启

	shutdown +1  "shutdown in 1 minute' #送出信息并在一分钟之后关机

timeconfig :时区设置
	timeconfig --back


tload: 显示系统负载状态
	-d 间隔秒数 
	-s 刻度大小 #设置垂直刻度大小
	
	tload -d 1 -s 1


	
badblocks :检查磁盘中损坏的扇区
	-s  #显示进度
	-v  #显示详细信息
	-w  #检查时，执行写入测试

	badblocks -s -v /dev/sda1 10000 #检查 /dev/sda1的前1000块
	badblocks -s -v /dev/sda1 1000 1000  #检查1000  ～～ 10 000 块


cksum: 检查文件的CRC
	cksum /etc/passwd

fsck: 检查文件系统并尝试修复错误
	-a  #自动修复系统，不询问问题
	-A  #依照/etc/fstab配置，检查所有文件系统
	-N #不执行命令，仅列出实际执行会进行的动作
	-r #互动模式
	-V #显示执行过程

	fsck /dev/sda1

fsck.ext2 :检查ext2文件系统并尝试修复错我

md5sum : md5函数值计算和检查
	
	md5sum test1.c > test1.md5
	md5sum -c test1.md5 #会在这个文本文件，找到 原文件的文件名，并进行检验


>>>网络配置
ifconfig : 查看或设置网络接口
	ifconfig #显示当前网络接口信息
	ifconfig eth0 #显示eth0网络接口信息
	ifconfig eth0 192.168.0.100 #设置eth0的IP
	ifconfig eth0 netmask 255.255.0.0  #设置子网掩码
	ifconfig eth0 up #启用eth0
	ifconfig etho0 down #禁用eth0
	ifconfig eth0 add fe80::20c:29ff:fe5f:27ef:64  #为eth0增加ipv6地址
	ifconfig eth0 mtu 800
	ifconfig eth0 promisc #启用网卡的promisc模式，接受网络内所有数据包
	ifconfig eth0 -arp  #禁用arp协议
	ifconfig eth0 arp  #启用arp
	ifconfig eth0 hw ether 00:AA:BB:CC:DD:EE  #修改网卡的硬件地址（需要首先ifconfig eth0 down后修改)
	
hostname: 查看或设置主机名
	设置主机名重启后恢复旧主机名，永久设置，需要修改 /etc/hostname	

	hostname:  查看或设置系统主机名
	domainname : 
	dnsdomainname
	nisdomainname
	ypdomainname

	-a #显示主机别名
	-d #显示DNS域名
	-i  #显示主机的IP

	hostname 
	hostname -i

route: 查看或设置路由表
	add : 增加一个新的路由
	del : 删除路由
	dev if #路由使用if设备
	gw GW #通过GW网关发送数据
	irtt...  (残缺）
	metricM  #设置路由度量区域
	mod,dyn,reinstate #安装动态或模块化路由
	mss M #设置 TCP  MSS(最大段尺寸)
	netmask NM  #设置网络掩码
	reject  #设置堵塞的路由
	target  #目标主机或网络
	window W  #设置TCP窗口大小为W字节
	-A family #指定地址族 ，如inet
	-C #在内和的路由缓冲区中进行操作
	-e #用netstat格式显示路由表
	-ee #创建一个包含路由表所有参数的行
	-F  #在内湖的FIB中进行操作（默认）
	-host #指定目标主机
	-n #显示数字地址，不监测主机符号名
	-net #指定目标网络
	-v #显示命令执行的详细信息

	route  #显示路由表
	route add -net 192.168.76.0 netmask 255.255.255.0 dev eth0
	route del -net 192.168.76.0 netmask 255.255.255.0 dev eth0
	route add -net 10.0.0.0 netmask 255.0.0.0 reject

arp: 查看或配置arp缓存
	-s #创建arp
	-d #删除arp

	arp #显示arp缓存
	arp -v #显示arp缓存详细信息
	arp -s 192.168.78.20 00:50:56:19:B2:C9 #加入arp
	arp -d 192.168.78.20

nestat: 查看网络状态
	-r  #显示内核的路由表
	-I  IFACE  #显示 IFACE 接口信息
	-i  #显示网络接口信息
	-g #显示组播功能组组员名单
	-n #直接使用IP，不解析
	-a #显示所有套接字
	-l  #显示侦听中的套接字
	-p #显示socket的进程PID和程序名

	netstat
	netstat -i
	netstat -g
	netstat -r
	netstat -l
	netstat -s #显示统计信息
	netstat -t
	netstat -tn

ping:监测网络主机
	-c 次数  #指定发送的次数
	-I 网络接口  #使用指定的网络接口，默认 eth0
	-M hints #选择MTU发现策略
	-n #只以数字形式输出信息，不尝试查找主机名
	-b #允许监测光坡地址
	-R #记录路由过程
	-s SIZE #设置IP包大小
	-S SENDBUF #设置套接字发送缓冲大小
	-W TIMEOUT  #设置接受目标主机一个回应请求确认的超时时间
	
	ping www.163.com
	ping www.164.com -c 4
	ping -n www.163.com


tcpdump : 转存网络传送数据 (强大的网络监控工具）

	tcpdump
	tcpdump -c 5

traceroute: 追溯路由
	-i 网络接口 （使用指定的网络接口）
	
	traceroute 192.168.0.21
	traceroute -n www.163.com


dig :域信息搜索器
	dig sohu.com +nssearch
	dig uestc.edu.cn +trace
	dig -x 202.112.14.184

ipcalc : IP计算器
	-m #显示指定IP的子网掩盖码
	-h #显示指定IP的主机名
	-n #显示指定IP的网络地址

	ipcalc -m 202.115.31.1
	ipcalc -h 192.168.78.26


netreport : 监视网络状态
	-r #删除调用netreport进程的当前请求

	netreport -r #当网络状态变化后，将会发送通知，并删除当前请求



>>>PPP链接管理命令

pppd :ppp协议守护程序
	pppd noauth
	pppd noauth logifle ppp.log
	
pppstats: 显示PPP状态
	-a #显示绝对统计值
	
pppdump: 转换PPP 记录文件
minicom: 串行口通信程序
setserial:设置或显示串口

>>>PPPoE链接管理命令

pppoe: PPPoE 客户端
pppoe-server : PPPoE服务器
pppoe-relay:  PPPoE中继代理
pppoe-sniff : PPPoE 探测器
adsl-setup:  配置PPPoE客户端
adsl-connect: 管理PPPoE链接
adsl-start: 启动PPPoE链接
adsl-stop: 关闭PPPoE链接
adsl-status: 显示PPPoE链接状态

wget: 网络下载器
	-r #递归下载
	-l DEPTH #设置递归深度
	-O FILE #大写的字母o ,下载数据保存此文件
	-c #断点续传

	wget -b  202.118.66.15/pub/books #后台执行下载任务
	wget --progress bar 202.118.66.15/pub/books #以条状显示下载进度
	wget -limit-rate=100 202.118.66.15/pub/books #限制下载速度为100bit/s

>>>网络通信命令
write :向单铬用户发送信息
wall: 公布信息 
	wall hi,i am user1

talk: 聊天命令

telnet :远程登录
	telnet 192.168.1.10 22
	telnet -l user2 192.168.1.10

ssh: 安全的远程登录
	ssh ada.org
	ssh user2@ada.org
	ssh -l user2 ada.org
sftp: 安全的文件传输
scp :安全的主机间复制文件

lftp:文件传输



apachectrl: apache服务器控制
	configtest #检查配置文件
	fullstatus #完整报告
	graceful #重启后台守护进程，更优雅
	graceful-stop #优雅停止后台进程
	restart #重新启动
	start #启动
	stop #停止
	status #显示简要报告
	
	apachectl start
	apachectrl stop
	apachectrl restart


>>>Samb 服务器相关命令
testparm : 测试samba 的设置是否正确无误
	testparm /etc/samba/smbconf  ada192.168.33.129

smbstatus: 查看samb服务器状况
	-u 用户名 #查看特定用户对资源的服务情况
	-b #以简介的方式输出
	-d #详细方式输出
	-p #列出现有的smb进程
	-s 配置文件  #指定配置文件

	smbstatus 
	smbstatus -u pyx

smbclient : Samb服务器客户端命令
	-L 显示服务器端共享出来的资源
	
	smbclient -L 127.0.0.1
	
ed: 单行文本编辑器
	a  #inputmode (append)
	c  #input mode  (change)
	i  #input mode  增加到前一行
	d  #删除最后以行
	n #显示最后一行的行号与内容
	w 文件 #保存文件
	q #结束程序

ex: 文本编辑器
indent:  调整c源程序文件的格式

tr:  字符转换
	cat FILE | tr a-z A-Z > FILE2  #把文件1的小写字符全部转换成大写字符

vi: 全屏文本编辑器
vim : vi增强版

>>>打印命令

enscript: 将文本文件转换成postscript格式
	
	enscript -2r -G -d 1p1

lpc: 打印机控制
	
	lpc #进入命令模式， 输入 ？查看帮助

lpq :显示打印队列
	-l #相信显示信息
	-P 打印机   #显示指定打印机的所有作业
	
	lpq -P lp1

lpr: 打印文件
	
	lpr -# 3 -J 8 -P lp1 #将PID 8的作业，在lp1打印机上打印 3 份

lprm :删除打印作业
	lprm -P 1p1 8 #删除PID 8的打印作业

mpage: 在一页上打印多个页面
	mpage -A -P 1p1 
	mpage -d P -P 1p1

pr: 对打印的文件进行格式编排
	
	pr -3 test1.java > test2.java

tunelp: 调整打印机设置
	
>>>文件格式转换

>>>实用小程序

cal :显示日历
	-j #用恺撒日形式表示
	-m #把星期一作为一周开头
	-y #显示本年度所有月份

	cal 2008

dc :计算器
factor: 显示数字的因子
	factor 10

main: 显示帮助信息
manpath: 显示帮助文件的搜索路径


>>>SELinux

setenforce: 设置selinux模式
	Enforcing #强制模式
	Permissive #允许模式
	1  # 等于Enforcing
	0  #等于 Permissive

getenforce:  查看selinux模式

setsebool : 设置selinux布尔值
getsebool : 查看selinux布尔值
togglesebool : 翻转selinux布尔值

sestatus: selinux状态工具
	-v #检查 /etc/sestatus.conf 中文件和进程列表的语境
	-b #显示布尔变量的当前状态

avcstat: 显示avc统计信息
	-c #显示累计值
	-f status_file #指定avc统计文件的位置
	interval #循环间隔，以秒为单位

audit2why : 转换审计消息
	
audit2allow: 生成策略允许规则
load_policy: 装在策略
semanapge : 管理selinux策略
semodule: 管理策略模块
semodule_package:  创建策略模块包
checkmodule : 编译策略模块
chcat : 改变语境类别
fixfiles : 修复文件安全语境
restorecon : 恢复文件安全语境
chcon : 改变文件安全语境
setfiles : 设置文件安全语境


>>>iptables 相关命令
	-t #指定要操作的表
	-A #添加规则
	-D  #删除规则
	-I #插入一条或多条规则
	-L #列出所有规则
	-F # 删除所有规则

	iptables -L
	iptables -L -n
	iptables -L INPUT
	iptables -t filter INPUT
	iptables -F

iptables-save: 保存IP表

	iptables-save  #显示filter表中的内容
	iptables-save -c #每条规则前显示包和字节技术器的值
	iptables-save -t > mangle.txt
	cat mangle.txt

iptables-restore : 恢复IP表
	-c  #恢复所有包和字节计数器的当前值
	-n  #不删除表中以前的内容
	
	iptables-restore < filter.txt


>>>其它命令
startx : 启动x-windows系统， 进入图形界面
	start --vt5 # 

system-config-display: 显示设置工具

gtk: 计算显示设备VESA驱动 GTF模式
	gtf 1024 768 75  #把设置插入 /etc/X11/xorg.conf

xlsclients: 显示客户端程序
	xlsclients
	xlsclients -l
	xlsclients -m 5

xlsfonts: 显示x server 使用的字体
	xlsfonts #显示xserver使用的全部字体

xlsatoms :显示 x服务器的基本定义
	xlsatoms -range 10-20

xhost: 控制访问x server的主机
	
xset :设置x-window系统的使用偏好
	xset q


>>>杂项命令
yes : 连续回应字符串
	yes #在屏幕上不停歇输出 y
	yes   hello world  #在屏幕上不停歇输出  "hello world"
	
	yes | rm -i *  #自动输入 y,实现删除文件

xargs : 从标准输入执行命令
	xargs cat -n a

sum: 显示文件的校验和，文件块数
	sum /bin/ls


>>>SHELL知识
 >   : 重定向
	cat > aaa.txt

>>  : 追加
	cat >> aaa.txt
	

<  : 输入重定向
	cat < aaa.txt

通配符：
 	*  #匹配任意长度的字符串
	
		ls a*
	?  #匹配任何单个字符
		ls a??.txt

	[...] #匹配方括号中任何字符
		ls [de]*
		ls [a-e]?*
		ls [!a-e]??* # !代表相反

预定义变量：
 	$# : 参数个数
	$* : 所有参数
	$? : 命令执行后返回的状态
	$$ : 当前进程的进程号
	$! : 后台运行的最后一个进程号
	$- : 显示shell使用的当前选项
	$0 : 当前执行的进程名

流程：
if  COND1
	then CMD1
elif COND2
	then CMD2
else
	CMD3
fi


case VALUE in
	MOD1)
		CMD1
	;;
	MOD2)
		CMD2
	;;
esac


for VAR in LIST
do
	CMD1
	CMD2
done

	

 
      </p>

  