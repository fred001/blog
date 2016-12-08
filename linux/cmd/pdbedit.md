
  # pdbedit

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:06:26 


      None


      <p>
      pdbedit

历史：
2015年10月05日
建立





选项与参数: 
-L :列出目前在数据库当中的账号与 UID 等相关信息; 
-v :需要搭配 -L 来执行,可列出更多的讯息,包括家目录等数据; 
-w :需要搭配 -L 来执行,使用旧版的 smbpasswd 格式来显示数据; 
-a :新增一个可使用 Samba 的账号,后面的账号需要在 /etc/passwd 内存 
在者; 
-r :修改一个账号的相关信息,需搭配很多特殊参数,请 man pdbedit; 
-x :删除一个可使用 Samba 的账号,可先用 -L 找到账号后再删除; 
-m :后面接的是机器的代码 (machine account),与 domain model 有关!

 #增加一个用户 smb1
 pdbedit -a -u smb1

#修改用户密码
smbpasswd smb1
      </p>

  