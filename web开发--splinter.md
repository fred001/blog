
  # web开发--splinter

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:52:48 


      None


      <p>
      SPLINTER
Browser.find_by_.. 没有找到会返回 []

找到对象后，  outer_html包含本身的html (无内部的元素  ，如 <input)..
html包含内部的html( 如div)

对象有 方法：
 action_chains', 'check', 'checked', 'click', 'double_click', 'drag_and_drop', 'fill', 'find_by_css', 'find_by_id', 'find_by_name', 'find_by_tag', 'find_by_value', 'find_by_xpath', 'has_class', 'html', 'mouse_out', 'mouse_over', 'mouseout', 'mouseover', 'outer_html', 'parent', 'right_click', 'select', 'selected', 'tag_name', 'text', 'type', 'uncheck', 'value', 'visible']

但是好像没有查找属性的方法


Cookie:
  如果是服务器产生的cookie,会继续存在，（因为是通过浏览器访问的）
还可以自己增加cookie ,删除cookie
browser.cookies.add({'whatever': 'and ever'})
browser.cookies.delete('mwahahahaha') #deletes the cookie 'mwahahahaha'
browser.cookies.delete('whatever', 'wherever') #deletes two cookies
browser.cookies.delete() #deletes all cookies


存在的疑问：
  1, 如何获得对象的   属性！
     print browser.find_by_css("input[type=image]").first['src']
太简单了。。
在mail list中出现， 
估计老外通过 mail list 和irc获取了很多知识，怪不得文档中没见到的很多用法，别人都知道

   2, 如何检查 假如页面加载， js错误
在页面最后，放置一个 function success_flag() ，
当页面有错误，这个函数就不存在了， typeof(success_flag) === 'undefined'

3, 执行页面中存在的js ?

1, 直接执行页面中的js
2, 需要手动载入js，然后执行

c = open('script.js').read()
browser.execute_script('"c(5, 2)") results in 

4,  iframe中的 js,对象等
frame=browser.get_iframe("testiframe")  // testiframe是 frame的name
但是目前frame只有 gen 方法，其它都没有

      </p>

  