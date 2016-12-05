
  # rsync

      version:  2
      created_at:  2016-03-15
      updated_at:  2016-06-01 10:14:31

      created at 2016-03-15 12:36:45 
update at 2016-06-01 10:14:31


      None


      <p>
      1, 同步目录,并删除 B 目录中， A目录不存在的文件



rsync -tr --delete  download/ download2  
-v 详细信息

#把download下的文件，同步到 download2下面
#download/ , "/" 意思是下面的文件，否则是 download2/download
# -t  保证 modify time
#  -r  递归
# --delete   删除不存在于A目录的文件



1, 同步目录,并删除 B 目录中， A目录不存在的文件

rsync -trpog --delete download/ download2 
rsync -azv --delete download/ download2 

为了保持权限， 远程接收的用户，似乎需要有能力修改文件的组和用户
估计是首先上传文件内容，然后才来修改文件属性，如果没有权限，文件的用户和组就成了接受用户的了
目前只能发送给root才行

-v 详细信息

#把download下的文件，同步到 download2下面
#download/ , "/" 意思是下面的文件，否则是 download2/download
# -t 保证 modify time
# -r 递归
# --delete 删除不存在于A目录的文件

2 利用 rsync -a 让同步时保留时间标记

rsync 选项 -a 称为归档模式，执行以下操作

递归模式
保留符号链接
保留权限
保留时间标记
保留用户名及组名


排除某目录

--exclude ".git" (相对路径）

还可以制定文件中的目录列表来排除


--update  (-u) 
  不覆盖文件，假如接受端的文件更 新
      </p>

  