
  # zf_参数_路由和查询参数

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:10:09 


      None


      <p>
      ZF 参数_路由和查询参数

zf 参数_路由和查询参数


 
 zf中的参数包括两类， 路由中的和 query中的(?name=frd&age=11)  
两者是不通用的， 必须分别获取  
   
在controller 中获取：  
  $this->getRequest()->getQuery()->toArray();  
  这是获取 query参数 
    
  路由中的参数  
  $matches = $this->getEvent()->getRouteMatch();  
   $params=$matches->getParams();  


      </p>

  