# linux 键位修改

xmodmap


命令行方式：

xmodmap -e 'keycode 18 = parenleft 9'   #设置上面键盘没有shift 是 ( ,有则是 9,相当于替换 让上下替换位置
xmodmap -e 'keycode 19 = parenright 0'
xmodmap -e 'keycode 13 = dollar 4'
xmodmap -e 'keycode 20 = underscore minus'


配置文件方式:
  .keymaprc

  keycode 18 = parenleft 9
  keycode 19 = parenright 0
  keycode 13 = dollar 4
  keycode 20 = underscore minus


  xmodmap .keymaprc
