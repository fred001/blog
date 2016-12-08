
  # scp

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 12:36:59 


      None


      <p>
      
scp [-pr] [-l 速率] file [账号@]主机:目录名 <==上传 
scp [-pr] [-l 速率] [账号@]主机:file 目录名 <==下载 
选项与参数: 
-p :保留原本档案的权限数据; 
-r :复制来源为目录时,可以复制整个目录 (含子目录) 
-l :可以限制传输的速度,单位为 Kbits/s ,例如 [-l 800] 代表传输速限 
100Kbytes/s 

范例：
# 1. 将本机的 /etc/hosts* 全部复制到 127.0.0.1 上面的 student 家目 
录内 
scp /etc/hosts* student@127.0.0.1:~ 
student@127.0.0.1's password: <==输入 student 密码 


      </p>

  