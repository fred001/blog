
  # selinux

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:50:54 


      None


      <p>
      selinux

历史：
2015年10月06日
建立




	selinux是提升系统安全的一个重要核心模块。
配置文件：
	/etc/selinux/config

相关命令
	sestatus   当前状态查询
	getenforce
	setenforce    0 | 1  (0宽容模式， 1，严格模式）
	
	查询文件或目录的selinux权限
	ls -Z  FILE| DIR

	出现的三个字段分别是： 
Identify:role:type 
身份识别:觇色:类型

      chcon  : 用来修改此三个字段的值
	restorecon:  恢复三个字段默认的值

	semanage  ：查询，修改 目录的默认值
	
	
      </p>

  