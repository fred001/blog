
  # web开发--1

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:55:12 


      None


      <p>
      1
Frd:  baseurl
  path to url 
  

工具：
  1， 显示db 信息， 单表
  监控日志文件， 用tab显示， 如果有文件变化，则马上更新
  
  显示项目的所有接口， 测试接口 (API)
  
  网站构建
  1， 环境检测
  2， 日志检测
  3 ... 
  
  命令行测试 module api
  交互式和自动
  
  
  module/api 


 contest:upload_video 
     title: 
    desc
     image:
 
 命令行
 
 
 参数 -> upload ->   Uploader  ->  url, path
 
 UPLOader 
 -----------------
 upload:
  1,   get  params,  
   2,  move to  dest folder
   3, return url 
   
   upload:  echo  params  :   check important params
                 copy to dest folder: params
                 path to url : path to url 
                 
    together:
       
 
 DB:   getOne ,getRow
addWhere
editWHere
existsWhere ..


utf8 of domain
url => path



JS 调试工具条，类似游戏的命令界面

jQuery 插件的缺点： 
    依据共同选项初始化，无法根据不同的对象进行不同的处理
    应该再对象上保存对象，以便各种调用
    对资源（image,css,html )的依赖，需要更高级别的语言来处理
    
    需要支持destory 和 重新init
    
    直接调用操作dom,无法获得其意义，难以理解
    
    
    
    
    运行值保存
  用于调试



@@php
URL重写

URL 元素:  basepath+script + params
格式：  
/manager/  index.php/age/11  ?name=frd

Basepath (/...)
Script  (optional)
Params  (optional)

处理过程:
 1, 去掉  basepath
 2, 去掉 script
 3, script结尾  -  ?  =  extra params ,需要解析获得

 4 规则可以有多个， 获得多个  path+extra_params 
 5, 最后得到  多个  path+params , 
 6， controller 会去处理，假如有一个 path + params 可以运行，就执行

//
$route=new Frd_Route_Light();


@可能的问题
* 路由可能失败， 需要尝试后面可能的路由
尝试需要controller来判断，

* 增加多种路由时候，可能需要按照类别来判断
类别由第一个单词判断


* light class 是基础
 可以自我提升到复杂模式 和 详细模式(verbose,输出详细调试信息)

DOCUMENT 元素：
 特性： 描述了具备的功能
 changelog: 描述了功能的发展过程
 详细： 描述了每个功能的实现方式等细节

      </p>

  