
  # user

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:12:04 


      None


      <p>
      linux -用户/组   笔记
=========================


user   add/remove/change
group  add/remove

user :  add group/remove group/list group



user add:
   useradd -D  查看预设值
     useradd  [-g 刜始群组] [-G 次要群组]  使用者账号名

        passwd  USER
         echo PASS |   passwd  --stdin   USER

         usermod  USER  #修改用户

         userdel username #不删除用户目录
         userdel -r username 乀前, 先以『 find / -user
         username 』查出整个系统内属亍 username 癿档案,然后再加以初除吧!

         id  用户信息


         groupadd  GROUP
         groupmod  GROUP #修改组
         groupdel  GROUP

         groups 查看用户所有group

         usermod -g  GROUP  USER  #修改主要组
         usermod -aG GROUP  USER  #增加组
         gpasswd -a user group #增加组

         gpasswd -d A GROUP #从组中删除用户
      </p>

  