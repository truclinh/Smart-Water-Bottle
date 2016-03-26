#define chanphat 7
#define chanthu 8
int thoigian, khoangcach;
#include<stdlib.h>
#include <string.h>
char command;
String test;
boolean check=false;
int count1;
void setup()
{
  Serial.begin(9600);
  pinMode(chanphat,OUTPUT);
  pinMode(chanthu,INPUT);
}
void loop()
{
  while(Serial.available()>0)
  {
    command=((byte)Serial.read());
    test+=command;
    delay(100);
  }
  if (test=="TURN ON")
  {
    check=true;
    convertInttoChar(123456);
    test="";
    command='\0';    
  }
  if (test=="TURN OFF")
  {
    test="";
    command='\0';
  }
  //nếu như người dùng đã nhấn vào nút bắt đầu bên smartphone
  if(check==true)
     {
          //CẢM BIẾN SIÊU ÂM
   
         digitalWrite(chanphat,HIGH);
         delayMicroseconds(1000);
         digitalWrite(chanphat,LOW);
         int thoi_gian=pulseIn(chanthu,HIGH);
         int khoang_cach=0.0344*(thoi_gian/2);
         if(khoang_cach<10)
         {
             Serial.print(khoang_cach);
         }
         else 
         {
         switch(khoang_cach)
         {
         case 10:
         {
           Serial.print("a");
           break;
         }
          case 11:
         {
           Serial.print("b");
           break;
         }
          case 12:
         {
           Serial.print("c");
           break;
         }
          case 13:
         {
           Serial.print("d");
           break;
         }
           case 14:
         {
           Serial.print("e");
           break;
         }
           case 15:
         {
           Serial.print("f");
           break;
         }
           case 16:
         {
           Serial.print("g");
           break;
         }
         case 17:
         {
           Serial.print("h");
           break;
         }     
         }
           delay(1000);
      }
   
  
     }
  
}
//hàm chuyển đổi số nguyên sang char, lấy độ dài
void convertInttoChar(int number)
{
  count1=0;
  char NUMBER[5];
  itoa(number, NUMBER,10);
  // xác định độ dài của chuỗi
  for(int i=0;i<sizeof(NUMBER);i++)
    {
            if(NUMBER[i]!='\0')
            {
               count1+=1; 
            }
     }
     //gửi biến độ dài đi
     Serial.print(count1);   
    delay(50);
  //Gửi thông tin chuổi số đi
  for(int i=0;i<sizeof(NUMBER);i++)
    {
            if(NUMBER[i]!='\0')
            {
               Serial.print(NUMBER[i]);  
              delay(50); 
            }
     }
  
  
}


