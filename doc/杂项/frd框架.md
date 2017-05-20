
  # frd框架

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:22:04 


      None


      <p>
      app()->run 似乎不是很好

app()->handle(url+params) 

是否能够把一个http请求过程转换成一个对象，
这个对象可以自定义处理流程和应用其它对象来处理呢？ 也可以被继承，改造成不同的处理对象

可能需要的子对象
参数对象： 包含 url,路径，参数，方法等等
路由转换对象：
路由绑定的 module+controller 对象
错误处理对象
响应对象

      </p>

  