
  # sed

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:09:16 


      None


      <p>
      sed -i 's/被替换的内容/要替换成的内容/' file
会全部替换


sed -i '1,100 s/被替换的内容/要替换成的内容/' file
仅仅操作 [1,100] 行， 这是闭区间，包含1, 和100本身两行


替换整行
STR: numid=3,iface=MIXER,name='Master Playback Volume'
echo $str | sed -e "s/.*name='\(.*\)'/\1/" 
获得 Master Play...

echo $str | sed -e "/.*name='\(.*\)'/c \1" 
这样不行， \1 无效, 不知道有什么方法


# 元字符 * (零个或多个)
# 仅仅一个 {1}
# 一个或多个{1,} 注意逗号
ps aux | head -n 1 | sed -e 's/[ ]\{1,100\}/-/g'


find + sed 批量修改文件
find . -type f -exec grep aa_inst_id {} \; -exec sed -i -e "s/aa_inst_id/i_id/g" {} \;


      </p>

  