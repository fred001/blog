
  # lftp

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:02:40 


      None


      <p>
      遇到 Certificate verification，
可能是远程并不支持ssl
而 lftp编译进了ssl支持

方法是用配置文件禁止

echo "set ftp:ssl-allow no" >> ~/.lftprc #(fc19)
      </p>

  