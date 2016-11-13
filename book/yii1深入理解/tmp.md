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
