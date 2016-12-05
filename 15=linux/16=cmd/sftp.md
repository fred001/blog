
  # sftp

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:09:57 


      None


      <p>
      sftp

历史：
2015年10月05日
建立



sftp student@localhost

针对远方服务器主机 (Server) 之行为 
变换目录到 /etc/test 或其 cd /etc/test  他目录 cd PATH 
列出目前所在目录下的文件名 ls  dir           
建立目录 mkdir directory 
删除目录 rmdir directory 
显示目前所在的目录 pwd 
更改档案或目录群组 chgrp groupname PATH 
更改档案或目录拥有者 chown username PATH 
更改档案或目录的权限 chmod 644 PATH 
建立连结档 ln oldname newname 
删除档案或目录 rm PATH 
更改档案或目录名称 rename oldname newname 
离开远程主机 exit (or) bye (or) quit 

针对本机 (Client) 之行为(都加上 l, L 的小写 ) 
变换目录到本机的 PATH 当中 lcd PATH 
列出目前本机所在目录下的文件名  lls 
在本机建立目录 lmkdir 
显示目前所在的本机目录 lpwd 
net.qiang@hotmail.com针对资料上传/下载的行为 
put [本机目录或档案] [远程] 
put [本机目录或档案] 
将档案由本机上传到远程主机 
如果是这种格式,则档案会放置到目前远程主机的目录下! 
将档案由远程主机下载回来 
get [远程主机目录或档案] [本机] 
get [远程主机目录或档案] 
若是这种格式,则档案会放置在目前本机所在 
的目录当中!可以使用通配符,例如: 
get * 
get *.rpm 
亦是可以的格式! 

      </p>

  