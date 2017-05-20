
  # 创建一个自定义service的步骤：（假设名为 test)

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:29:34 


      None


      <p>
      1，目标目录中创建配置文件 test.service
/usr/lib/systemd/system/test.service
2,准备文件内容
1 [Unit]
2 Description=Clock #服务描述
3 After=syslog.target network.target auditd.service #在哪些服务之后启动
4 
5 [Service]
6 StandardError=syslog+console #标准错误输出 syslog应该是 /var/log/message
7 ExecStart=/root/bin/clock #如何启动
8 ExecStop=/bin/kill -15 ${MAINPID} #如何停止，这里通过信号
9 
10 Restart=on-failure #如果意外中止，则自动重启
11 RestartSec=10s #10秒后自动重启
12 
13 [Install]
14 WantedBy=multi-user.target #只允许多用户

3，编写服务代码
服务代码里面需要是 持续循环，当然执行一次也行，但是不标准，会很很多失败信号，因为这属于意外退出
里面捕捉信号来自动重启，这需要自己的代码
日志估计是写在上面配置指定中

4，要求启动运行
systemclt enable test
systemctl start test
      </p>

  