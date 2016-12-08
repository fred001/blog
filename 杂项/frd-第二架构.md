
  # frd-第二架构

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:21:41 


      None


      <p>
      第二架构：
API 架构

=========================================
API可能需要继承来自APP ，需要APP的初始化，路由等功能 

第一层 url+params ========> HANLDE ===========> response 
$api->run(URL,PARAMS)



第二层 对默认的处理 参数处理，结果处理
params_validate,params_convert,result_validate,result_convert

$api->get("params_validate") 
$api->get('params_convert')

所有组成部分都有同样的方法 handle($params) => return $params
params_validate:
addValidate

params_convert:
add(k,v)
remove(k)
rename(k,k2)
changeValue(k,v2)

result_handle:
...


第三层： 完全自定义
自定义流程 ： $api->setSteps('params_validate',params_convert,...)
增加自定义处理对象： $api->addHander($name,$handler) //这个$name 用于增加到流程中
删除处理对象： $api->removeHanlder("params_validate");








      </p>

  