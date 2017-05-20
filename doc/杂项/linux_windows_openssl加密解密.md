
  # linux_windows_openssl加密解密

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:10:51 


      None


      <p>
      LINUX_WINDOWS_OPENSSL加密解密
linux windows  openssl 加密解密 
2013-09-08 
-------------------

加密解密通过openssl ， 需要  openssl, dd 命令，如果是用到压缩 ,还需要 tar ,gzip

linux有现成命令，没什么操作。

windows:
 1, 安装unixutils
           http://sourceforge.net/projects/unxutils/
    下载后，复制到 c:\下
    然后右键  “我的电脑”  ， “高级” 标签，  “环境变量” 按钮， “系统变量”中寻找  Path, 把   C:\UnxUtils\usr\local\wbin; 添加到这个路径下
    主要最后的分割符 ;
    
2, 安装openssl
  http://slproweb.com/products/Win32OpenSSL.html
   先安装 openssl,（第一个）
   可能还需要安装 vc++ 2008, （第二个）
   
   下载后，默认安装在  c:\Openssl...  
   进入目录，然后进入 bin目录，找到 openssl.exe, 双击，
   如果正常，就是安装好了，否则还需要安装 vc++ 2008
   
   安装完成后， 也把这个目录加入到Path中 ,  C:\OpenSSL-Win32\bin;
   
3, 运行 cmd, 试试输入  dd, openssl, ls  ,tar, gzip 看看是否安装完成。

4，现在windows 可以和 linux 互相加密解密了。
   试试 linux -> windows
   加密:
      dd if=输入文件  |openssl des3 -salt -k 密码 | dd of=test.des3
   解密：
      dd if=test.des3 |openssl des3 -d -k 密码  > 输入文件
      
   如果用到tar, 注意在windows上，不能 tar xzvf 文件名    ，一步到位
   需要先 gzip -d 文件名， 然后才能 tar xvf 解压后的文件名  ，解压
      
      

      </p>

  