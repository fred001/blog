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

## CComponent
  http://www.digpage.com/behavior.html

  核心是三个功能：  属性，事件，行为

  属性
    private $name;
    访问： ->getName() setName() 

  事件：  $this->_e
  行为：  $this->_m 


  事件支持为对象绑定事件， 事件通过 call_user_func来执行
  行为支持为对象额外添加属性和方法， 方法通过 __call() 来遍历所包含的行为，最后获得正确的方法来执行


## CFormModel 中属性不增加到 rules 则不生效的原因
    (CFormModel  validate : rules  写法， 怎么赋值的？)

  核心是CActiveForm::validate
  这其中会将 POST参数赋值给 CFormModel的attributes
  实际上调用了CFOrmModel::setAttributes
    在这个方法中，会进行校验，所有不是安全的参数都不会被赋值
    所以必须将属性增加到  rules() 方法中，并且至少设置校验规则是 safe,然后POST的数据才能在 CActiveForm::validate($model) 之后
      赋值给$model 













      CComponent:

        属性必须增加类似 setName, getName 的方法才能使用 ->name=xxx 的方式访问
          不是设置了属性就能直接 setName,getName的，根mengoto的Object不一样

            

          ActiveRecord: rules
            rules定义了 setAttributes中会被影响的值, getAttributes似乎不会影响
