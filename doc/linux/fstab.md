fstab 文件组成

让我们对fstab的用法进行一个详细的了解。/etc/fstab由下面的 fields 组成 (fields之间以空格或tab分开):

<file system> <dir> <type> <options> <dump> <pass> 

    <file systems> - 存储设备的标识 (i.e. /dev/sda1). 

    <dir> - 告诉 mount 命令应该将文件设备挂载到哪里。 

    <type> - 定义了要挂载的设备或是分区的文件系统类型，支持许多种不同的文件系统，如 ext2, ext3, reiserfs, xfs, jfs, smbfs, iso9660, vfat, ntfs, swap 以及 auto。 'auto' 类型使 mount 命令对这文件系统类型进行猜测，这对于如 CDROM 和 DVD 之类的可移动设备是非常有用的。

    <options> - 定义了不同文件系统的特殊参数，不同文件系统的参数不尽相同。其中一些比较通用的参数有以下这些： 

        auto - 文件系统将在启动时，或被键入了 'mount -a' 的命令时自动被挂载。
        noauto - 文件系统只在你的命令下被挂载。
        exec - 允许执行此分区的二进制文件（默认值）。
        noexec - 不允许此文件系统上的二进制文件被执行。
        ro - 以只读模式挂载文件系统。
        rw - 以读写模式挂载文件系统。
        sync - I/O 同步进行。
        async - I/O 异步进行。
        flush - 指定 FAT 格式更加频繁地刷新数据，使得如复制对话框或是进度条持续到文件被写入到磁盘中。
        user - 允许任意用户来挂载这一设备（同时有 noexec, nosuid, nodev 参数的属性）。
        nouser - 只能被 root 挂载（默认值）。
        defaults - 默认的挂载设置（即 rw, suid, dev, exec, auto, nouser, async）。
        suid - 允许 suid 操作和设定 sgid 位。这一参数通常用于一些特殊任务，使一般用户运行程序时临时提升权限。
        nosuid - 禁止 suid 操作和 sgid 位。
        noatime - 不要更新文件系统上 inode access 记录，可以提升性能(参见 atime_options)。
        nodiratime - 不要更新文件系统上 directory access inode 的记录，可以提升性能(参见 atime_options)。
        relatime - 实时更新 inode access 记录。只有在记录中的访问时间早于当前访问才会被更新。（与 noatime 相似，但不会打断如 mutt 或其它程序探测文件在上次访问后是否被修改的进程。），可以提升性能(参见atime_options)。 

    <dump> dump utility 用来决定何时作备份. 安装之后 ( ArchLinux 默认未安装 ), dump 会检查其内容，并用数字来决定是否对这个文件系统进行备份。 允许的数字是 0 和 1 。0 表示忽略， 1 则进行备份。大部分的用户是没有安装 dump 的 ，对他们而言 <dump> 应设为 0。

    <pass> fsck 读取 <pass> 的数值来决定需要检查的文件系统的检查顺序。允许的数字是0, 1, 和2。 根目录应当获得最高的优先权 1, 其它所有需要被检查的设备设置为 2. 0 表示设备不会被 fsck 所检查
