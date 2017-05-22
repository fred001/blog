
  # apigility

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:03:31 


      None


      <p>
       APIGILITY

 Apigility
http://techportal.inviqa.com/2013/12/03/create-a-restful-api-with-apigility/
1, 需要文件写入权限才能创建模块 
   比如 data/cache ,module/  
    
 2, 可能内部有对模块进行管理，所以不能简单删除就认为是把模块删掉了 
  
 AlbumCollection.php  
大约是在查询albums这种形式时候分页，不清楚具体怎么做 
AlbumEntity:  
对应具体某个表的记录， 进行单条记录的转换工作  
   
   
AlbumMapper (Module::getServiceCOnfig() 中返回这个东西，不清楚具体原理） 
提供实际的数据库查询数据工作， 不清楚为什么叫mapper  
ResourceFactory  
创建 AlbumResource  
做额外的工作，比如设置数据库连接  (mapper不清楚什么意思）  
Resource  
提供api对应的具体查询 
   
   
具体怎么实现的？  
猜测是路由制定一个不存在的controller,  
库中肯定有自定义的autoload机制，当遇到这种不存在下的controller  
引向内置的controller,接管所有内容，   
创建resource, 调用resource的方法和 collection


      </p>

  