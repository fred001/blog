
  # unicorn.me 备份策略

      version:  1
      created_at:  2016-05-04
      updated_at:  None

      created at 2016-05-04 19:45:18 


      None


      <p>
      unicorn.me 备份策略

备份内容：  /home/unicorn
备份步骤：
    1.把所有需要备份的内容先同步到 /home/unicorn
    2.每隔一段时间，备份 unicorn/resource/windows | video 到 离线1备
    2.每隔一段时间， 备份 unicorn 到 离线2备 (2T硬盘有故障，缺少硬盘，无法备份）
    3.其它时间剩余内容备份到 在线1备
      </p>

  