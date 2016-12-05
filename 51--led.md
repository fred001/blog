
  # 51--led

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:20:04 


      None


      <p>
      LED
* LED LEFT LIGHT

#include<reg52.h> 
#include<intrins.h>

sbit Leden=P1^2;
sbit wei=P1^1; 
sbit Line=P1^3; 

int x,y;
void delay(unsigned int);
unsigned char i; 

void main()
{

  //init, clearn LED Screen  ,
  //otherwise the LED Screen will have random content
  P0=0X00; 
  Line=0;
  P0=0XFF; 
  wei=0;
  Leden=1;

  //P0 is the LED lights
  //total have 8 LED lights
  //it can set by  8bit char value
  //if the bit is 0, means light, otherwise dark
  //way1:  P0=0x7f // 0x7f = 0 1 1 1 1 1 1 1 (first will light)
  //way2: sbit LED1=P0^1  , LED1=0 //light LED1
  //      sbit LED2=P0^2  , LED2=0 //light LED2

  i=0x7f;
  while(1)
  {
    P0=i;
    delay(100);
    i=_cror_(i,1);
  }


}

void delay(unsigned int sm) 
{
  for(x=sm;x>0;x--)
  for(y=110;y>0;y--);
}


//functions

light_reset();
light_on([1-8])
light_off([1-8])
light_set(string 11111111)


      </p>

  