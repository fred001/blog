
  # quotaoff

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 12:35:22 


      None


      <p>
      quotaoff :关闭 quota 的朋务 
[root@www ~]# quotaoff [-a] 
[root@www ~]# quotaoff [-ug] [/mount_point] 
选顷不参数: 
-a :全部的 filesystem 的 quota 都关闭 (根据 /etc/mtab) 
-u :仅针对后面接的那个 /mount_point 关闭 user quota-g :仅针对后面接的那个 /mount_point 关闭 group quota
      </p>

  