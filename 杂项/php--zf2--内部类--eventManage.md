
  # php--zf2--内部类--eventManage

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:32:59 


      None


      <p>
      EVENTMANAGER
EventManger

 
一个事件管理对象，十分费解。


 
核心功能是   
 attach  绑定监听对象
 trigger  抛出事件

 
如何使用：
 1， 继承对应接口， 某个类作为容器， 这个容易实现具体方法，抛出对应事件，交给监听的回调函数

 

 
疑问：  
 1，为什么使用这么复杂？
  2， 事件的identifer为什么需要两个值，分别是什么
event为什么要创建自己的类来用？
	大概是这样可以让event manager成为类的内在属性
	这样更灵活，且不对类本身做任何额外要求
	
	
	
trigger(string $event, mixed $target = null, mixed $argv, callback $callback = null)  
attach(string $event, callback $callback, int $priority)
        
shareEventManager和正常EventManager有什么区别？     
shareEventManager->attach为什么是3个参数？

      </p>

  