# hdparm 硬盘性能测试


hdparm -t  /dev/sda
hdparm -Tt  /dev/sda

其它还可以用dd来测试，不专业

dd if=/dev/zero of=/test.db  count=100000

