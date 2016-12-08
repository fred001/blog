
  # tar

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:10:58 


      None


      <p>
      tar

历史：
2015年10月05日
建立




tar:文件归档
tar [主选项+辅选项] 文件或目录
主要选项
-c #创建档案文件
-t #列出档案内容
-x #从档案文件中提取文件
-r #追加文件到档案
-u #只添加比档案中更新的文件

辅助选项
-f #指定档案文件名称 建议 -f 单独写一个选顷啰! 
-v #显示详细信息
-z #用gzip压缩/解压
-j #用bzip压缩，解压
-C 目录  #指定解压到的目录，不指定在当前目录

核心是 c , t ,x 三个 动作，其它是辅助，都是固定的

tar -cvf etc.tar /etc 
tar -cvfz etc.tar.gz /etc
tar -cjvf etc.tar.bzip2 /etc
tar -tvf etc.tar #查看档案内容
tar -xzvf etc.tar.gz
tar -xjvf etc.tar.bzip2


压 缩:tar -cjv -f filename.tar.bz2 要被压缩癿档案戒目录名称 
查 询:tar -tjv -f filename.tar.bz2 
解压缩:tar -xjv -f filename.tar.bz2 -C 欲解压缩癿目录
解压单独某个文件： tar -jxv -f /root/etc.tar.bz2 etc/shadow
#仅备份比某个时间更新的文件（备份某个时间点后改动的文件）
tar -jcv -f /root/etc.newer.then.passwd.tar.bz2 \ 
> --newer-mtime="2008/09/29" /etc/*

#排除某些目录
tar -jcv -f /root/system.tar.bz2 --exclude=/root/etc* \ 
> --exclude=/root/system.tar.bz2 /etc /root
      </p>

  