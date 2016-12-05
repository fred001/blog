
  # php经验

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 15:27:58 


      None


      <p>
      

>>>>>>Learn

php ncurses


yum -y install php-pecl-ncurses

>>>>>>


分类需要首先分大类，然后逐渐细化到小类，因为大类比小类更容易点
原子的类也可以先成立

大类一时间无法创建，可以先尝试原子类，有一个经验后再来分大类

>>>>>>
计划的详情？ 当计划执行的时候，中途会产生很多改变，需要记录它们
因为计划可能比较长久，不记录会忘记

初步考虑（ 计划文件夹下创建 详情 目录， 每个计划对应一个文件 编号-TITLE简述.txt




>>>>>>DOC
代码库， 
每种语言一个文件， 直接复制，多了以后分类
比如： 语言-分类.txt


phpunit ,当assert出错，马上跳出，不会继续后面的测试



>>>新增计划
利用起 平板
nexcus7 安装 4.3系统
同步书籍阅读
同步音乐
同步unicorn,可以编辑 DATE.txt

安装驱动 windows
安装驱动 linux 

成功日记
学会炒菜：
洋葱炒豆干

购物清单： 老虎钳 （安装后座车篮）


记录常用的php函数，（经常遇到，但是忘记了参数），背诵

is_numeric and is_int difference ?
is_int("11") false !!




>>>>>>Array Validate 文档
----------------------------


关联文件
APPMANAGER/test/:
phpunit.php #test class
lib/validate_array.php
api/config.php #api call and validate config
api/api.php #api class and functions
test/validate_array.php # test lib/validate_array.php

使用方法：
$array=array(
'name'=>array(
'first_name'=>'first',
'last_name'=>'last',
),
'age'=>11,
);

$validate=array(

);

$errors=array();
if( validate_array($array,$validate,$errors) == false)
{
var_dump($errors);
}
else
{
echo "validate";
}


检查key是否存在
$validate=array(
array("name",VALIDATE_ARRAY_KEY_EXIST),

);
检查key是否不存在
$validate=array(
array("name",VALIDATE_ARRAY_KEY_NOTEXIST),

);
检查key对应的value 是否 string, array, 
$validate=array(
array("name",VALIDATE_IS_STRING),

);

$validate=array(
array("name",VALIDATE_IS_ARRAY),

)
检查key对应的value是否array, 并检查 count数目
$validate=array(
array("name",VALIDATE_IS_ARRAY),
array("name",VALIDATE_ARRAY_COUNT,2),

)
检查子key
$validate=array(
array("name.first_name",VALIDATE_IS_STRING),

)


>>> nexus7找回 开发者选项
昨天刷了google官方 android 4.2,但是找不到开发者选项菜单了.
google上找了好久,终于找到了,原帖地址忘了,找到补上.

方法如下

手机 - 设置 - 关于手机 - 版本号(最下方JOP40C) - 连续点击 7次 - 开发者选项菜单就回来了


paypel: iamlosing02@gmail.com - a116812013b


>>>新增链接
http://www.boohee.com/food/
薄荷网
查询食物热量


>>>> 购物清单
山地车 前后挡泥板


phpunit仅测试一个方法 
phpunit --filter "/::testPOST/" phpunit.php 


>>>书籍阅读记录
9.1 开始阅读 [如何掌控自己的时间和生活].How.to.Get.Control.of.Your.Time.and.Your.Life.2006.Scan.CHS-INTERNET
9.5 开始阅读 Emmerich S., Colombo F. Deutsch lernen mit Spielen und Ratseln.2002



http://www.cloudfogger.com/de/download/ 
iamlosing02@gmail.com 116812013`



【记住了！选牙膏别看名字，看成分】美白、防蛀、抗敏…各种牙膏让人眼花缭乱。其实，无论叫什么名字，成分才是决定牙膏是否适合你的重要
因素。1.牙齿发黄要找“有机硅”。2.防止蛀牙要找“氟”。3.牙齿敏感找“氯化锶”或“硝酸钾”。4.预防牙垢找“焦磷酸盐”或“柠檬酸锌”。 转



书籍的同步！

定期检查听力


骑行记录：
9.7 20公里 
9.8 30公里 3.5
9.9 30公里 2


unicorn 同步：
分系统 -> dropbox -> 主系统
主系统 -> dropbox -> 分系统


研究折叠自行车：
是否一个好骑
是否容易携带去别的城市
是否容易入住酒店 

      </p>

  