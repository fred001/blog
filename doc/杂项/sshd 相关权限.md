
  # sshd 相关权限

      version:  1
      created_at:  2016-05-05
      updated_at:  None

      created at 2016-05-05 11:09:49 


      None


      <p>
      1， HOME 目录权限必须正确，比如ROOT 是550
2， .ssh 目录 700
3, authori...keys 文件是 600
4， /etc/sshd/ 中三个配置文件的 group 是  ssh_keys, 并不是root
      </p>

  