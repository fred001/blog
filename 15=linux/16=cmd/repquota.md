
  # repquota

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:08:11 


      None


      <p>
      repquota

历史：
2015年10月07日
建立




repquota :针对文件系统的限额做报表 
[root@www ~]# repquota -a [-vugs] 
选顷不参数: 
-a :直接到 /etc/mtab 搜寻具有 quota 标志的 filesystem ,幵报告 quota 的 
结果; 
-v :输出的数据将吨有 filesystem 相关的绅部信息; 
-u :显示出用户的 quota 限值 (这是默讣值); 
-g :显示出个别群组的 quota 限值。 
-s :使用 M, G 为单位显示结果 
# 查询本案例中所有使用者的 quota 限制情况: 
[root@www ~]# repquota -auvs 
      </p>

  