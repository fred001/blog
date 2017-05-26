# python - termcolor

version:  1
created_at:  2016-01-02


ANSII Color formatting for output in terminal.

终端输出带颜色格式的文字

网站：https://pypi.python.org/pypi/termcolor/0.1.1
本地代码  resourcesource/python/termcolor-0.1.1.tar.gz


Available text colors
grey, red, green, yellow, blue, magenta, cyan, white.
Available text highlights
on_grey, on_red, on_green, on_yellow, on_blue, on_magenta, on_cyan,on_white.
Available attributes
bold, dark, underline, blink, reverse, concealed.
Example
from termcolor import colored

print colored('Hello, World!', 'red', attrs=['reverse', 'blink'])
print colored('Hello, World!', 'green', 'on_red')

red_on_cyan = lambda x: colored(x, 'red', 'on_cyan')
print red_on_cyan('Hello, World!')
print red_on_cyan('Hello, Universe!')

Terminal properties

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
|| 点击这里 || 点击这里 || 点击这里 || 点击这里 || 点击这里 || 点击这里 || 点击这里 ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Terminal || bold || dark || underline || blink || reverse || concealed ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
xterm || yes || no || yes || bold || yes || yes ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
linux || yes || yes || bold || yes || yes || no ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
rxvt || yes || no || yes || bold/black || yes || no ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
dtterm || yes || yes || yes || reverse || yes || yes ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
teraterm || reverse || no || yes || rev/red || yes || no ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
aixterm || normal || no || yes || no || yes || yes ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
PuTTY || color || no || yes || no || yes || no ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Windows || no || no || no || no || yes || no ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Cygwin SSH || yes || no || color || color || color || yes ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Mac Terminal || yes || no || yes || yes || yes || yes ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~






在终端中输出各种颜色的文字

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
https://pypi.python.org/pypi/termcolor/0.1.1



from termcolor import colored

print colored('Hello, World!', 'red', attrs=['reverse', 'blink'])
print colored('Hello, World!', 'green', 'on_red')

red_on_cyan = lambda x: colored(x, 'red', 'on_cyan')
print red_on_cyan('Hello, World!')
print red_on_cyan('Hello, Universe!')



