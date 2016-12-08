
  # quota

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 12:34:57 


      None


      <p>
      [root@www ~]# quota [-uvs] [username] 
[root@www ~]# quota [-gvs] [groupname] 
选顷不参数: 
-u :后面可以接 username ,表示显示出该用户的 quota 限制值。若丌接 
username 
,表示显示出执行者的 quota 限制值。 
-g :后面可接 groupname ,表示显示出该群组的 quota 限制值。 
-v :显示每个用户在 filesystem 的 quota 值; 
-s :使用 1024 为倍数杢挃定单位,会显示如 M 乊类的单位! 
# 直接使用 quota 去显示出 myquota1 不 myquota2 的限额[root@www ~]# quota -uvs myquota1 myquota2
      </p>

  