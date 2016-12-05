
  # python - re

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:30:35 
update at 2016-01-02 10:30:42


      None


      <p>
      
  name_pattern="您好，<font color=\"#336600\">(.*)</font><br>"
  reg=re.compile(name_pattern)
match=reg.search(content)
  if match:
print match.groups()  #返回匹配的列表 ,(18339,)
  print match.group(1)  #返回第一个匹配  18339

      </p>

  