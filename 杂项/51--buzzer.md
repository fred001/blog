
  # 51--buzzer

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:20:26 


      None


      <p>
      BUZZER
蜂鸣器跟LED 类似，更简单，因为只有一个
sbit Buzzer=P3^7
Buzzer=0; //就会响了

问题：
delay_250us();
Buzzer=~Buzzer;

delay_250us();
Buzzer=1;


这样还会响，不知道为什么， 
因为Buzzer=1; 已经设置它不响了。


---------------
Buzzer=0;
Buzzer=1; 

可能第二个指令蜂鸣器有时间方面的限制
第二个指令太快。

while(i<=200) 

{

  delay_500us(); //延迟500us

  Buzzer=~Buzzer; //喇叭驱动位取反

  i++; //取反次数加1

}
i=0; //清时间控制变量

while(i<=400) 

{

  delay_250us(); //延迟250US

  Buzzer=~Buzzer; //喇叭驱动位取反

  i++; //取反次数加1

}

i=0; //清时间控制变量

}

这里有Buzzer=~Buzzer; 
而不是设置值，效果是1S响一下，
前半部分开启，后半部分关闭，
总之这个可能有特殊效果，实验发现这样声音比较好点，否则很刺耳。
程序中没有注释，无法了解

      </p>

  