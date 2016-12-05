
  # web开发--质量控制

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:57:57 


      None


      <p>
      质量控制
网站API
  1, 所有功能都包含在api中
  2,  基础api必须实现
  3,  api依赖
  4, 定义： 和描述
  
 例子：
   website -> api(list)
   website -> api(list  NAME)
      获得 需要的参数， 输出， 依赖 api
      
   website->api(login)质量管理:
  1, 质量目标制定
  2, 质量目标监控
  3, 质量结果统计
测试:
  1,  单元测试
  2,  功能测试
  3,  本地集成测试
  4,  不同环境测试
  5,   外部集成测试

---进化---
故障应对
流程控制- 自动化得到预期

     返回：   1, 需要 username,  password
    website-> (get_defined  username | password )
   
   website-> query..)
     返回 ， 1, 依赖 login  (not login)
     
 

      </p>

  