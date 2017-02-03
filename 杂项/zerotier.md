# zerotier.com 
全球虚拟网络


https://www.zerotier.com/#try_zerotier

安装后获得虚拟IP， 可以在外网访问


centos 安装：
  1. 按照命名安装，会自动安装包和服务  zerotier-one
    2. 使用：windows有图形界面，linux只有命名行
        zerotier-cli 用来进行操作

            zerotier-cli join 8056c2e21c000001 (加入网络)
      zerotier-cli leave 8056... (退出网络）
              
              加入后访问网站： http://earth.zerotier.net/ 可以获得本地虚拟IP信息

                这个虚拟IP可以随便操作，ping ,ssh,通过其它机器。 当然其它机器必须安装zerotier 
