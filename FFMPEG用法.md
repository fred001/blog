
  # FFMPEG用法

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:26:23 


      None


      <p>
      FFMPEG用法
  ffmpeg 是一个处理视频的工具，非常强大。


常用选项：
	-i  INPUT_VIDEO  指定输入文件
	-y   覆盖已存在的文件
	-f image2   使用图片格式，截图图片时候需要， image2 看起来有点奇怪
	-vframes NUM   指定帧数
	-ss  SECOND  指定秒数
	-ss  TIME     指定时间， 格式需要  00:00:00, 不能少了，例如 00:00 是错误的
	 -loglevel 	  控制输出， 默认会输出所有， 但是输出都属于 stderr  ，而不是 stdout
		quiet    #所有都不显示
        	panic
         	fatal	#只会严重的错误才会输出，比如转换不成功
          	error    #输出错误
          	 warning  #输出警告
          	 info   #输出信息，默认的那些都是信息
           	verbose
           	debug

剪切音频
  ffmpeg -ss 00:00:10 -t 00:01:22 -i 五月天-突然好想你.mp3  output.mp3 
    只要 从第10秒开始截取，共截取1：22时长的内容

单独提取音频：
	ffmpeg -i 01.flv -f mp3 -vn 01.mp3
	
截取一段视频：
	// -ss  指定开始秒数
	//-t 指定截取时间长度
	ffmpeg -ss  00:01:10  -i 1.flv  -acodec copy -vcodec copy -t 00:01:00  2.flv  
	 
视频格式转换：
	ffmpeg  -i  INPUT_VIDEO  -y   OUTPUT_VIDEO 
	
截取其中的一帧图片
	 ffmpeg -i 10.flv -vframes 1 -ss 100 -f image2 test.jpg 
 	 ffmpeg -i 10.flv -vframes 1 -ss 00:21:00  -f image2 test.jpg 
 	 
截取多帧图片
	 ffmpeg -i 10.flv -vframes 30  -ss 100 -f image2  test%3d.png

从视频生成gif (因为会损坏画质，效果很差，所以只能和convert配合实现）
	1,提取多帧图片
		ffmpeg -loglevel panic -i input.mp4 -ss 0:46 -t 5 -r 8 -s 720x576 /somedir/p%3d.png
	
	2. 用convert合成gif
		convert /somedir/*.png -resize 205x116^ -extent 205x116 -layers Optimize out.gif

		注意-resize 205x116^中的^符号，和-extent配合实现裁切效果。详细的convert参数说明
		
		 ffmpeg -i 9.mp4  -ss 100 -vframes 1 -f  test.jpg 2>2.txt
		 
		 
		 
格式转换 (将file.avi 转换成output.flv)
	 ffmpeg -i  file.avi   output.flv
	 -i 表示输入文件
	 
	 
现在有个视频video.avi，有个音频 audio.mp3，将其合并成output.avi
	两个命令                     （ video2.avi 是中间文件 ，用完可删）

	ffmpeg -i video.avi -vcodec copy -an video2.avi   
	ffmpeg -i video2.avi -i audio.mp3 -vcodec copy -acodec copy output.avi

	 -i 表示输入文件

	  -vcodec copy 表示 force video codec ('copy' to copy stream) 这个不知怎么译 ，估计是直接copy 

	  -acodec copy   这个说的应该是音频了   跟上面一样

	-an : 表示  disable audio  估计是audio no 之类的缩写   表示去掉video.avi 原有的音频

	方法2 好像可以直接指定两个输入文件 ，

	ffmpeg -i /tmp/a.wav -i /tmp/a.avi /tmp/a.avi 两个文件 的顺序很重


从视频里提取声音（声音与视频的分离）
	 ffmpeg  -i 人生若只如初见.flv  -vn r.mp3  从flv 文件 中提取声音并保存为mp3 格式  
	       -vn : 表示忽略视频 估计是video no 之类的缩写
	 ffmpeg  -i 人生若只如初见.flv  -an  r.flv   只留视频不留声音 
	    -an : 表示 忽略 声音 估计是audio no 之类的缩写
	    
	    
压缩mp3 文件
	如果你觉得mp3 文件 有点大，想变小一点那么可以通过-ab 选项改变音频的比特率（bitrate）

	ffmpeg -i input.mp3 -ab 128 output.mp3    //这里将比特率设为128

	你可以用file 命令查看一下源文件 的信息

	z.mp3: Audio file with ID3 version 2.3.0, contains: MPEG ADTS, layer III, v1, 192 kbps, 44.1 kHz, Stereo

	其中的192 kbps 就是这个东西

	mp3中比特率的含义是：在压缩音频文件至mp3时，由压缩软件所确定数码文件在播放时每秒传 送给播放器大小，其单位是：千位/秒；英文的含义是：kbps - = kilobits per second。现在mp3文件的最高数位率是320 kbps。这样的文件体积很大，每分钟的音乐超过两兆字节。如果采用可变比特率（VBR）编码来生成mp3文件，获得与320 kbps相当音质，文件的体积会缩小25~50%。请注意：播放时间相同，而歌曲不同，所获的压缩mp3文件的一般不相同，这是因为VBR编码所生成的 mp3文件的大小不仅仅取决于播放时间的长度，还取决于源音频文件的其它因素。

录音（要有可用的麦克风，并且如果用alsa 的话，好像得安alsa-oss，重启） 

	 ffmpeg  -f oss -i /dev/dsp   out.avi  (should  hava oss or alsa-oss)

	 ffmpeg   -f  alsa -ac 2 -i hw:0, 0  out.avi   (should )

	 ffmpeg   -f alsa -ac 2 -i pulse  (should hava PulseAudio)

	   oss 是linux 下的声音相关的东西，与alsa 一样，不过oss 是商业的， 而/dev/dsp 是oss 用到的麦克的设备吧，可以这样理解


屏幕录像

	ffmpeg -f x11grab -s xga -r 10 -i :0.0+0+0 wheer.avi 

	ffmpeg -f x11grab  -s 320x240  -r 10 -i :0.0+100+200 wheer.avi

	:0:0 表示屏幕（个人理解，因为系统变量$DISPLAY值就是:0.0）  而100,表示距左端100象素，200表示距上端200

	-s 设置窗口大小

	  -r 10 好像是设置频率，不懂

	ffmpeg -f x11grab -s xga    -qscale 5    -r 10 -i :0.0+0+0 wheer.avi 

	-qscale 8 设定画面质量，值 越小越好
	
屏幕录像，同时录音

	ffmpeg -f oss -i /dev/dsp        -f x11grab -r 30 -s 1024x768 -i :0.0  output.mkv

	ffmpeg   -ac 2 -f oss  -i  /dev/dsp   -f x11grab -r 30 -s 1024x768 -i :0.0 -acodec pcm_s16le -vcodec libx264 -vpre lossless_ultrafast -threads 0 output.mkv

	看到这，你会发现这个命令有多强大，

	如果我屏幕上打开了一个窗口，我只想录这个窗口的内容，如何确定这个窗口的坐标位置呢

	可以用另外一个命令

	xwininfo 输入这个命令后，用鼠标点选目标窗口，

	就会出现目标窗口的坐标，宽高等一系列信息

	Absolute upper-left X:  276
	  Absolute upper-left Y:  57
	  Relative upper-left X:  2
	  Relative upper-left Y:  23
	  Width: 742
	  Height: 499
	  Depth: 24
	  Visual: 0x21
	  Visual Class: TrueColor
	  Border width: 0
	  Class: InputOutput
	  Colormap: 0x20 (installed)
	  Bit Gravity State: NorthWestGravity
	  Window Gravity State: NorthWestGravity
	  Backing Store State: NotUseful
	  Save Under State: no
	  Map State: IsViewable
	  Override Redirect State: no
	  Corners:  +276+57  -262+57  -262-244  +276-244
	  -geometry 80x24+274+34 看到这一行了没 (）

	比如根据上面的信息

	ffmpeg -f oss  -i  /dev/dsp      -f  x11grab -r 30  -s 1280x752 -i :0.0+0+23  output.avi 
	Another thing you can change is the video frame rate (FPS). In the example above we used -r 30 which means capture at 30 FPS. You can change this value to whatever frame rate you want.

	这个 -r 30 应该是每秒钟取样几次，估计是一秒截三十次屏，
	
	
切头去尾
	 ffmpeg -ss 00:00:10 -t 00:01:22 -i 五月天-突然好想你.mp3  output.mp3 
	只要 从第10秒开始截取，共截取1：22时长的内容
	
视频文件的连接，如两个flv 文件 连接成一

	好像必须先将文件 转成mpg ，dv 等格式的文件后才能进行连接

	    连接复数的AVI影片档之范例（在此范例中须一度暂时将AVI档转换成MPEG-1档(MPEG-1, MPEG-2 PS, DV格式亦可连接)）

	ffmpeg -i input1.avi -sameq inputfile_01.mpg -r 20
	ffmpeg -i input2.avi -sameq inputfile_02.mpg -r 20
	cat inputfile_01.mpg inputfile_02.mpg > inputfile_all.mpg
	ffmpeg -i inputfile_all.mpg -sameq outputfile.avi 上面将 input1.avi input2.avi 合并成outputfile.avi -sameq 表示 相同的质量（可能指的是画面，不太清楚）
	-r 指频率 



参数

FFmpeg可使用众多参数，参数内容会根据ffmpeg版本而有差异，使用前建议先参考参数及编解码器的叙述。此外，参数明细可用 ffmpeg -h 显示；编解码器名称等明细可用 ffmpeg -formats 显示。

下列为较常使用的参数。
[编辑 ] 主要参数

    -i 设定输入档名。
    -f 设定输出格式。
    -y 若输出档案已存在时则覆盖档案。
    -fs 超过指定的档案大小时则结束转换。
    -ss 从指定时间开始转换。
    -title 设定标题。
    -timestamp 设定时间戳。
    -vsync 增减Frame使影音同步。

[编辑 ] 影像参数

    -b 设定影像流量，默认为200Kbit/秒。（ 单位请参照下方注意事项 ）
    -r 设定FrameRate值，默认为25。
    -s 设定画面的宽与高。
    -aspect 设定画面的比例。
    -vn 不处理影像，于仅针对声音做处理时使用。
    -vcodec 设定影像影像编解码器，未设定时则使用与输入档案相同之编解码器。

[编辑 ] 声音参数

    -ab 设定每Channel （最近的SVN 版为所有Channel的总合）的流量。（ 单位 请参照下方注意事项 ）
    -ar 设定采样率。
    -ac 设定声音的Channel数。
    -acodec 设定声音编解码器，未设定时与影像相同，使用与输入档案相同之编解码器。
    -an 不处理声音，于仅针对影像做处理时使用。
    -vol 设定音量大小，256为标准音量。(要设定成两倍音量时则输入512，依此类推。)

[编辑 ] 注意事项

    以-b及ab参数设定流量时，根据使用的ffmpeg版本，须注意单位会有kbits/sec与bits/sec的不同。（可用ffmpeg -h显示说明来确认单位。）

    例如，单位为bits/sec的情况时，欲指定流量64kbps时需输入‘ -ab 64k ’；单位为kbits/sec的情况时则需输入‘ -ab 64 ’。

    以-acodec及-vcodec所指定的编解码器名称，会根据使用的ffmpeg版本而有所不同。例如使用AAC编解码器时，会有输入aac与 libfaac的情况。此外，编解码器有分为仅供解码时使用与仅供编码时使用，因此一定要利用ffmpeg -formats 确 认输入的编解码器是否能运作。

[编辑 ] 范例

    将MPEG-1影片转换成MPEG-4格式之范例

ffmpeg -i inputfile.mpg -f mp4 -acodec libfaac -vcodec mpeg4 -b 256k -ab 64k outputfile.mp4

    将MP3声音转换成MPEG-4格式之范例

ffmpeg -i inputfile.mp3 -f mp4 -acodec libaac -vn -ab 64k outputfile.mp4

    将DVD的VOB档转换成VideoCD格式的MPEG-1档之范例

ffmpeg -i inputfile.vob -f mpeg -acodec mp2 -vcodec mpeg1video -s 352x240 -b 1152k -ab 128k outputfile.mpg

    将AVI影片转换成H.264格式的M4V档之范例
    ffmpeg -i inputfile.avi -f mp4　-acodec libfaac -vcodec libx264 -b 512k -ab 320k outputfile.m4v

    将任何影片转换成东芝REGZA可辨识的MPEG2格式之范例
    ffmpeg -i inputfile -target ntsc-svcd -ab 128k -aspect 4:3 -s 720x480 outputfile.mpg

    连接复数的AVI影片档之范例（在此范例中须一度暂时将AVI档转换成MPEG-1档(MPEG-1, MPEG-2 PS

DV格式亦可连接)、
ffmpeg -i input1.avi -sameq inputfile_01.mpg
ffmpeg -i input2.avi -sameq inputfile_02.mpg
cat inputfile_01.mpg inputfile_02.mpg > inputfile_all.mpg
ffmpeg -i inputfile_all.mpg -sameq outputfile.avi
=============================================================================
http://ffmpeg.org/ffmpeg-doc.html 
http://ubuntuforums.org/showthread.php?t=1392026 
同时搞明白的一些问题
在alsa 体系中声卡（也可能是麦克风，）叫hw:0,0 而在oss 体系中叫/dev/dsp (用词可能不太专业)  Linux在安装了声卡后，会有一些设备文件生

成。 

  采集数字样本的 
/dev/dsp文件，针对混音器的 
/dev/mixer文件，用于音序器的 
/dev/sequencer， 
/dev/audio文件一个 



基于兼容性考虑的声音设备文件。只要向 
/dev/audio中输入 
wav文件就能发出声音。而对 
/dev/dsp文件读取就能得到 
WAV文件格式的声音文 
件。 

      </p>

  