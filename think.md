
  # think

      version:  1
      created_at:  2016-05-14
      updated_at:  None

      created at 2016-05-14 11:00:36 


      None


      <p>
      原子操作：
  要么成功，要么错误， 没有异常，就可以称之为原子操作
  最底层的代码要达到原子级别



建立一种网站，或者联系：
 每台主机就是独立的个人，可以提供信息，和周围主机直接联系
 研究p2p, 
  

 类的阶段
  try
  alpha
  developing
  use
  test
  stable


App::init (可以初始化Frd:...
这样可以有多个不同的APP,有的有DB ，有的没有等等

DB connection 缓存 (无法缓存，会出现错误）

Frd_Ajax; 设置目录，检查必要的参数
 调用文件的时候，动态增加检查参数
 
 考虑Frd_Layout 增加区块 (bottom_script) , 
 设置content Block 的时候，也设置 content的 _layout 为该layout
 content可以调用  layout->addBottomScript($script,$order);
 Layout:
   $this->_bottom_scripts[$order]=$script;
    <script>
      bottom script
    </script>
    
    
    
    form validate , created by php
    
  
  继承的类必须实现父类的测试
  
  理解zf, frd和zf集成
  
  eav数据库和类 Frd_Db_Eva
  
  显示整个数据库的所有表的结构
  
  一个变量文件，存储全局的变量等等，这样等于增加了一直运行的静态变量
  
  JS错误处理： 
    1， 记录浏览器
    2， 记录上下文错误
    3， 保存并可发送邮件
    捕获所有错误，语法或者运行， 
    可以开启，关闭调试状态
    
    
 研究SESSION 过期，


页面静态化
SQL查询缓存

数据库同表中， 父子关系表示，查询等各种操作比较困难

多表关联： 
  1：1
    单一键
    复合键
  1：n
  n:n
  数据库同表中， 父子关系表示，查询等各种操作比较困难
  app_id,configset_id,name,value
  1 , 0 , name, test
  1,  1,  name, test1 
  
  同表左连接!!
  
EVA模式
考虑Frd_Db_Table执行错误的返回情况
 * 抛出错误
 * 返回false或者其它值  
字段别名alias
addWhere
editWhere
deleteWHere 等返回值

JS 函数:
  exist(selector)  //检查dom元素是否存在
  id() //根据 id 获取，存在返回 jquery 对象， 否则返回false
  name() //同上
  radio(name | #id) // 返回false, 
  checkbox(name | #id) //返回false,不存在  或者没有checked ，checked返回
  

本地支持HTTPS, 
研究firefox 检查HTTPS链接的 非HTTP

多表用不同结构保存相同数据，以便应付各种查询

zend code生成，可以通过配置创建类

HTML_FORM_LABEL


$table->addRelation("1:1", $column)


$table->addExtraColumn($extra,"uid",$column);
getOne
getRow
getAll
load


*  $table->addLeftJon($extra,"keys",$columns);
   $table->addInnerJoin
   $table->addRightJoin (opertional)
   
* Table Multi 纵列表
   add/edit/delete/
   
   group_column  (string)
   merge_column  (translated)
     group_concat(...)
   key_column     (lang_id   or  name  from lang table)   
     left joined
     group concat()
     
     
   foreach(....)  处理rows, 结果：
   
   rows['key1'] ... rows['key2'] .. 
  
 * 核心方法  table::query
 
 * column alias
 
 
 base controller configs:
  1, table
  2, form
  3, actions
  4, messages
  5, 
  
  MODIFY only extend
 
 * parameter valid
    for  GET
    for  POST
    
 错误类型
   * module 不存在
   * action 不存在
   * parameter invalid
   
   
 假如出错，可以立即终端所有执行：，php 有 exception
   HTML
   JS ?
   
 Frd_Html_Select 扩展功能，可以返回数组，或者options
 
 Paginator可以使用一个SQL
 getTotal可以自动生成，通过$select->reset("group")
 $select->reset('columns');
 $select->columns("count(*)");自动创建
 $select->reset("....")； 
 
 SQL出错，输出完整的SQL语句
 
 
 HTML  样式： 
  successMsg
  dialog
  button
  ....
  
  
使用nagios监控

gearman

《黑猩猩的政治》



       
      form 提交前有ready 检查  
      
 
 验证码， 考虑用js生成，加密后的字符串保存在html
获得用户验证码，要求后台加密，然后验证
 可以避免session问题
 
 可以针对用户进行不同行为， 比如对普通用户进行简单的验证码
 
 JS事件链，一个事件完成后接着另一个,
 能够轻松变幻次序
 
 研究 IE中的https 警告怎么来的
 
 
 js : equal(val1, valu2, true( if stric)) 
 
 
 frd.radio ,接受options,生成多个radio
 
 js param object, 定义必须的参数，自动检测
 
 js draw image, 平滑过渡
 
 js  对file控件检查
 
 js.form.file
   is_choosed
   size
   type
   name
   
  事件监听
    可以随意插入一个执行在某个事件执行
   
   WEB安全：
     如上传php文件，然后执行
     XSS
     CSRF
     
输入验证，禁止 script等
     
     xhr被禁止
     
     object params 设置参数类型
     这样在传递的时候，自动加上附加参数  ajax_param_attrs
     服务端 Ajax 检查参数，并作处理
     
     php也可以这样
     
     frd.object 可以初始化 
    var obj=new frd.object("name=fred,age=bbb');

 过滤，不显示未来的内容，
 过滤规则和 dailypresent app一致
 
 check feed in : http://validator.w3.org/feed/
 
 
 debug_log( 根据外部条件记录t日志， 如cookie
 
 Frd-Object 嵌套仍旧能输出完成array  (getData)
 Frd_Object 实现 foreach 接口
 array转换成 frd_object
 
 js 考虑保存在php中，然后根据需要读取，兵防盗页面最后
 


 render()
 
 
*  JS AJAX 调用链


php render css
* 删除已经定义的 名字

frd.html//可以绑定一个 html对象，为其设置属性，样式，绑定事件

html创建:   frd.html('XXXX').wrap(tag,attrs)+xxxxx.wrap

重写重要插件： 
 fileupload
 editable
 
 frd.form,可以获取form的值，等，操作form
 
 Frd_CSV ,解析CSV文件， 可以返回各种错误，根据指定格式


Frd_Frontend_Error: 
 a, alert
 b, modal
 c, render error msg to target
  should use php+js+csso
  $error->alert('bbb');
  $error->render('#main');
  $error->modal('bbb');
  
  
  测试平台
  支持 db测试, 
    a, 设置 初始化数据，通过csv
    b, 设置结果数据， 通过 csv
    c, 测试，并输出结果
    d,结果对比结果和预期结果，高亮显示，
      红色为错误，绿色为正确
  
  


Frd_Object_Advance: 

    
Frd_Translate: 
  * use zend translate
  * output as array
  * outptu as js object
  * init js translate
  

PHP  和  CSS , JAVASCRIPT 沟通， 
  需要一个View (可以是block,template,view, html 等等）

  renderFile
  

Frd需要作为一个framework运行，
  *  可以最小化控制程序
  *  可以随意替换组件
  *  甚至可以自动init
 
php 赋值给 js , html
 1, to html input
 2, to html textarea
 3, to js variable, 
 4, to js, then to html
 5, 
 
Frd_Db_Table: 
  add extra column
  edit extra column
  



Frd_Plugin 概念：

有什么可以直接缓存 类和对象，而不需要重新序列化


Widget可以修改其名字，免得冲突


Frd_Select 支持多表，最好能不需要设置a.xxx b.xxx ,只需要列名，如有重名，预先定义

fb auth , when block , give link as user to click

widget|module|plugin 通用的依赖关系检测
 * 自动载入依赖的对象
 * 调换载入次序
 * ...

Js
  frd.object.select . enableMultiple
                        disableMultiple
                        
                        
                        Frd_Template: 
                          var === 0 , not parse  {XXX}

python 写个软件，可以对图片渐渐放大，缩小，上下，左右移动，锻炼眼睛10


研究下session的函数
Zend_SESSION

loadJs
addJs

controll应该只管控制， 
  对view的赋值等等交给block
php 想办法控制js 的cookie路径等


Paginator: 包含2部分： 
  Db 操作
  Handle操作
  



ObjectParams 考虑设置默认值,并且不能修改类型

Frd_Paginator:
  1, supprt base db
  2, support array
  3, each use
  4, support multi paginator


JS 插件:
 inline editable  (jquery editable)
 file upload with process bar  
 
 image upload and manage
   用一个iframe显示，其实就是一个站点，选中图片可以设置top某元素的值
   
 form validater
 高级插件 
  form 
  grid
  editor 
  
  
  研究键盘事件 ，怎样才能不被浏览器捕获

  
浙江省杭州市 西湖区 华星路 怡泰大厦708 
丁艳杨
18657120585
  
  
杭州西湖区竞舟路山水人家白沙岛8幢2单元202
web界面设计
设计模式
数据结构
徐峰： 13706711478



Frd_Html_Checkbox("name",boolean)
是否能自动创建 checked 状态

exception 不一定需要直接输出，也可能是返回 (ajax)


台式安装服务， 以便笔记本ssh登录

JOB table,
  save
  hasDone
  getUndoneList
  finishJog
  
  
  DB SYNC 
  预先保存到内存中，需要的时候再写入 ，可以考虑仅在一个request中实现
  
frd.object.checkbox:
  is_checked
  checked
  unchecked
  
Frd_Page: showError 
  显示错误在页面
  
  怎样模拟session过期
  
  PathToUrl
  UrlToPath
  
  研究EXEC
  http://php.net/manual/en/function.exec.php
  http://www.php.net/manual/en/function.escapeshellcmd.php
  http://www.php.net/manual/en/function.shell-exec.php
  
  js: update block 
  <div data-block-id="" data-block-url='.....'>
  </div>
  jQuery(data-block-id).html(
  jQuery.get('data-block-url')
  )
  
  failed:  
    1, do nothing
    2, send error to page
    
  frd.page 控制整个页面，和Frd_Page交互
   1, show error 
   
   
   Frd_HTML_Form: 支持生成没有name的控件
   
   js, store,用来保存不重要的一些内容，如用户配置
   
   到期提醒程序：
     比如 VPN到期， 
     
  Frd_Db_Table 可以对某些列进行自动转换
    $table->setAutoConvert("friutes","json");   json|serialize|...
    
    page 可以有自己的名字，这样方便保存 locale storage 数据
    block也可以
    
  Frd_Db可以管理  Frd_Db_Table s
  
  
  js,css minifiy
  
  
   javascript image upload plugin
   
   frd.confirm
   
   js lib 加入到源
   
   
   js 获取待上传文件的信息 （大小，文件名等等） 
   
   Frd, change log list and version
     
     for each function
   
   
   现尝试memcache
   
   
   hide的元素，还能够获取吗？
   
   frd.db.table
   
   Frd_File:: file size (k|m|g)
   
   msg有2中操作 ,
    append, 
      add_message(..)
    update
         add_message('name',...)
          update_message('name',...)
          
          
          
          
          测试平台！
           可以方便和app结合，并进行测试
           
           
           研究花生壳，考虑自己主机空间,  9.3号之前续费 godaddy
           
           
           mail send record db
           
           
           
           
           csv 特别输出， 用array方式，可以看到简直
         
          
          
          from process ,query by ajax
          
          
          Frd框架： 
             性能部分
             a, 一次request,  多少 php请求
                 多少css,js,image 请求
              b, 
              统计部分： 浏览器，操作系统,url
             
              loadJs
              removeJs
              这样可以实现继承
              有全局的模板， 然后各个layout继承它
              
              
              Frd_Db_Grid 可以直接查询，修改，显示数据库
              
              开发平台，监控，并收集日志
              
              
              easy creat layout css,可以仿照gtk
              
              测试平台, ajax测试,post ,get , 设置cookie
             
             
             研究 noSQL , magento db
             
             Frd_Db_Raid , 
                1, 双表， 主表写，此表读
                
                
         
                
                
                研究rsync
                
         
                
                可以disable模块， 如 app, page


                 
             。
                       
                    Frd_HtmL_Ul

        
                    
                    
                    把笔记本变成路由器， 支持ftp,http,摄像头监控
                    
               
                      
                      
                                  
                      Frd_Event
                        可以抛出事件，observer可以捕获事件，
                    
                      
                         
                         

        PHP 创建html layout
                      Frd_Html_Layout:
                       最外面一层是 layout container: 方法  setLayoutWidth(
                         800px, 100% , 
                       );
                       这层居中       
                       
                              Tempatle : checkParams()/.     
                              
    test:代码可以保存到数据库中去
    模块外面的main等文件包含所有interface, 是否可行（ 考虑table,db,form等）,也可返回对象，对象提供接口
    
    数据库比较，比较两数据库的表结构是否一样， 
    数据库升级需要2类信息， 1:结构数据库结构， 2升级的语句
    JS FRD LOG
    Table Status; Table Cache
    module: frddbcache

   Gearman 和 Task绑定
   Frd_Task_Gearman:
      run($task_id);

          
                              
memecahe缓存统计数据的时候，可以编号，这样知道丢失了多少
开发平台，修改模块的数据库时候，输入SQL，修改的同时也增加到修改记录中
SQL版本用时间表示可能比较好

用set_error_handle and set_exception_handle 来捕获错误，
用来测试某些代码

Frd::getDb() 是获取current DB, 而不是default db
Frd::changeDb('default');  修改current db 为 default db
这样所有代码中，都可以用Frd::getDb() 获取数据库了，不需要考虑多数据库

Frd:Js 测试平台

HTML valid： 可以对一段代码进行校验， 如检查是否有未闭合标签,缺少</div>等

A， 研究munin用法， 可以监控服务器性能
B, 研究 webbench  和 ab 用法，可以测试web服务器，
 通过两者结合，测试是:
   1G内存能承受多少次访问
   1G 内存能承受多少次静态页面访问
   多少次访问后变得缓慢
   
  目标： cache增加多少性能（1G 能承受多少次访问
  
  
  
  HTML parse,获取html中的信息比如 <fb-meta>等信息
  
  web基础检测，1，cookie,是否允许，js 是否允许
  
  
  Frd_params:: checkString ,array('), checkInt
    checkArray(array,format)
    调用Frd_Valid
    
  Frd_Valid: 
    * exists, isEmail, isString, isInt, minLength, maxLength
    * isArray(not empty array)
    * isArray($arr,$format)
    
     $format: 
       
       
     
       
       Table 的配置，可以方便查看所有table结构，结构有版本，
       语句可以写错，结构不能错
       
      以后考虑由table变成form
  
    Log模块： 每次request，都有一个唯一id,根据这个id,
    到LOG的页面去，显示所有LOG
      __construct, 如果是db, db中插入一条，获取id
      如果是其他， 获取最新的id
    
    每个module下的config文件夹，保存各种config,可能有许多
    创建一个module,专门显示编辑这些config
    
    Test: 
      * 手动编写测试
      * 自动从实际运行中创建测试
      * 自动创建测试，手工编写创建代码
      
      Moduel中增加doc,可以保存一些文档
        develop 模块可以树状显示这些文档
        文档需要一定的格式
          如： 
            TITLE
            ---------------------
            CONTENT
      
      页面loading ,
        有些页面载入需要比较长的时间，通过loading进度条，仿照游戏中，
        甚至可以显示载入的内容：
          如： 载入数据库记录，获取远程内容，准备输出等等
     
          gui 测试函数，
          备用系统用来测试.
          log  用不同颜色（DB，普通，form,等等)
          设置标志，分组显示
          log树状显示：
             增加也需要支持：
                Frd::addLog("name");
                 Frd::addSubLog(....
                 Frd::endSubLog
                 Frd::endLog
               
               模块应当有interface,这也是测试的参考
               
               用图形表示代码的关系
               时间性能检测， Frd::markTime($name) ...
               
               Moduel在缺乏Frd库帮助下，还能独立使用,需要Frd_Module
               考虑兼容zend controller action
               或者设置flag, 使用不同的action方式
               
               exception, 可以订阅， 用observer模式
                   发送完整的日志
                  exception也加入到日志中Log
                  
                  垂直的值监控，通过observer监控值在每个环节的变化，
                  如request,db,等等
                  
                  Frd_Validate支持额外的valid, 可以注册函数, 可以替代本身valid
                  
                Frd_Db_Table::query($columns,array(
                    where=>
                    order=>
                    limit=>
                    ...
                  ));
                  
                  Frd build-in database :
                     * initDatabase
                     * set type
                     
            
            Frd:Observer:
                throw event (name,params)
                  listen event(name)
               
              两个数据库绑定的模块:
                task
                  request_log: request clean: set request amount, set request clean time,
                  exception:  exception must contain __FILE__and __LINE__
                  有一种exception 可以反复，比如数据库操作，每次的内容都不同
                  考虑 编码array
                  so the same exception will not saved 
                  
                  研究rsync
                  
            
                   图形化表示某一个操作跟数据库的关系
                   
                   Frd::changeModuleClassName
                   
                   
                   
                   
                   
                   
=====================Frd Lib: version 1.0 功能===============================
必需模块：
  Route ，模仿zend 
  子模块
全局的defined,类似wx.EVT_BUTTON


    * Form js validate
    * frd paginator
    *  frd grid 
       *, paginator
       *, - flexigrid  (js grid )
       * , table (optional)
       * ,   js functions 
 
     1. Frd::cache  (app cache)
           load/set/clear
        
       Frd_Request_Cache 
         front type: 
          backend type: 
         
          * database cache
          *  html cache
          *  file -> memory cache 
          
          *  
          *  each client's own cache
          
          cache_folder/
              users/
               html
               database
    


  >> modules
   
     
    * develop module
        * changelog 
        * log 
        * develop
        * test
        * fix (open file directly and modify and save)
        * statistic
        * performance
        * exception保存到数据库，exception模块可以直接点击响应exception
         打开对应的文件，跳转到对应行数，修改并保存
         
         exception中的数据最好能保存，并重新运行一次
         
         * 显示代码结构，可以方便找到对应代码！！
         
         * 图形创造form
        
        
        
      FINISH:
         Frd:encrtyp;  2012-07-23  18:35:57
          Frd_Session  2012-07-23  20 16 46
                1, module依赖， 才能使用$module->getDependModule 获取其他module,
        不能在module中直接使用 Frd::getModule
           addDepenedModule
           getDependModule
            2012-07-24 16:37:50
              
      Extra:

    
     SEEMS NOT NECESSARY
     * ajax: 
     *能否通过加密数组，保护ajax传输
      用户密钥， 
        根据session_id 生成，存放到客户cookie中
        加密的时候通过这个生成，
        这个密钥不会传输，仅仅保存在客户浏览器中
       ----------------------------- 
    Advance:

      Frd_Request_Log 更加方便  
      css/js merge and minify 
      Frd_Trace;全局的调用列表，重要的函数调用或者方法调用，可以增加到里面 去， 在log中输出
      考虑备用系统， 当一个module遇到error,调用该module 的备用版本
      每个访问的人，给与ID ， 出现错误 
 * 保存到数据库
 * 提示ID
 * 可以根据ID 查询具体信息
     浏览器信息
     cookie
     session
     统计信息： 
       * 访问人数
       * 访问次数
       * 每人访问的次数
       * 浏览器
       * 操作系统
       
         widget 
     plugin
       
     Layout
======================================================================================

测试php_admin_value open_basedir .:/tmp/


UI 编辑类
  性能统计， 保存到log , （运行时间，内存，文件，数据库个数，时间总量)
    怎么计算CPU ，一个request 
    
    统计apache log中，哪个文件耗时最长
    apachetop -d 2 -T 3600 -f /var/log/apache2/app-arena.custom.log
    
    
    ======
    html 代码
    从php 自动生成js, 
    
     $doc->getId('test');
     if( $doc->value == false )
     {
        $doc->alert('should not empty');
     }
     
     
     php_to_js(...)
     
     jquery 的php ,js 对应
     frd 的php ,js 对应
     
     
     -----------
     Frd 的组建， 第一次调用才开启，不调用不自动载入，模仿yii
     如:  Frd::getPage() , 这时候才初始化， 而不是在Frd:init()
     
     
     GUI设计器，直接转换成代码， 并且可以测试一些不同环境，如分辨率，浏览器
     Form Gui包括3个基本信息：
       元素选择， 元素结构，界面预览
       
       
       
     debug 主动开启： 
        当error时， 记录当前url, 
        下次访问此url,开启debug 模式， 
        再次记录后，关闭debug模式
        
        
        
    Frd_Running: 
      Frd::getRunningTest() ... 
      Frd::setRunningTest()
      
      Frd::getRunning(
      Frd::setRunning(
        
        
        
        同时改写server和本地的文件
        
        
        
        浏览器测试库-simpletest:
           有一个浏览器对象，模拟各种操作，实际上是定向到不同地址：
             如clickLink,  
               先获取link的url
              然后跳转到该url
             click Form Submit:
               也是获取form的action,然后跳转
               
               
               
               Frd_Client; can change user easily
        
        
        Frd_Object_Backend:  保存object到后台， 实现跨request共享
          根据client id共享， (session_id)        
          
          
          
          vivagraph js
          
          
        db 文本格式，插入数据，测试用，如：
         name,password
         test,111
         test2,222
         ....
         
         
         
  Test: 
     test dependce ，模块依赖其他模块 | 目前解决办法， 交给父模块来测试所有
     

Develop Tool Functions:
  * load system's setting
  
  Module
  1, create module
  2, show all module
  3, rename module
  4, delete module
  5,  backup module
  6,  restore module
  
  Test:
     * run  test,  "core" ,or  module
     * save test to setting's folder
     * run test by other language, 
        success:  only success msg {{TEST:SUCCESS}}
        failed :  msg without success msg
     
     管理平台， 可以方便的查看系统的信息，查询信息等
     
  /*
  Test:
   * develop module
        * changelog 
        * log 
        * develop
        * test
        * fix (open file directly and modify and save)
        * statistic
        * performance
        * exception保存到数据库，exception模块可以直接点击响应exception
         打开对应的文件，跳转到对应行数，修改并保存
         
         exception中的数据最好能保存，并重新运行一次
         
         * 显示代码结构，可以方便找到对应代码！！
         
         * 图形创造form
        */
        
      
        
 测试需求：
   * 可以模拟用户操作
      用户如果 添加某个东西，  代码也应当可以直接  xxx->add()  添加这个东西
   *  所有接口可以使用程序自动获取！
   *  方法或者函数提供 额外信息：  比如在某个方法中使用， 
   
   数据库：
     显示所有表的记录数， 显示增加的记录数
     清空表的数据
     创建数据到表中
   
  考虑 interface专门一个目录
    main.php 会载入 interface
   
   通过注释等特殊信息， 让function,method可读,可修改
   
   
   
   Array格式之间的转换
   扩展array
    返回frd_array数据格式
    
      toAssoc
      toPairs
      toString(',')
       
       Frd_CLient:request_id (uuid) ，用来作log,error的标志
DEVELOP TOOL: 
  show log
  show error
  can test
  
  can manage
    MODULE/manage functions
    
    wxpython根据配置，自动生成表单
  
  接口概念：
    1, module 只有 main.php作为外部接口
    2, module 内部，仅同文件可以直接调用，否则一律通过 main.php的接口 (。。。。?.....)
    
  module的依赖可以增加module的版本
  module的接口变动，则版本也变动，changelog中增加接口变动情况
  
  
  用类似 self实现 类的动态扩展
  
  考虑定义 module name,以后内部使用module name的定义，这样修改起来简单
  
  研究phpdoc,自动生成接口注释
  
  Frd_Js: 编写js 代码
  //Frd_Css: 编写css 代码


  直接用 通过捕获错误来判断数组参数是否正确
  
  
  研究rsync, 修改后同步 本地 develop版本到待上传版本 ，然后上传
  
  LOCAL ->  LOCEL REPO -> REPO -> SERVER
  
  rsync -avz --delete  fbapps/app-arena/ develop/
  
  HTML_TABLE:  col_start(), col_end()
  
  
  LOG SUPPORT LEVEL:
  
  可以临时设置error用  log:  error level级别代替
  
  
  仿照python, 参数无序
   function test($name,$age,$sex)
   test("name","age","sex")
   test("age=AGE","name=NAME","sex=SEX")
   
   
  FRD_FORM_SELECT:
     can easy add/remove option
     
  所有的数据用对象，占用资源大
    *  需要的时候转换成对象（类）
    *  对象可以转换成其他形式,从数组到html,从html->数组
    * 例如  toArray ,可以在转换过程中 隐式转换
    
    
php testall.php , 在Test运行中，输出log和error

学习语法高亮原理
   
   
   Test:
     register True variable, at last should be true
     
  VIM 脚本， 文件浏览， 支持快捷path,常用的排前面
  
  
  Frd_Form_Text-> setReadonly(true)
                         -> setDisable(true)
                         
  Frd_Form->addHtml('''
  
  BUG: addWhere ， 对 setCreatedAt 无效
  
  #Python Test:
    1,  test script run 
    2, support multiple language (python, php)
    3, have report
    4, save error to file, can visit file by url
    
    
    代码层级：
      最低级需要所有参数
      高级的参数从其他地方默认生成
      
      如果不确定，先写低级代码
      
      对于模块： 
        最高等级代码:  main.php
        次级代码：      Model/*
        再次级:          
        
    代码可以比较方便得拆分， 
       *  高级模块  =>  低级模块
       *  本模块     =>  其它模块
       
      参数检测 ，考虑放在低级模块，因为低级模块参数最多，且全
         也可以考虑高级模块，因为高级模块出错定位方便
         
    重用级别： 
      1  LIB
      2, Module
      *  current Class
      
      测试时候，先测试低级代码，再测试高级代码
      
      模块中代码改变，如何找到关联代码
        *  module 接口 方法
          1. getModule()
          2, $XX=getModule(...)
              $XX-> ....
          3, getModule(..)->....
          
          
        *  Model/ 接口方法
         类似module
        * Model/  文件删除
           getModel(....)
           
           getModel(...)->....
           getModel(..)
           
           
        *  Helper,....   文件删除
        类似 Model
        
        *  example.. 等小写目录：
          
          
      模块代码结构： 
         
         
      
      
      低级代码如果测试过，高级代码就可以减少测试
         
         
         
         
      
      
全局的 Object 对象，自我验证

* 统计一个文件里有几个类，类有几个方法
* 获取url用 getUrl，这样能知道系统内调用了哪些controller


测试平台： 
  多数据库怎么处理
  
  
  Frd_Db:  
    
    addDb
    
   
    addDefaultDb:  return true or fals e
     setDefaultDb:  return true or false
    getDefaultDb:  return name
    
    $db->addDb("....")
    $db->addDb("....",name)
    
    $db->setDefaultDb($name)
    
    $test->equal($name,$db->getDefaultDb());
    
  
  测试 平台：
     测试整个模块的测试代码
     
     test  MODULE
    
    
    
    
    
    
AI 代替编程！


    

wdw1001@yeah.net
111111a


建立个人网站，
  尽量用德语。。。

  根据功能把代码分开，让一部分功能的代码只做一部分功能的事情


  代码有两类， 
  lib性质， 
     提供基础功能

  功能性质
  包含一个流程，连接许多函数，方法等等,类似action


  PHP CLASS MANAGE ，可以考虑用python
    * method function
    * method level
    * method input
    * method output

route:
  根据referer 判断重定向
  
  Frd_From_Field  custom field

  Plan类型： 定期  ， 需要程序自动产生
  
  专门用于发送错误的页面，该页面提供用户的信息，用户可以输入更多信息
  
  
  EDITABLE JS
  module:
   editable
      loadJs()
      
    getModule("editable")->text(KEY,VALUE,Params);
    
    getModule("editable")->setConfig("key_identifier","identifier");
        getModule("editable")->setConfig("value_identifier","value");
        
       
       editable_text(name,value,params);
       editable_set_config(key,value)
       editable_set_config(class,'editable2');
       
       
       getModule("theme/simple/editable");
       
       module初始化的时候，增加css或者js
       __construct()
         Frd::getPage()->addJsHeadLink
                               ->addCSss
                               
                               
                               
                               
                               以下是您的帳號的使用信息，請妥善保管。
帳號有效期：2012-10-04 至 2012-11-04
使用者名稱：030200023850
　連線密碼：****** (剛才填寫的密碼)
伺服器名稱：helene.tenacy.net
 激活地址：http://tenacy.shop.tm/activate付费密码卡：
【用户名称：030200023850　密码：349152】

参数的几种表现方式


测试平台为html
可以设置各种html类型 4, 5, 等等
并设置载入css,js等

Table to layout

Block 也用module


Resource:  包含php/js/css等等，
是一种轻量级，无严格规则的代码组织方式
 考虑增加一个标准main.php， 用来载入函数，模板等
比如 getResource( ) ->addJs,  loadJs ,addCss
还可以方便进化到 module, 并且不需要多少变动


----------------
JS
   global variable
   
   
   
   设计师们通过3D扫描、3D打印、
   
   需要一个测试平台，可以载入，去除js
   载入，去除css
   
   工具检验html正确， 
A， 检测<div  和  </div> 个数
B， 检测任意标签个数是否匹对


Js, Ajax


一个类： 
  方法等级：
      1， 对外方法
      2， 对外方法的子方法， 有依赖
      3， 。。。 
      
    可以通过注释， 分析类的方法等级， 
    
    
    可以检测网站，达到指定负载就拒绝连接 
    
    
    ----------------
    

功能描述


用缩进代表调用层次

module 设置response type, json , php 

http://www.app-arena.com/app/iconsultants/multimedia-contenst/dev/ajax2.php?aa_inst_id=2844&join_id=572&module=page/overview&action=showEditForm


form validate



隐藏状态时候，对js的影响  （事件）等

js防止重复载入
js依赖载入


香港： 
   1， 寻找能影响货币的因素
       公司
       政策
       印钞 ，香港金融管理局(金管局)及香港的三间发钞银行(渣打银行(香港)有限公司、香港上海汇丰银行有限公司及中国银行(香港)有限公司
       
       数据，  货币量
       
       
       
       
       
       
       
Ajax Queue:
 1
   login()
   showUser()
   
2, 
  var name=getName();
  showUser(name);

3
  var name=getName();
  if name == 'frd':
    isFrd();
  else:
     notFrd();
  endif;
     
{type: 'normal' , level:0,   function:  getName,set:'name'};
{type: 'if' , level:1, condition:'==',conditiion_param:'frd',get:'name'};
{type: 'normal' , level:1, function:isFrd};
{type: 'else' , level:1};
{type: 'normal' , level:1, function:notFrd};
{type: 'endif' , level:1};


4,
   var type=getType();
   if type == 'user':
     User();
   elif type == 'admin':
     Admin();
   else:
      login();
      User();
   endif; 
   
 {type: 'normal' , level:0,   function:  getType,set:'type'};
{type: 'if' , level:1, condition:'==',conditiion_param:'user',get:'type'};
{type: 'normal' , level:1, function:User};
{type:elif,level:1, condition:'==',condition_param:'admin',get:'type'}
{type:normal,level1,function:Admin}
{type: 'else' , level:1};
{type: 'normal' , level:1, function:login};
{type: 'normal' , level:1, function:User};
{type: 'endif' , level:1};

5.
    var type=getType();
   if type == 'user':
      var is_vip=isVip();
      if is_vip == true:
         Vip();
      else:
         User()
      endif;
         
   elif type == 'admin':
     Admin();
   else:
      login();
      User();
   endif; 
   
   
   {type: 'normal' , level:0,   function:  getType,set:'type'};
{type: 'if' , level:1, condition:'==',conditiion_param:'user',get:'type'};
{type: 'normal' , level:1, function:isVip,set:'is_vip'};
{type: 'if' , level:2, condition:'==',conditiion_param:true,get:'is_vip'};
{type: 'normal' , level:1, function:Vip};
{type: 'else' , level:2};
{type: 'normal' , level:2, function:User};
{type: 'endif' , level:2};

{type:elif,level:1, condition:'==',condition_param:'admin',get:'type'}
{type:normal,level1,function:Admin}
{type: 'else' , level:1};
{type: 'normal' , level:1, function:login};
{type: 'normal' , level:1, function:User};
{type: 'endif' , level:1};


6.
set is_update = true   //boolean value
if is_update == true:

 for i in range(1,5):
   set params={postion:'i',name:'frd'};
   if i == 2:
     continue;
   elif i == 4:
     break;
     
   Update();
endfor;

else:
  notUpdate();
endif; 

set i = 0;
while True:
   i+=1;
   if i == 5:
     break;
     
    Update(i);
   
endWhile;

{type:normal,set:'is_update',params:true,function:null}
{type:if,condition:'==',condition_param:true,get:'is_update'}

{type:'for',var:'i',start:'0',end:'3',step:'1'}
{type:'normal',set:'params',params:{postion:'i',name:'frd'}}
{type:'if', get:'i',condition:'==',2}
{type:'continue'}
{type:'elif',condition:'==',get:'i',
   elif i == 4:
     break;
     
   Update();
   
{type:'endfor'}

{type: 'else' };
{type: 'normal' ,function:notUpdate};

{type: 'endif' , level:1};

if need loop
pushLoop(postion)
popLoop()
  



normal: Function()

语句类型：
    expr 
    call function
    set var
    get var
    
   
  set ret = login('user')
  
 {type:'call',function:login,params:'user',set:'ret'}
 
   set ret = login('user')
 {type:'call',function:login,params:'user',set:'ret'}
 
 
 CHANNEL :  LAST  BUILD DATE!!
 
 
 Last:
   
set i = 0;
for  i in  1,10:
   set param=new Array(1,10)
   set value=randint(param);
   if value > 3:
      if value == 4:
         User()
      elif value == 5:
         Vip()
      elif  value == 6:
          Admin()
      else:
         Unknown()
      endif;
      
   endif;
   
endfor

--
{type:'set',var:'i',value:0}
{type:'for', var:'i',start:'1',end:10,step:1}
  {type:'set',var:'param':value:new Array(1,10)}
  {type:'call','set':'value',function:'randint',params:'param'}
  {type:'if',value1:'value',compare:'>',value2:3}
     {type:'if',value1:'value',compare:'==',value2:4}
      {type:'call':function:'User'}
     
     {type:'if',value1:'value',compare:'==',value2:5}
      {type:'call':function:'Vip'}
      
     {type:'if',value1:'value',compare:'==',value2:6}
      {type:'call':function:'Admin'}
     {type:'else'}
     {type:'call':function:'Unknown'}
     {type:'endif'}
  {type:'endif'}
{type:'endfor'}
 
 
 
 ---------------- Develop Tool -----------------------------
 1,  Manage
     Project , Action
       delete app model
       delete app instance
       copy app model ..
       
       自动显示CONFIG
       
       
       Tree:
    Desc: 列表拖动成树状
    
    Func: 偏移量生成新的level,取消level  (子元素跟随）
      
         获得 tree数据
           
          转换成  form格式
        PHP:  解析form  tree格式
           tree:name = json data
           
           
---------------------
 html 布局
 默认是自上而下，布局可以考虑表格， （方便简单，但是需要全部载入才能显示）
 div 有些麻烦，需要额外做很多工作，但是可以实现浮动效果，能够动态改变显示，如缩小某一列之类
 
 基本布局元素：
   box:  
     配置： 自左向右 （默认）
               自右向左
                
                内容左浮动
                内容右浮动
                内容居中
                
               自动宽度 （默认）
               自定义宽度
               
               默认高度 （默认）
               自定义高度
               
               自定义宽度且居中
               
               
            
            
  DEBUG 工具：
     session: info   
               
   Test any php code
   Test  js code
   
   post , get test
   
   
错误类别：
   不可错误，发生：
   影响部分功能，可以忽略
   
错误处理：
   中断
   回滚
   忽略 且 提示
   
   
从 JS, PHP, 中根据注释生成文档，  


LOG： 
   1， 记录
   2， 防止过多

对于html+js
  创建一些特定结构DOM的js,
  当dom改变，改变JS方法就行
  不需要重写
   
 
 HTML_XXX 
   引入秩序概念
     当超越秩序，引发异常
     
  类似firebug
    能够执行js, 
    并且支持iframe
    
  App_Object can supprt different versions and detail levels 
  
  PHP HTML OBJECT
  
  JS PrintF Function


COOKIE 检测 ， 
 假如COOKIE里面的IP或者其它特征和现在的不一样的话，
 可能 COOKIE被盗用， 退出
 
 
 Frd::toUrl  (url or path)
 Frd::toPath(  url or path
 
 
-----------------
online debug:
  1, 支持各种； ，自动转换
  2， 定义保存路径  
      run/...
      
      
  
     
     currentUrl
    
     
     ----
     Table Next Id
     Prev Id
     
     
FRD::     Rewrite URL

 59 
 60    Object:
 61      1, get/set private data
 62    Object_Prop...:
 63      2, get/set 属性 public/protected/private(秩序) 属性
 64      a, 可以禁止读取某些属性
          b,可以禁止读取private属性
          c，可以设置属性的类型
             新的属性是否 == 旧的属性类型
 65      两者合成后的行为：




LINUX常用命令屏幕
或者动态修改， 有多张，随机选一张
活动动态生成名目

研究 Diff

JS：
  更好管理
  更好测试
  更好调试
  抛出错误！
  throw

  
   JS TOOL
   
   BLOCK 文件仅仅用 xxx.xxx.xx 区分，不用目录，目录太深比较麻烦
   
   
  PHP, Param
    第一个参数如果是array
    则进入高级参数模式，
     需要像python
    支持：
      1, 默认值
      2，参数错误抛出异常
      3，  array(name2=value2, name1=value1) 的散列表模式
      4， 支持php 的 array(name1=>value1,name2=>value2)
      5, 支持 预定位置+散列表  array(name1,name2=value2,name3=value3)
      
      
      JS ERROR
      
      
      任务计划分成 轻重，长远
      
      Facebook Js logout, Fb Php still can get user id
      
      
      Plan 和 ChangeLog结合起来 形成文档
      
      App 规格
      Class 规格
      文件 规格
      
      git hook 获取所有修改后的文件 根据版本
      
      Frd_Page 强化+优化
      
      Database:   create ,   设置  createInfo 列 (json)
                            edit , 设置 updateInfo
                            delete 设置 deleteInfo (不真正删除，留作备份） 
                               is_deleted=True
      
      
      所有的网站可以增加 thanks链接 
      感谢各种库的
      各种作者
      
      
      HTTP协议
      
CSS 定位： 
  1， top ,left, 等等是针对边框，还是针对整个内容的尺寸中心
  2， iframe中定位的表现
  
  
JS 动画中， 如何取消动画


GET的缓存，是仅仅根据URL，还是会依照session改变？
不同用户同样的地址，得到 内容是什么

IFRAME中， JS和外层交互的
window对象

Frd Html config
@timeline
  version created_at
  changelogs
  
任何class 有3个等级
  Quick 最快
  Light  快且简单
  Normal  平常不快
  Heaver  慢且强大
  
  Custom
  
  
  Ajax和动画一起工作，
  和渲染一起
  渲染会不会等待ajax结束
  
  设置动画之后，如果下面持续有渲染，是先动画，还是渲染？
  
  
  Zend Select or Frd Collection 可以删除where,（query)


  特性
  Feature  具备什么元素
  Bug 具备什么元素 

  Changelog 用来表示 Bug && Feature


      </p>

  