
  # Curl

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:57:08 


      None


      <p>
      Curl是Linux下一个很强大的http命令行工具，其功能十分强大。

1) 读取网页
$ curl http://www.linuxidc.com

2) 保存网页
$ curl http://www.linuxidc.com &gt; page.html
$ curl -o page.html http://www.linuxidc.com

3) 使用的proxy服务器及其端口： -x
$ curl -x 123.45.67.89:1080 -o page.html http://www.linuxidc.com

4) 使用cookie来记录session信息
$ curl -x 123.45.67.89:1080 -o page.html -D cookie0001.txt http://www.linuxidc.com
这个option: -D 是把http的response里面的cookie信息存到一个特别的文件中去，
这样，当页面被存到page.html的同时，cookie信息也被存到了cookie0001.txt里面了

5）那么，下一次访问的时候，如何继续使用上次留下的cookie信息呢？
使用option来把上次的cookie信息追加到http request里面去： -b
$ curl -x 123.45.67.89:1080 -o page1.html -D cookie0002.txt -b cookie0001.txt http://www.linuxidc.com


6）浏览器信息
$ curl -A "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)" -x 123.45.67.89:1080 -o page.html -D cookie0001.txt http://www.linuxidc.com

7）referer
$ curl -A "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)" -x 123.45.67.89:1080 -e "mail.linuxidc.com" -o page.html -D cookie0001.txt http://www.linuxidc.com
这样就可以骗对方的服务器，你是从mail.linuxidc.com点击某个链接过来的

8）下载文件
$ curl -o 1.jpg http://cgi2.tky.3web.ne.jp/~zzh/screen1.JPG
$ curl -O http://cgi2.tky.3web.ne.jp/~zzh/screen1.JPG
&nbsp;-O 可以按照服务器上的文件名，自动存在本地

$ curl -O http://cgi2.tky.3web.ne.jp/~zzh/screen[1-10].JPG

9）批量下载
$ curl -O http://cgi2.tky.3web.ne.jp/~{zzh,nick}/[001-201].JPG

这样产生的下载，就是
~zzh/001.JPG
~zzh/002.JPG
...
~zzh/201.JPG
~nick/001.JPG
~nick/002.JPG
...
~nick/201.JPG

$ 自定义文件名的下载
curl -o #2_#1.jpg http://cgi2.tky.3web.ne.jp/~{zzh,nick}/[001-201].JPG
这样，自定义出来下载下来的文件名，就变成了这样：
原来： ~zzh/001.JPG —-&gt; 下载后： 001-zzh.JPG 原来： ~nick/001.JPG —-&gt; 下载后： 001-nick.JPG
这样一来就不怕文件重名啦

9）断点续传
$ curl -c -O http://cgi2.tky.3wb.ne.jp/~zzh/screen1.JPG

分块下载，我们使用这个option就可以了： -r
举例说明
比如我们有一个http://cgi2.tky.3web.ne.jp/~zzh/zhao1.MP3 要下载（赵老师的电话朗诵 :D ）我们就可以用这样的命令：
$ curl -r 0-10240 -o "zhao.part1" http:/cgi2.tky.3web.ne.jp/~zzh/zhao1.MP3 &amp;\
$ curl -r 10241-20480 -o "zhao.part1" http:/cgi2.tky.3web.ne.jp/~zzh/zhao1.MP3 &amp;\
$ curl -r 20481-40960 -o "zhao.part1" http:/cgi2.tky.3web.ne.jp/~zzh/zhao1.MP3 &amp;\
$ curl -r 40961- -o "zhao.part1" http:/cgi2.tky.3web.ne.jp/~zzh/zhao1.MP3
这样就可以分块下载啦。不过你需要自己把这些破碎的文件合并起来如果你用UNIX或苹果，用 cat zhao.part* &gt; zhao.MP3就可以如果用的是Windows，用copy /b 来解决吧，呵呵

上面讲的都是http协议的下载，其实ftp也一样可以用。用法嘛，
$ curl -u name:passwd ftp://ip:port/path/file
或者大家熟悉的
$ curl ftp://name:passwd@ip:port/path/file

10) 上传的option是 -T

比如我们向ftp传一个文件：
$ curl -T localfile -u name:passwd ftp://upload_site:port/path/

当然，向http服务器上传文件也可以比如
$ curl -T localfile http://cgi2.tky.3web.ne.jp/~zzh/abc.cgi
注意，这时候，使用的协议是HTTP的PUT method

刚才说到PUT，嘿嘿，自然让老服想起来了其他几种methos还没讲呢！ GET和POST都不能忘哦。

11) POST和GET模式
$ curl http://www.linuxidc.com/login.cgi?user=nickwolfe&amp;password=12345

而POST模式的option则是 -d
比如，
$ curl -d "user=nickwolfe&amp;password=12345" http://www.linuxidc.com/login.cgi


一点需要注意的是，POST模式下的文件上的文件上传，比如
&lt;form method="POST" enctype="multipar/form-data" action="http://cgi2.tky.3web.ne.jp/~zzh/up_file.cgi"&gt;
&lt;input type=file name=upload&gt;
&lt;input type=submit name=nick value="go"&gt;
&lt;/form&gt;
这样一个HTTP表单，我们要用curl进行模拟，就该是这样的语法：
$ curl -F upload=@localfile -F nick=go http://cgi2.tky.3web.ne.jp/~zzh/up_file.cgi

https本地证书
$ curl -E localcert.pem https://remote_server

再比如，你还可以用curl通过dict协议去查字典
$ curl dict://dict.org/d:computer


显示header
$curl -i 127.0.0.1 #显示response header和内容
$curl -v 127.0.0.1 #显示request 和 response 详细信息，包括所有header

$curl --trace output.txt 127.0.0.1 #显示详细的内容，显示的是二进制的发送接收内容

自定义header
curl --header "xxx: xxxxxx" http://tvbs.cc

http认证
curl --user name:password tvbs.cc


      </p>

  