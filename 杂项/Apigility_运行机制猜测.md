
  # Apigility_运行机制猜测

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:03:45 


      None


      <p>
      APIGILITY 运行机制猜测

Apigility 运行机制猜测
route中指定了一个不存在的controller ,  
到底是怎么把这个访问的功能交给apigility，暂时不知道 
   
大约知道的是 zfcampus/zf-rest 是核心目录  
 zf-reset/... Facoty/Listen...   对controller进行必要的操作  
比如设置参数之类， 
   
 src/Abstract...  这个会创建模块的Resource 对象，  
并根据event中的name, 调用对应的方法， 比如fetch/fetchAll,  
但是对这些方法给予的参数是来自  query ，?name=frd&age=11  
这个参数跟路由中的参数毫无关系 
因此几乎可以说没用， 
那么怎么获取路由中的参数呢？ 
   
 resource继承自这个 AbstractResource对象，  
可以获取此对象的 event,  event->getParams() 这个可以获取路由中的参数 
   
 query的参数默认是没有的，要想有， 必须增加key到对应路由的whitelist中去 
   
这个resource还有更多方法，应该可以做各种事情了 
   


      </p>

  