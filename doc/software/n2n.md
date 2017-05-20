# n2n

类似 zerotier ，可以建立私人网络。并支持内网穿洞。
比zerotier 更好，因为可以自己建立中心节点，速度更快。


### 基本信息
  https://github.com/ntop/n2n (源和安装说明)

  https://linux.cn/article-4469-1.html (安装参考)
  https://www.phpbulo.com/archives/655.html (安装参考)



  centos7 默认没有 tunctl 命令，需要额外安装 nux-misc ,但是这个源变动频繁，可能不存在。 
  https://centos.pkgs.org/download/7/nux-misc-x86_64/tunctl-1.5-12.el7.nux.x86_64.rpm.html


### 基本概念

  节点分成两个类型， 超级节点和边缘。 超级节点就是中心服务器，负责保持边缘节点的。当建立连接之后，边缘节点独立沟通。
  边缘节点加入到中心节点，组成子网，就可以互相联系了。
  

### 安装
  安装git源上的说明

  1. 创建 tun0
  2. 进入源代码  make & makeinstall
  3. supernode -l 5000  (中心节点启动，监听）


      边缘节点接入连接，并指定本机的ip
      超级节点要是希望其它节点来连接， 也可以再执行这样的命令， 让自己也成为一个边缘节点(同时是中心节点和边缘节点)
  4. edge -d n2n1 -a 10.0.0.10 -c mynetwork -u 1000 -g 1000 -k password -l 1.1.1.1:5000 -m ae:e0:4f:e7:47:5b  (可以不用指定网址）
  4. edge -d n2n1 -a 10.0.0.10 -c mynetwork -u 1000 -g 1000 -k password -l 1.1.1.1:5000 
  5. ifconfig n2n0 查看本机的ip是否建立。 使用ping 来测试


  edge -d un2 -c mynetwork -k encryptme -u 99 -g 99 -a 192.168.4.250 -l iamlosing.me:9500

## 故障排除
  实践中遇到内网机器可以ping, 但是不能ssh 登陆到另一台机器。
  最终通过设置中心服务器的 mtu 1400, 目标机器的mtu 1500 , 内网机器的mtu 1200来解决。 默认内网的mtu 是1400， 但是存在一个路由器， mtu不到1400， 可能问题是这个.

  估计是n2n本身的协议原因,怎么才能深入找到此原因？

