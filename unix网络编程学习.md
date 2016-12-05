
  # unix网络编程学习

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:01:34 


      None


      <p>
      UNIX网络编程学习
《unix网络编程》 第三版  所有的内容都用到作者自己的库
所以需要建立环境，否则无法使用作者的代码。

1， 下载作者的库 unpv13e.tar.gz   http://ishare.iask.sina.com.cn/f/13238521.html 
2， 解压，阅读README
3， 根据README操作，可能出现错误， 重要的是在 能获得   unpv13e/libunp.a ，还有  unpv13e/lib/unp.h  unpv13e/config.h
4,  libunpa 复制到 /usr/lib/  , /usr/lib64/
5,  config.h 和 unp.h 复制到开发用的目录， 当然也可以复制到 /usr/include（似乎不是很好，因为config.h比较通用）
6， 修改unp.h, 修改它载入 config.h的路径 
7，  安装作者的代码 ，保存成文件
8， 编译用  gcc xxx.c  -lunp #无错误就是正常了
9， 运行程序 ./a.out

      </p>

  