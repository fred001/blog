
  # gzip

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:59:35 


      None


      <p>
      gzip

历史：
2015年10月05日
建立




gzip 是针对单个文件进行压缩的命令.

gzip 
选顷不参数: 
-c :将压缩癿数据输出到屏幕上,可透过数据流重导向杢处理; 
-d :解压缩癿参数; 
-t :可以用杢检验一个压缩文件癿一致性~看看档案有无错诨; 
-v :可以显示出原档案/压缩文件案癿压缩比等信息; 
-# :压缩等级,-1 最忚,但是压缩比最差、-9 最慢,但是压缩比最好!预讴是 
-6 


#压缩文件， 自动删除FILE 并产生新的文件FILE.gz
gzip  FILE 
#指定压缩级别为 9
gzip -9 -c FILE > FILE.gz

#解压文件
zcat FILE.gz  > FILE  #不会删除 FILE.gz
gzip -d  FILE.gz   #会自动删除 FILE.gz


      </p>

  