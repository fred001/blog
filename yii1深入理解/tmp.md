## Yii::app()->end($status,$exit=true)
  如果有事件绑定在  onEndRequest, 就执行事件

  然后 exit($status) 退出

## CONTROLLER  : beginWidget, endWidget
  可以实现widget 嵌套输出

## CComponent
    核心属性 $_e , $_m 

    1. 实现了 _get/_set 的相关的魔术方法
    2. 实现了 behieve 的绑定
    3. 实现了 事件的绑定

## CHtml
  辅助创建html表单元素
  核心是一个 clientChange  ,不知道干嘛用的

## Yii::createUrl(PATH,PARAMS)
    实际调用  web/CUrlManager.php 来创建
      
## Yii 模块
    核心是模块文件继承  CWebModule
    其它的参照标准目录结构

## Layout如何传递变量
  render view 时候 render  layout

  1. render view
  2. if have layout:  render layout with content=VIEW CONTENT

  所以layout中不能直接传递变量
  有两种方式：
      1. Yii::app()->params
      2. $this-> VARIABLE (通过controller中设置此变量)

## 控制台执行
  1. 调用yiic
  2. 引入 yiic.php
  3. 引入 framework/yiic.php 
      初始化适合console环境的配置，最后执行

          核心大概是 commandRunner
