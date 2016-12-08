
  # 一个比较有用的js仿类

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:01:06 


      None


      <p>
      一个比较有用的JS仿类
一个比较好用的js 仿类

 

 
//FBVideo  
var CLASS = {  
    //>>>1/4 static attributes  
    //<<<1/4 static attributes  

 
    create: function (name) {  
        //>>>2/4 create or inherit  
        var inherit = {};  
        //<<<2/4 create or inherit  

 
        var obj = inherit;  
        var parent = this;  
        var self = obj;  

 
        //>>>3/4 static attribute operation  
        //<<<3/4 static attribute operation  

 
        //>>>4/4 define object  
        obj = $.extend(obj, {  
  name:'',

 
            init: function (name) {
   self.name=name;  
        },
 test:function(){
  alert(self.name);
 }
        });  
        //<<<4/4 define object  

 
        obj.init(name);  
        return obj;  
    }  
};  

 
本类源于此：
http://www.ruanyifeng.com/blog/2012/07/three_ways_to_define_a_javascript_class.html

 
不过我增加了 self 这个变量。

 
所以无论哪里，都可以使用  self.METHOD 来调用。
self永远指向此对象本身。

 
<script>
 var obj=CLASS.create();
</script>

 
<button onclick=”obj.test()”>Test</button>

 


      </p>

  