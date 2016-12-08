
  # centos7  mate 命令行配置系统

      version:  5
      created_at:  2016-08-12
      updated_at:  2016-08-25 12:34:00

      None

      None


      <p>
      命令用 dconf 而不是 gsettings
修改后直接生效： 会保存用户配置到  .config/dconf/user

配置格式大约类似 ini, 格式类似是  /aaa/bb/ccc/ddd 

查询值

#  / 是键名 ，不是目录 ， 
#  -B 10  显示前面10行，因为dump结果仅仅显示部分键名， 键名前面的部分在上面行
dconf dump / | grep VALUE -B 10


读取值：
dconf read /org/mate/desktop/background/picture-filename

列出路径下的值
#必须以 / 结尾
dconf list  /org/mate/desktop/background/

修改值：
#值需要加上单引号， 不知道为什么
dconf write /org/mate/desktop/background/picture-filename  "'/home/frd/图片/s.jpg'"


dconf load / < FILE  可以恢复配置
但是注意，其中有些值是不能修改的，所以
dconf dump / > file 生成的全部配置是不能直接恢复的
      </p>

  