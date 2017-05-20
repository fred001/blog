
  # YII 学习内容

      version:  4
      created_at:  None
      updated_at:  2016-07-25 12:54:28

      None

      None


      <p>
      YII 学习内容（初步）：
  安装
 数据库操作： mangodb


 创建表单，并验证表单
模块
扩展



数据库查询构建： http://www.yiichina.com/doc/guide/2.0/db-query-builder
	$rows = (new \yii\db\Query())
    ->select(['id', 'email'])
    ->from('user')
    ->all();

生成URL: http://www.yiichina.com/doc/guide/2.0/runtime-routing
$url = yii\helpers\Url::to(array('side/urlbbb',"name"=>"Frd"));


请求：http://www.yiichina.com/doc/guide/2.0/runtime-requests
$request = Yii::$app->request;

$get = $request->get(); 
// 等价于: $get = $_GET;

$id = $request->get('id');   
// 等价于: $id = isset($_GET['id']) ? $_GET['id'] : null;

$id = $request->get('id', 1);   
// 等价于: $id = isset($_GET['id']) ? $_GET['id'] : 1;

$post = $request->post(); 
// 等价于: $post = $_POST;

$name = $request->post('name');   
// 等价于: $name = isset($_POST['name']) ? $_POST['name'] : null;

$name = $request->post('name', '');   
// 等价于: $name = isset($_POST['name']) ? $_POST['name'] : '';


基本结构：
	默认URL： http://yii.frd.info/index.php?r=site%2Fblog
	核心是 r=site/blog  中的 site/blog
	site对应了控制器的类  SiteController 
	blog对应了其中的方法 actionBlog
	
	控制器目录 controllers
	模板目录    views/
	
	动作中对模板赋值：
		    return $this->render('index', array(
 83           'models' => $models,
 84           'pages' => $pages,
 85        ));

	模板中直接使用变量  $models, $pages 

子模板：

视图中渲染
		子模板不默认继承父模板变量

	可以在视图中渲染另一个视图，可以调用yii\base\View视图组件提供的以下方法：

	    yii\base\View::render(): 渲染一个 视图名.
	    yii\web\View::renderAjax(): 渲染一个 视图名 并注入所有注册的JS/CSS脚本和文件，通常使用在响应AJAX网页请求的情况下。
	    yii\base\View::renderFile(): 渲染一个视图文件目录或 别名下的视图文件。

	例如，视图中的如下代码会渲染该视图所在目录下的 _overview.php 视图文件， 记住视图中 $this 对应 yii\base\View 组件:



单表操作：
	1， 建立基本类  models/Table.php
	 1 <?php
  2    namespace app\models;
  3 
  4    use yii\db\ActiveRecord;
  5 
  6    class Blog extends ActiveRecord
  7    {
  8       /**
  9       * @return string 返回该AR类关联的数据表名
 10       */
 11       public static function tableName()
 12       {                  
 13          return 'blog';
 14       }                                 
 15    }                                 
 16                                      
~                                                                                                                    
~                                                                                                                    
~           创建对象：
			7 
 18    /*
 19    $blog=new app\models\Blog();
 20    $blog->title="ABC";
 21    $blog->save();

更多用法
	http://www.yiichina.com/doc/guide/2.0/db-active-record


自定义路由  http://www.yiichina.com/doc/guide/2.0/runtime-routing
	config/web.php ： components 数组中
	    'urlManager' => [
 46         'enablePrettyUrl' => true,
 47         'showScriptName' => false,
 48         'enableStrictParsing' => false,
 49         'rules' => [
 50         'blogs' => 'site/blog', //对应http://yii.frd.info/blog
 51         'blogs/<id:\d+>' => 'site/blogview',  //对应http://yii.frd.info/blogs/1
 52         ],
 53         ],

	


分页： http://www.yiichina.com/doc/guide/2.0/output-pagination
	包含两部分 ，pagination 对象， 和在页面显示用的 linkpager widget
	当前页面可能是从get参数中来的，大约在哪里有配置
	
// create a pagination object with the total count
$pagination = new  yii\data\Pagination;Pagination(['totalCount' => $count]);
$pagination->offse
$pagination->limit

use yii\widgets\LinkPager;

echo LinkPager::widget([
    'pagination' => $pagination,
]);


// If you do not specify this, the currently requested route will be used
$pagination->route = 'article/index';

// displays: /index.php?r=article%2Findex&page=100
echo $pagination->createUrl(100);

// displays: /index.php?r=article%2Findex&page=101
echo $pagination->createUrl(101);


布局： http://www.yiichina.com/doc/guide/2.0/structure-views
	一些特别功能： 可以在模板中指定区块，然后在布局中显示
	并且还有一些常用功能： 设置标题，修改header中的内容，引入js,css等

YII 表单：
	1， 需要创建一个表单模型，定义表单的字段和验证规则
	2， 前端使用activeForm 类来输出，这个类需要表单模型作为参数输出字段
	3， 后台使用 model->load(REQUEST), model->validate 来验证表单是否正确
		若不正确，则会设置 model->errrors，
		此时将模型重新用来渲染，则前端会显示处错误信息

用户登陆：
	1， 创建  user 模型， 并添加配置
	
	检测是否登陆：  Yii::$app->user->id 不能为 null
	登陆：  Yii::$app->user->login(model )  //active record
	登出：  Yii::$app->user->logout()


YII 用户权限：
	一个是初级的，一个是高级的
	初级的看起来没什么用
	高级的叫rbac

	首先，创建rbac代码，定义权限关系
	其次执行这段代码， 比如浏览器中访问对应action,
	会生成关系文件，在rbac 目录之下（确保目录可写）

	然后就可以在代码是使用这个权限了。
      </p>

  