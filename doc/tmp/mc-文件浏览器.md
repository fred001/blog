## mc 终端文件浏览器

安装  mc  包即可。
使用： 
    在目标目录执行mc 
    或者执行mc后， alt+c 设定目录。
    
    布局分左右，左边是列表，右边是快速信息，也可以换成其它几个。
    添加文件需要输入内置命令 mcedit  FILENAME. 内置命令还有mcview,mcdiff, 就没有其它了。
    
    可以为每个文件格式设定各自对应的浏览器。

    快捷键不知道怎么设置，要是能和vim一致就不错了。
    
    总体觉得比打开图形界面的文件浏览器快多了。
    
    不能执行原生shell 命令吗，感觉这样不好。 
    
    执行shell 需要先  C-o 让mc 后台运行。 再次 C-o 就切换回来了。
    
    怎么快速搜索当前目录的文件呢 ? alt+s ! 是快速搜索   alt+? (需要同时按shift) 是 搜索
    
    怎么修改快捷键？ man mc ，查看hotkey 这部分。
	网友给了答案。 复制默认的配置文件到个人用户配置文件位置。 然后修改此文件即可。
    man mc (scroll,scroll,scroll)
    
    Redefine hotkey bindings
        Hotkey bindings may be read from external file (keymap-file).  A keymap-
            file is searched on the following algorithm  (to the first one found):
            
                 1) command line option -K <keymap> or --keymap=<keymap>
                      2) Environment variable MC_KEYMAP
                           3) Parameter keymap in section [Midnight-Commander] of config file.
                                4) File ~/.config/mc/mc.keymap
                                     5) File /etc/mc/mc.keymap
                                          6) File /usr/share/mc/mc.keymap
                                          
                                          Bingo!
                                          
                                          cp /etc/mc/mc.keymap ~/.config/mc/
                                          
                                          Now edit the key mappings as you like and save ~/.config/mc/mc.keymap when done
                                          
                                          For more info, read the Keys (man mc) section and the three sections following that.
                                          
                                          $ cat /home/jaroslav/bin/man-sections 
                                          #!/bin/sh
                                          MANPAGER=cat man $@ | grep -E '^^[[1m[A-Z]{3,}'
                                          