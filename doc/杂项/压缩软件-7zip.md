
  # 压缩软件-7zip

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:41:40 


      None


      <p>
      压缩软件-7zip
2013-09-09 
---------------------------

压缩软件中，有 winrar, zip,  tar+gzip+bzip , 7zip
winrar 不是原生支持，各平台都需要安装软件
zip,linux中，中文的压缩解压不支持，比较麻烦
tar+gzip+bzip 不支持加密，需要openssl来加密，其它平台解密麻烦

7zip 没有上述缺点

--------------------
基本用法


7z a -tzip -p111 archive.7z test/      压缩 密码为111  （自动包含整个目录的所有文件，  zip还需要指定  -r 选项）
7z x -tzip -p111 archive.7z            解压 密码为111


http://www.cnblogs.com/langlang/archive/2010/12/01/1893866.html
http://www.jb51.net/article/30541.htm
http://sparanoid.com/lab/7z/
http://velep.com/archives/389.html
      </p>

  