
  # createElement

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:00:43 


      None


      <p>
      CREATEELEMENT
 百度首页 | 百度空间  | 登录
辛尼
 
主页博客相册|个人档案 |好友
  	
查看文章
		 
使用createElement动态创建HTML对象
2008年07月09日 星期三 09:29

1.创建链接

<script language="javascript">
var o = document.body;
//创建链接
function createA(url,text)
{
    var a = document.createElement("a");
    a.href = url;
    a.innerHTML = text;
    a.style.color = "red";
    o.appendChild(a);
}
createA("http://www.webjx.com/","网页教学网");
</script>

2.创建DIV

<script language="javascript">
var o = document.body;
//创建DIV
function createDIV(text)
{
    var div = document.createElement("div");
    div.innerHTML = text;
    o.appendChild(div);
}
createDIV("网页教学网：http://www.webjx.com/");
Webjx.Com

</script>

3.创建表单项

<script language="javascript">
var o = document.body;
//创建表单项
function createInput(sType,sValue)
{
    var input = document.createElement("input");
    input.type = sType;
    input.value = sValue;
    o.appendChild(input);
}
createInput("button","ooo");
</script>

4.创建表格


<script language="javascript">
var o = document.body;
//创建表格
function createTable(w,h,r,c)
{
    var table = document.createElement("table");
    var tbody = document.createElement("tbody");
    table.width = w;
    table.height = h;
    table.border = 1;
    for(var i=1;i<=r;i++)
    {
        var tr = document.createElement("tr");
        for(var j=1;j<=c;j++)
        {
            var td = document.createElement("td");
            td.innerHTML = i + "" + j;
            //td.appendChild(document.createTextNode(i + "" + j));
            td.style.color = "#FF0000";
            tr.appendChild(td);
        }
        tbody.appendChild(tr);
    }
    table.appendChild(tbody);
    o.appendChild(table);
}
createTable(270,270,9,9);
</script>

注意：一定要有tbody，否则IE下不能创建表格，FF下可以！

类别：软件编程 | 添加到搜藏 | 浏览(38) | 评论 (0)
 
上一篇：C#在DataGridView的RowHeader显...    
 
相关文章：
?	动态生成Html元素实现Post操作(c...　　　　　　　　　	 	 
 
最近读者：
	登录后，您就出现在这里。		
 	 	jlfujun	
 
网友评论：
发表评论：
姓　名： 	   注册 | 登录
*姓名最长为50字节
  	
网址或邮箱： 	(选填)
  	
内　容： 	
  	
验证码： 	
看不清?
  	

  	  	 

?2008 Baidu

      </p>

  