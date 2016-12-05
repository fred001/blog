
  # linux--sftp--shell

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:17:04 


      None


      <p>
      ls    --sort=size | head -n 10    | tail -n 10  | xargs  -i  -t mv   {} ../

把容量最大的前10个， 移动到父目录去

tail -n 10: 去掉第一行的 总量统计 （不是文件)

xargs  :
-i (把 {} 替换成结果)
-t 打印命令， （用来查看是否正确)



      </p>

  