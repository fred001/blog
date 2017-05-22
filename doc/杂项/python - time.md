
  # python - time

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:31:42 


      None


      <p>
      时间处理

import time

time.time()  //unix 秒数

  time.strftime("%Y-%m-%d %H:%M:%S") //将当前时间以此格式输出
  t=time.strptime("%Y-%m-%d","2015-01-01") //解析字符串，得到一个对象
  time.strftime("%d/%m/%Y",t) //以此格式输出此对象的时间

  time.mktime(t) //可以转换成秒数
      </p>

  