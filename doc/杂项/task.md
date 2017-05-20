
  # task

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:54:27 


      None


      <p>
      


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


>>>新增链接
http://www.boohee.com/food/
薄荷网
查询食物热量



phpunit仅测试一个方法 
phpunit --filter "/::testPOST/" phpunit.php 





【记住了！选牙膏别看名字，看成分】美白、防蛀、抗敏…各种牙膏让人眼花缭乱。其实，无论叫什么名字，成分才是决定牙膏是否适合你的重要
因素。1.牙齿发黄要找“有机硅”。2.防止蛀牙要找“氟”。3.牙齿敏感找“氯化锶”或“硝酸钾”。4.预防牙垢找“焦磷酸盐”或“柠檬酸锌”。 转











******************************UNICORN 手册*****************************************
前言
名称： UNICORN
全称： UNICORN 人生管理
简介： 取吉祥的意思，另有独角兽之独的意思。
目标： 完全服务整个生活，包含工作，对人生目标的实现进行支持。
建立日期：之前未有记录，勉强从今日开始（２０１３-０８-２５）


概念

目标管理 
人生目标。 按照不同分类，有长短中期，ABC等级，预期未预期等分法。
其中最重要的是长期目标，指在一生中要实现的目标。
依据长期目标，产生短期（3年）目标， 然后更进一步细化成年度目标，半年，月目标。
月目标细化成周目标。
细化程度根据个人特点而定，并非一定要照搬。

计划管理 
计划产生于目标， 越长期的计划，越抽象，越短期的计划越具体。
对长期目标进行细化，细化成不同子目标。
目标和计划的区别： 计划有时限，虽然没有具体到某天，但是至少具体到某周，某月，更长的算目标。


任务管理
任务是对计划的细化， 通常指每日的活动。 

资金管理
定时记录所拥有的资金。 

资产管理
定时记录所拥有的资产。

收支明细
每日记录收支明细。
每天记录，并增加到当月的记录中去
每月月底计算总额，和其它统计

投资管理
定时记录投资状况。

书籍阅读
记录书籍的阅读和笔记 
书籍阅读流程：
资源库 ------> 正在阅读 （U盘） ----------> 资源库-已阅

音乐管理
记录当前听的音乐

链接管理
记录有用的链接，定时整理成知识

帐号管理
记录所有的账号

知识库
记录个人的知识，支持回顾，检查记忆情况，查询 等等，大脑如同内存， 知识库就是硬盘。

工具库
支持工具

项目管理 （不包含 unicorn)
管理从事的项目

日记流程： 
每天结束前，编写记录

软件管理
管理所有的软件

工作管理 （单独，避免和私人信息混淆）



操作
长期目标制定
3年目标制定
年度目标制定
月计划制定 
周计划制定

定时计划
每日计划
每周计划 
每月计划
每年计划

每日任务制定
产生过程：
人生目标-> [长期计划] -> 人生模块 -> 短期计划 -> 每日任务



常规计划
--------------------------------------------

常规计划 -> 常规任务 ，根据优先级确定当日任务

============================================


定期计划
--------------------------------------------
模块 定期任务 
-------------------------------------------- 
资金管理 每周整理资金

资产管理 每月整理资产


收支明细 每日整理明细，每月归档明细，并统计总额


投资管理 每月整理投资


日记流程 每日记录

锻炼身体
============================================


触发计划
--------------------------------------------
模块 触发条件 任务 
--------------------------------------------
书籍阅读 开始阅读 记录阅读日志
结束阅读 记录阅读日志

链接管理
增加链接 记录链接，整理知识

帐号管理
增加帐号 记录帐号


============================================



流程:
每日开始，复制昨天的 current/DATE.txt 到今天的 current/DATE.txt
整理其中 注释掉的内容
检查 每周计划 ，增加必要的内容到DATE.txt

DATE.txt内容包括：
每日开始，结尾常规计划，
每周每月每年等开始和结尾的计划
当前计划
意外计划


每日流程：
1， 创建 DATE.txt
2, 执行 DATE.txt


多平台同步
将unicorn拆分成 
unicorn_share (仅仅包含可以被公共看到的信息，并且控制大小） ,
unicorn_resource ( 包含资源（音乐，书籍等大容量内容） ）
unicorn_private (包含其它所有内容，不在多平台内同步）

备份策略
每周备份 unicorn_private + unicorn_share


未来
报告 
定期任务！ （每日整理download, tmp/DATE.txt )







      </p>

  