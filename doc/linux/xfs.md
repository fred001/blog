# xfs 文件系统


#### 创建xfs 分区

一个xfs分区，至少需要20M，否则无法创建
mkfs -t xfs /dev/sda10

#### 挂载之
mount -t xfs /dev/sda10 /mnt/tmp

## xfs_info
xfs_info: 查询文件系统详细信息
xfs_info /mnt/tmp



#### xfs 备份 (额外命令 xfsdump)

###### 备份分区
只会备份实际容量

-L  备份的session标头， 必须填写（不知道什么用)
-M  存储媒体的标头， 必须填写， 不知道什么用
-f  备份到的路径
最后是备份的分区

最后的路径不能是 /dev/sdb1 这样， 也许会有问题,没有测试过，最好是挂载后的文件路径
最后路径不能有 /

xfsdump -l 0 -L sdb1 -M sdb1  -f /root/backup/sdb1.dump /mnt/tmp


######  查看备份信息

xfsdump -I


#######  增量备份 

增量备份要备份到其它文件，不能在原文件基础上增加
增量备份前提是有个  -l 0 存在 ,大约备份了会记录在文件系统中

-l 最多只能是 9 (0-9) 也就是说只有最多10个备份 ?

xfsdump -l 1 -L sdb1 -M sdb1  -f /root/backup/sdb1.dump2 /mnt/tmp


######  恢复备份

xfsrestore -f sdb1.dump  /mnt/tmp
xfsrestore -f sdb1.dump2  /mnt/tmp

#### xfs_growfs: 调整一个 xfs 文件系统大小（只能扩展）

#### xfs_repair: 尝试修复受损的 xfs 文件系统

目标分区必须没有挂载


####  xfs_db
xfs_db: 调试或检测 xfs 文件系统（查看文件系统碎片等）
必须保证文件系统没有挂载，然后对设备进行操作，而不是挂载的目录




#### 其它
xfs相关常用命令
xfs_admin: 调整 xfs 文件系统的各种参数
xfs_copy: 拷贝 xfs 文件系统的内容到一个或多个目标系统（并行方式）
xfs_bmap: 查看一个文件的块映射
xfs_fsr: 碎片整理
xfs_quota: 管理 xfs 文件系统的磁盘配额
xfs_metadump: 将 xfs 文件系统的元数据 (metadata) 拷贝到一个文件中
xfs_mdrestore: 从一个文件中将元数据 (metadata) 恢复到 xfs 文件系统
xfs_freeze    暂停（-f）和恢复（-u）xfs 文件系统
xfs_logprint: 打印xfs文件系统的日志
xfs_mkfile: 创建xfs文件系统
xfs_ncheck: generate pathnames from i-numbers for XFS
xfs_rtcp: XFS实时拷贝命令
xfs_io: 调试xfs I/O路径


#### xfs_repair 修复
xfs_repair /dev/sdb1 



#### xfs_freeze    暂停（-f）和恢复（-u）xfs 文件系统


##### xfs_growfs: 调整一个 xfs 文件系统大小（只能扩展）
实际过程中，没有实验成功， 无法增加容量。即使有未分配的空闲容量
