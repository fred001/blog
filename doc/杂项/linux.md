
  # linux

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:16:45 


      None


      <p>
      LINUX
linux  监控

综合： hop

IO :  iotop , iostat
MEMORY:  free
NETWORK:  iftop, iptraf

网络传输测试:  iperf
磁盘性能测试:  hdparm

web载入测试工具:  siege,tsung

加密备份:  duplicity & rsyncrypto
帐号管理 : ledger
任务管理: taskwarrior

网络请求: curl

文件内容查找: grep ,ack
BT下载: rtorrent & aria2



网络浏览：推荐使用 Elinks，Elinks 对于框架、表格以及鼠标的支持都很不错。当然，你也可以将 Lynx、Links、w3m 作为备选。
邮件收发：Mutt + Fetchmail + msmtp 是很好的组合。其中，Mutt 用于邮件的管理，Fetchmail 用来收取邮件，而 msmtp 则用来发送邮件。
联络聊天：CenterICQ 支持 MSN、Jabber、IRC、Yahoo!、AIM、ICQ 等多种即时通讯协议。它同时也具有一个 UTF-8 版本。其他的工具包括 Freetalk（Gtalk 用户适用）、Naim（支持 AIM、ICQ、IRC 等）、Irssi（IRC 用户适用） 等。
新闻阅读：现在通过 RSS 及时获取信息是一种比较流行的方式。你可以使用 Raggle 来满足每天阅读新闻的需求。Raggle 使用 Ruby 所写，它支持各种版本的 RSS、能够导入/导出 OPML、可定制绑定的快捷键。遗憾的是，Raggle 目前不支持中文。Snownews 虽然功能要弱点，但是对于中文支持很好。
文件管理：Midnight Commander（简称 mc）是一个值得使用的文件管理工具。
查看图片：你可以试试 zgv，我也在使用 feh。
听歌观影：如果你需要听歌，MOC 绝对值得一用。另外，你也可以试试 cplay。看电影的话，当然是 MPlayer 了。
文本编辑：既然已经有了 VIM、Emacs，那么我们还奢求什么呢？
下载上传：主力下载工具使用 wget，要加速可以使用 axel。至于上传 ftp，lftp、nftp 都是不错的选择。此外，对付 BitTorrent 的话，则可以使用 rTorrent。
窗口管理：Twin，我没有用过，不晓得怎样，有兴趣者可自行从其主页了解详情。我现在使用 Screen，并已经习惯了开机便进入 Screen 的生活。

ipmitool
 如果单纯把NGINX配置成负载均衡器来用性能上远远比不上Haproxy。建议看一下haproxy的官方测试文档。
就用lm_sensors 监控一下cpu主板温度啥的。用的rootkit吧


Lmbench-Linux性能测试工具

基准测试 ：
Phoronix Test Suite

phoronix.com 是业内一个知名的网站，其经常发布硬件性能测评以及 Linux 系统相关的性能测评， Phoronix Test Suite 为该网站旗下的 linux 平台测试套件 , Phoronix 测试套件遵循GNU GPLv3协议。Phoronix Test Suite 默认是通过命令行来的进行测试的，但也可以

IOzone

iozone 是一款Linux文件系统性能测试工具 。它可以测Reiser4, ext3, ext4

Netperf

Netperf是一种网络性能的测量工具，主要针对基于TCP 或UDP的传输。Netperf根据应用的不同，可以进行不同模式的网络性能测试，即批量数据传输（bulk data transfer）模式和请求/应答（request/reponse）模式。Netperf测试结果所反映的是两个系统之间发送和接受数据的速度和效 率。

Netperf工具是基于C／S模式的。server端是netserver，用来侦听来自client端的连接，client 端是netperf，用来向server发起网络测试。在client与server之间，首先建立一个控制连接，传递有关测试配置的信息，以及测试的结 果；在控制连接建立并传递了测试配置信息以后，client与server之间会再建立一个测试连接，用来来回传递着特殊的流量模式，以测试网络的性能。

LLCbench

LLCbench (底层表征基准测试 Low-Level Characterization Benchmarks) 是一个基准测试工具，集成了 MPBench, CacheBench, 和 BLASBench 测试方法。


HardInfo

HardInfo是一个Linux系统信息查看软件。它可以显示有关的硬件，软件，并进行简单的性能基准测试


　如果哪天你忘记监控系统资源使用情况了，心中极其苦恼。怎么办？别急，liunx已经为你记录sa日志啦。进入sa目录去淘宝吧！命令为 cd /var/log/sa ，在这里你会发现许多惊人的奥秘……美中不足之处，在于这里的采样时间间隔太长，为10分钟一次，对于细节问题而言，这些日志的用处没有想象中的那么好。
　
　一：对于Linux 网卡流量查看，iptraf 一个很不错的工具。RHEL5 iso自带有，我的系统默认没有安装。 他可以按照用户的需要，按照不同的协议统计，也可以按照不同的端口统计，还可以按照不同的网卡统计，总之，是一个很强大的工具。 在命令行直接输入：iptraf，进入一个文本图形界面，如下：
　
　2、Linux流量监控软件bwm （支持64位系统）
Bandwidth Monitor NG (简称为 Bwm-NG)是一个简单的网络和磁盘带宽监视程序，可在Linux、BSD、Solaris等平台上运行。它支持各种各样的检测元件，用于收集各种统计数据，包括/proc/net/dev、netstat、getifaddr、sysctl、kstat、 /proc/diskstats /proc/partitions、 IOKit、 devstat 、 libstatgrab等。接口或设备可以黑白方式列示，这样用户就可以只查看感兴趣的数据。Bwm-NG支持多种输出选项，如图形、纯文本、CVS及 HTML等。
查看流量命令：bwm-ng -d （按u键可切换流量单位）


3、Linux流量监控软件MRTG
Mrtg(Multi Router Traffic Grapher,MRTG)是一个监控网络链路流量负载的工具软件，它通过snmp协议从设备得到设备的流量信息，并将流量负载以包含PNG格式的图形的HTML文档方式显示给用户，以非常直观的形式显示流量负载。


 Linux性能测试 mpstat命令

mpstat是MultiProcessor Statistics的缩写，是实时系统监控工具。其报告与CPU的一些统计信息，这些信息存放在/proc/stat文件中。在多CPUs系统里，其不但能查看所有CPU的平均状况信息，而且能够查看特定CPU的信息。
下面只介绍mpstat与CPU相关的参数，mpstat的语法如下：

Usage: mpstat [ options... ] [ <interval> [ <count> ] ]
Options are:
[ -P { <cpu> | ALL } ] [ -V ]




linux 性能测试之基准测试工具
 

system:

lmbench

unixbench5.1.2

ubench

freebench

nbench

ltp

xfbsuite


linux 性能测试之基准测试工具
 

system:

lmbench

unixbench5.1.2

ubench

freebench

nbench

ltp

xfbsuite

http://www.hermit.org/Linux/Benchmarking/

 
High Performance Linpack

geekbench

 

IO:

bonnie++

bonnie

bonnie64

iozone

iometer

dbench

piozone

tiozone

CPU:

nbench

network:

netperf

NetBench

nfsstone

netio

nepim

iperf

NetIQ

Chariot

webbench

 

Mysql

sysbench

mysql super-smack

 

 

program bench

bootchart

contest

httperf

jmeter

pipebench

siege

volanomark

 

 

 

HTTP：

ab

autobench

httperf

httpload

flood

webbench

 

 

http://people.freebsd.org/~fenner/portsurvey/benchmarks.html

 

java:

 

VolanoMark Benchmark
autobench
《性能测试工具curl-loader(linux)
 Linux性能测试 sar命令

sar命令包含在sysstat工具包中，提供系统的众多统计数据。其在不同的系统上命令有些差异

在命令行中，count 和interval 两个参数组合起来定义采样间隔和次数，interval为采样间隔，是必须有的参数，count为采样次数，是可选的，默认值是1，-o file表示将命令结果以二进制格式存放在文件中，file 在此处不是关键字，是文件名。options 为命令行选项，sar命令的选项很多，常用选项如下：
-A：所有报告的总和。
-u：CPU利用率
-v：进程、I节点、文件和锁表状态。
-d：硬盘使用报告。
-r：没有使用的内存页面和硬盘块。
-g：串口I/O的情况。
-b：缓冲区使用情况。
-a：文件读写情况。
-c：系统调用情况。
-R：进程的活动情况。
-y：终端设备活动情况。
-w：系统交换活动。
-n：网络统计

    这几天在做lamp性能调优，对系统性能检测使用top vmstat 发现非常不妨便，在刚开会的时候， @mandahang 介绍了一个软件 dstat，用起来感觉还真不错。

下面则对dstat 做下简单的介绍：



@@ phplibfrd
* namespace 
1, namespace 包括 namespace,use ,as,__NAMESPACE__ 关键词
2， namespace ,use 不能用在函数中
3， namespace 在文件的时候， 第一个必须出现在其它语句开头，其它的就无所谓，会改变下面的命名空间
4, use as 只是定义别名， 不能在函数中使用， 用处似乎不大
5，__NAMESPACE__ 可能可以用来配合 智能载入 类等，尚待验证
6, namespace 只对本文件有效， 在其他文件中的定义，只影响其他文件，即使用 require/include 包含，也不会影响当前环境
7,命名空间遵循变量的命令
8, namespace 可以用来维护多版本系统，如：
namespace Frd\v001
$html=new Frd_Html()...

namespace Frd\v002

$html=new Frd_Html()...

只需要增加这个语句，就可以使用不同版本
可能需要 autoload 判断 __NAMESPACE__


* 其他知识
于无线路由器爱折腾的人，推荐百度搜索“无线论坛”。无线的破解与反破解跟病毒和杀软的关系没啥两样~之前，我为了买到论坛上说的最实在最好的TP-LINK841N V3绝版无线路由器，可是折腾了个够呛~结果徒劳无功~还是乖乖的用普通版的~



* linux 
di: 查看磁盘使用情况

http://linuxtoy.org/archives/inxi.html
inxi: 获得完整的系统信息

ttyload 以彩色图形的形式来显示系统在 1 分钟、5 分钟及 15 分钟的负载情况，看起来颇有意思。 

nload: 监视网络流量及带宽占用

* Uptimed: 记录 Linux 系统的 uptime
http://linuxtoy.org/archives/uptimed.html


* 让你提升命令行效率的 Bash 快捷键 [完整版]
http://linuxtoy.org/archives/bash-shortcuts.html


* Conque: 在 Vim 中运行 Shell

2010-06-23 Toy Posted in Apps, Cli, Vim pluginsRSS

熟悉 GNU Emacs 的朋友想必都知道在其中可以使用内嵌的 Shell，这是非常方便的。虽然我们不能在 Vim 中直接使用 Shell，但是利用 Conque 这款 Vim 插件可以达到同样的目的。事实上，Conque 不仅允许我们在 Vim 的编辑缓冲区运行诸如 Bash 此类的 Shell，而且对于其它的命令行程序同样适用，如 mysql、ipython 等


* bash  vi 终端模式
http://www.starming.com/index.php?action=plugin&v=wave&tpl=union&ac=viewgrouppost&gid=34491&tid=13359

set -o vi

google 后知道是 set -o vi，随便输入一条命令，再按 esc 键，然后可以对命令进行 vi 式的移动，替换等操作……


*
  NetworkManager 命令行版: nmcli

  举例：

  查看当前区域内的无线网络: nmcli dev wifi

  启动网络名为 Fedora 的链接：nmcli con up id Fedora


  systemd 进程管理：systemctl

  举例：

  显示系统所有服务的运行状态：systemctl

  显示 ntpd 服务的详细信息：systemctl status ntpd.service


  * cpulimit 是一个简单而有用的小程序，通过它你可以限制一个进程的 CPU 占用率。如果善加利用，必将成为系统管理员的得力助手。 
  cpulimit 的用法也很简单，如上图所示，通过 -e 选项指定需控制的进程名（或 -p 选项指定 pid），-l 选项指定 CPU 的占用百分比即可。这里，我将 Chrome 的 CPU 占用率限制到 25%。


  * APG：密码生成器
  不加任何参数在终端中执行 apg，将默认生成 6 个随机密码： vodokByp BappOtfo dyocvith9 TeucOfPai RyudEnbo NantEcMa 

  增加密码的难度，可以给 apg 加一些参数：

      m - 指生成密码的最小位数，默认是 8
          M mode - 使用什么模式来生成密码，如密码包含大小写字母、数字、特殊字符等

          例如，假设我们要生成一个 16 位且必须包含大写字母、小写字母、数字及特殊字符的密码，可以执行：

          apg -M SNCL -m 16

          其结果如下： lev}TwookVadtak6 $onOdcedVoacyig8 Cyd6SlogOpchoik- 5Phu:SlujlepShug vig4draynItbycs- cevyet=ojRodreb3

          关于 apg 更详细的用法，可以 man apg。

          建议

          生成密码不妨考虑“84”规则，即密码至少 8 位，外加至少 1 个大写字母、1 个小写字母、1 个数字及 1 个特殊字符


* linux 需要安装的软件
uptime
mutt


* apache 开启status
<location /ccvita-server-status>
SetHandler server-status
Order Deny,Allow
Deny from all
Allow from .example.com
</location>

最后的 allow from   example.com 比较重要
它指 访问者  的 IP或者域名，
改成内网域名，以便只有内网的用户访问
不知道是否可以支持 192.168.1.0/24 之类的写法，没试过
记住： 如果是通过外网域名访问的， 自己的访问地址也会变成外网的地址
因为在外面转了一圈



* apachetop
 类似top 的工具  yum install apachetop

 * php 
  命名空间对 类不会进行判断
  在定义了当前 namespace 时
  引用其它namespace的类必须包含 完全名字， 
  不会主动先在当前的环境，然后到全局的环境判断

 @@ GIF
 一般有张最低的背景
 其他在这之上实现， 通过 增加和 覆盖修改
 有点像 pygame的surface

 @@ffmpeg 剪切
  大概是这样 ffmpeg -ss 00:00:xx -t 50 -i *.mp3 *.mp3  #t 时长（秒） 省略则直到末尾
  大概是这样 ffmpeg -ss 00:00:xx  -i *.mp3 *.mp3

  连接多个mp3
  1, 创建文件 files.txt ,内容
    file '1.mp3'
    file '2.mp3'

  ffmpeg -f concat -i **files.txt** -c copy output.mp3   #次序按照从上到下合并


  ffmpeg还可以从video中提取音频

      </p>

  