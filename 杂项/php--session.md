
  # php--session

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:48:46 


      None


      <p>
      SESSION
* session中不要保存 类对象,
因为 session_start()  的时候，遇到这个对象，会尝试载入相应的类来恢复它
当找不到类的时候， session_start 就失败了

所以： session 尽量不要保存类， 当不同站点共享session的时候，容易遇到问题

      </p>

  