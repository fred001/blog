
  # 目标-APITEST

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 15:10:28 


      None


      <p>
      APITEST
流程：
    数据（赋值）+url  → 请求  -->  响应  （常规检查 是否json 等等 -> 数据检查  ->  response codde 其它检查 ) -> 其它操作（赋值）
    
    
步骤：
    1，设计几个基础test
    2,根据流程编写代码
    3，优化之，简化之，简化成配置？
    
      

[思考]
    array validate
    验证 返回的结果
    
    validator: 
    
        key.key.key=>[
                filter 1 row
                filter 2 row
                filter 3 row        
        ]
        
    逐步检测，逐个filter 检测，
    有错误就输出  key + filter

      </p>

  