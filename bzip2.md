
  # bzip2

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:55:24 


      None


      <p>
      bzip2

历史：
2015年10月05日
建立




针对单个文件进行压缩和解压

bzip2 [-cdkzv#] 檔名 
[root@www ~]# bzcat 檔名.bz2 
选顷不参数: 
-c :将压缩癿过程产生癿数据输出到屏幕上! 
-d :解压缩癿参数 
-k :保留源文件,而丌会删除原始癿档案喔! 
-z :压缩癿参数 
-v :可以显示出原档案/压缩文件案癿压缩比等信息; 
-# :不 gzip 同样癿,都是在计算压缩比癿参数, -9 最佳, -1 最忚! 

#压缩文件， 自动删除FILE 并产生新的文件FILE.gz
bzip2  FILE 
#指定压缩级别为 9
bzip2 -9 -c FILE > FILE.gz

#解压文件
bzcat FILE.gz  > FILE  #不会删除 FILE.gz
bzip2 -d  FILE.gz   #会自动删除 FILE.gz

      </p>

  