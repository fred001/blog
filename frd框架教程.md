
  # frd框架教程

      version:  2
      created_at:  2016-04-21
      updated_at:  2016-04-21 12:43:14

      created at 2016-04-21 12:36:55 
update at 2016-04-21 12:43:14


      None


      <p>
      （本文档仅仅为了先占据一个位置，很不成熟）
1.环境需求
	已安装web服务器
	web服务器支持php
	已安装mysql 或 mariadb 数据库
	假设web目录为  example/
	假设网站名为  example.com
	假设数据库名为  test
2. 先建立数据库的表  test.blog
	create table blog ( 
		id int(10) not null auto_increment primary key,
		 title char(200),
		 content text,
		 created_at datetime
	);

3. 导入frd框架到 example
	cd example/
	git clone git@github.com:fred001/frd-php-framework.git .

4. 配置服务器，令 example/public 为web目录
5.访问地址  http://example.com/index.php/test （提示controller 不存在的错误）
6.理解 route [http://example.com/index.php/test]
其中  index.php 后面部分由路径+参数组成
/test 对应 controller 中的路径  module/default/controller/test.php
7.配置本地配置
	创建文件 example/local/setting.php
	内容：
<?php
$setting=array(
  //Zend Db Adapter Params
  'dbs'=>array(
    'default'=>array(
      'disable'=>1, //optional, if not exists,is enable
      'adapter' => 'pdo_mysql',
      'host' => "localhost",
      'dbname' => "test", 
      'username' => "用户名", 
      'password' => "密码 （没有则留空)", 
    )   
  ),  

);

8.设计blog 页面。
	本教程仅仅简单介绍功能，因此不准备完全所有blog应有的功能。 仅仅建立一个blog列表页面。数据手动插入blog表。也不包含分页。
9.建立controller   
	cd example/
	touch  module/default/controller/blog.php
	blog.php 内容为：
		<?php
		$layout=$_module->getLayout("basic");  
		$layout->content=$_module->render("blog",array(
		));

		echo $layout->render();		

    所有模板都位于  module/default/templates
		$_module 是模块 module/default，具体的类是 module/default/main.php 
		$_module->getLayout 的具体代码是  module/default/main.php:: getLayout() 方法
		此方法从 templates/default.phtml 中获得模板并生成一个 layout ，
		事实上layout和template 是一个东西，只不过当作为整体布局时候特别命名变量为layout以示区别。
		$_module->render(NAME，VARS) 的功能是渲染一个模板，获得其输出。 
		默认的目录是本模块的templates ,所以$_module->render(“blog”)对应的模板是
		MODULE/templates/blog.phtml (模板都以phtml为后缀）

	既然建立了controller, 现在可以访问其URL : http://example.com/blog
	错误提示 模板不存在，接下来创建模板  module/default/templates/blog.phtml (内容为空）
	此时已经无错误，显示空白页面。
	接下来显示内容。
	先插入数据：
		insert into blog (title,content,created_at) values("hello","hello world",now());
		insert into blog (title,content,created_at) values("test blog","test",now());

	再回到 controller/blog.php 
		修改内容为：
<?php
$layout=$_module->getLayout("basic");

$db=app()->getDb();
$select=$db->select();
$select->from("blog");
$select->order("id desc");

$rows=$db->fetchAll($select);


$layout->content=$_module->render("blog",array(
   'rows'=>$rows,
));

echo $layout->render();

然后修改template
	<table class="table">
   <thead>
      <tr>
         <th>Title</th>
         <th>Content</th>
      </tr>
   </thead>
   <tfoot>
   </tfoot>
   <tbody>
      <?php foreach($this->rows as $row): ?>
      <tr>
         <td><?php echo $row['title']; ?></td>
         <td><?php echo $row['content']; ?></td>
      </tr>
      <?php endforeach; ?>
   </tbody>
</table>
	
现在重新刷新 blog页面，应该能顺利看到数据了。

现在尝试下新的布局： 
	修改blog.php, 修改 getLayout(“basic”) - > getLayout(“bootstrap”);
	再次刷新，现在可以看到样式显著变化。
	这是因为换了一个bootsrap样式的模板。

最后总结下增加页面的步骤：
	1，先计划URL ，   比如  /blog/add
	2,根据URL,建立对应controller 页面   CONTROLLER/blog/add.php
	3, 在controller页面中编写代码。事实上并不需要一定通过模板渲染，直接输出同样可以。这也是frd框架设计的理念之一： 尽量允许原始混乱的php代码。因为原始代码虽然混乱，然而快速。
	4，如果需要模板，那么通过 $_module 对象获得layout,并且渲染模板，赋值模板到layout,最后渲染layout。当然也可以直接渲染模板。

最后是其它开发的参考。
如何执行数据库操作？
	frd框架的数据库操作基本使用Zend Framework 1的数据库类，但是略做改进
	获得zend db 对象（被frd db封装)
	app()->getDb() // 相当于 app()->getDb(“default”) #default 是 setting中的那个数据库 配置 key

	Frd_Db_Table (对Zend_Db_Table的改进）
	对于blog 表，首先在 MODULE/Table/下创建文件   Blog.php
	内容：  <?php  
		class Index_Table_Blog extends Frd_Db_Table
		{
			function __construct()
			{
				parent::__construct(“blog”,”id”)；
			}
		}  
	
	以后可以使用  MODULE->getTable(“blog”) 获取此对象
	具体用法查询  Frd框架的 Db部分详细解释

如何增加函数？
	默认提供一个自定义函数文件 
	/functions.php
	此文件在 index.php 被载入
	你可以修改此机制以实现自己的函数管理机制
	
	为什么要函数？
	Frd 框架认为代码的重用是有层次的，函数是一个基本的层次，
	非得让所有代码集中在某个重用层次是愚蠢的，
	因此Frd框架尽量提供不同层次的代码重用
	自定义函数就是其中一个层次

如何增加自己的类？
	通常可以在 MODULE/Object 增加类  Index_Object_类名
	通过 MODULE->getObject(“类名”)获取
	另外当然可以随意创建其它目录位于  MODULE ，格式都是首字母大写，文件参照 Index_Object_类名
	获取方法都是 MODULE->getFOLDER(“类名”)	

MODULE 是什么概念,如何使用？
	我曾尝试子模块，多模块，最终认为它们带来了巨大的复杂度，对于中小复杂程度的项目完全不值的。因此放弃了子模块和多模块的概念。一个MODULE虽然是单个模块，其实就是一个网站。

如何引入第三方库？
	Frd框架使用 Zend Framework1 的载入方式。 遵循简单的自动载入机制。不支持当前流行的composor 等机制。也不遵循 psr-* 推荐标准。
	默认第三方库存放于  /lib 之下， 目录代表命名空间



frd框架的设计理念？
	Frd 框架的服务对象是中小复杂程度的网站。复杂程度指代码逻辑，并不是代码量。
	Frd框架的设计理念包含以下几点：
		1，仍然尽量允许原始PHP代码
		2，尽量少地引入新概念，因为任何概念都带来新的学习成本。
		3，尽量保持简单，没有被证明必须的功能不引入，宁可保持功能缺失。
		4，能够由第三方功能实现的功能不引入。比如不会创建自己的测试类，因为用户完全可以选择自己喜爱的功能。
		

frd框架和其它框架的区别与联系？
	Frd框架参照自Zend Framework1 框架，开始是对Zend Framework1 的功能增强。后来吸收此框架功能，转换成自己独立的框架。 
	Frd框架设计理念和Zend Framework2 开始产生分歧，Frd框架仍然准备保持简单，直观，迅速。

Frd框架仍然缺少的功能：
   测试
   国际化
      </p>

  