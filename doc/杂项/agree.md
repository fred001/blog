
  # agree

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:14:31 


      None


      <p>
      AGREE
C中三角函数的基本运用
yuyoutan 发表于 - 2008-4-4 14:17:00
0
推荐

C编程经验总结
数学有关角度的三角函数在C中的运用，常用的有：
 acos  (double x);
 asin  (double x);
 atan  (double x);
 exp   (double x);
 sin   (double x);
 tan   (double x);
 cos   (double x);
可能大家注意到了，这些三角函数的参数都是双精度的，平常我们常用的是角度制。在角度制中，我们把周角的1/360看作1度，那么，半周就是180度，一周就是360度，而三用角

函数的运算必须弧度制来表示，弧度制就是用弧的长度来度量角的大小的方法。绝对不能将角度直接代入以上的三角函数中，必须将角度转化为弧度制。即：360/2∏=57.29577951

即单位弧度所代表的角度。例如我们要求任意角度的三角函数以及任意值的反三角函数，则：
＃i nclude<stdio.h>
＃i nclude<math.h>
#define changshu 57.29577951
main()
{double zhi,arc, angle, PI=3.14159265358979323846;
 float wsin,wtan,wacos,wcos,wasin,watan,wcot,wacot;
 printf("please input the angle and the zhi you want to caculate:\nbe careful that the zhi you put must >=-1 and <=1.");
 scanf("%lf,%lf",&angle,&zhi);
 arc=angle/180*PI;
 wsin=sin(arc);
 wcos=cos(arc);
 wtan=tan(arc);
 wcot=1/wtan;
/*计算输入值的弧度*/
 wacos=acos(zhi);
 wasin=asin(zhi);
 watan=atan(zhi);
 wacot=PI/2-atan(zhi);
/*计算输入值的角度*/
 wacos=changshu*wacos;
 wasin=changshu*wasin;
 watan=changshu*watan;
 wacot=changshu*wacot;
 printf("sin=%f,cos=%f,tan=%f,cot=%f,angle cos=%f,angle sin=%f,angle tan=%f,angle cot=%f",wsin,wcos,wtan,wcot,wacos,wasin,watan,wacot);
}


      </p>

  