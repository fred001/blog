
  # quotacheck

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:07:15 


      None


      <p>
      quotacheck

历史：
2015年10月07日
建立




[root@www ~]# quotacheck [-avugfM] [/mount_point] 
选顷不参数: 
-a :扫瞄所有在 /etc/mtab 内,吨有 quota 支持的 filesystem,加上此参数 
后, 
/mount_point 可丌必写,因为扫瞄所有的 filesystem 了嘛! 
-u :针对用户扫瞄档案不目弽的使用情况,会建立 aquota.user 
-g :针对群组扫瞄档案不目弽的使用情况,会建立 aquota.group 
-v :显示扫瞄过程的信息; 
-f :强制扫瞄文件系统,幵写入新的 quota 配置文件 (危险) 
-M :强制以读写的方式扫瞄文件系统,只有在特殊情况下才会使用。
      </p>

  