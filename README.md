# Thesis involved Car Inspection System at the Entrance to the University of Phayao
**ระบบตรวจรถเข้า-ออก ในมหาวิทยาลัยพะเยา**   เป็นระบบที่จะเพิ่มความปลอดภัยให้กับการเข้าออกในมหาวิทยาลัยพะเยา

เนื่องจากทางมหาวิทยาลัยพะเยามีเป็นพื้นที่ปิดและทุกทางเข้า-ออกจะมีจุดตรวจของ รปภ. เพื่อรับและคืนบัตรทุกครั้งที่เข้า-ออกในมหาวิทยาลัยพะเยา และไม่สามารถระบุตัวตนของเจ้าของรถได้
ดังนั้นจึงเกิดเป็นระบบ **ระบบตรวจรถเข้า-ออก ในมหาวิทยาลัยพะเยา** โดยใช้ library opencv เพื่อตรวจจับแผ่นป้ายทะเบียนรถยนต์แล้วนำมาเปรียบเทียบหาข้อมูลเจ้าของรถในฐานข้อมูล
ระบบจะมีการแจ้งเตือนไปยังเจ้าของรถยนต์ผ่าน LINE Notify ทุกครั้งที่มีการเข้า-ออกในมหาวิทยาลัยพะเยาและการกระทำอื่นๆ
เจ้าของรถสามารถสั่ง Lock รถยนต์ได้ผ่าน LINE ถ้ารถคันนี้ถูกสั่งล็อกจากเจ้าของ รถยนต์ก็ไม่สามารถออกจากมหาวิทยาลัยพะเยาได้แต่ยังสามารถเข้ามาได้ ถ้าต้องการปลดล็อกเจ้าของรถต้องเป็นคน UnLock เท่านั้น

coding run on Raspberry Pi 4


จากปัญหาข้างต้นผมจึงทำระบบขึ้นมาเพื่อยืนยันตัวตนของรถยนต์ที่ต้องการเข้าในมหาวิทยาลัยพะเยา

> วัตถุประสงค์
- เพื่อให้ความสะดวกรวดเร็วในการตรวจรถเข้าออกในมหาวิทยาลัยพะเยา
- เพื่อเพิ่มระบบรักษาความปลอดภัยในการนำรถยนต์เข้ามาในมหาวิทยาลัยพะเยา
- มีการแจ้งเตือนผ่านไลน์ในทุกการเข้าออกทุกครั้งเป็นการเพิ่มความปลอดภัยให้กับผู้ใช้รถยนต์

**รายละเอียดของระบบ**
1. ###### หน้าหลัก Monitor
[![Monitor.png](https://i.postimg.cc/vZSRHCw2/Monitor.png)](https://postimg.cc/cvYkF9Hf)
 * เป็นหน้าหลักเพื่อให้เจ้าหน้าที่ รปภ. ดูว่ารถคันนี้มีการลงทะเบียนกับระบบไว้หรือไม่ 
    * ถ้าพบข้อมูลก็ผ่านไปได้ 
    * ถ้าไม่พบข้อมูล รปภ. ก็จะสร้าง QR Code เพื่อใช้เป็นกุญแจเข้า-ออกในมหาวิทยาลัยพะเยาแทน
#
#
2. ###### หน้าเลือกสถานะของตนเอง
[![choose-Status1.png](https://i.postimg.cc/qRqdG0XT/choose-Status1.png)](https://postimg.cc/McC4WCFP)
* เป็นหน้าเลือกสถานะของบุคคลที่ต้องการสมัครใช้งานระบบนี้
#
#
3. ###### หน้าเข้าสู่ระบบเพื่อทำการเพิ่มข้อมูลรถยนต์ลงระบบ
[![userlogin.png](https://i.postimg.cc/QtGyF34m/userlogin.png)](https://postimg.cc/Mc5DLh8f)
* เป็นหน้าเข้าสู่ระบบนิสิตและบุคลากรของมหาวิทยาลัยพะเยา 
    * ระบบจะทำการดึง API ข้อมูลรหัสนิสิตและรหัสบุคลากรมาจากส่วนกลางมหาวิทยาลัยพะเยา 
#
#
4. ###### หน้าเพิ่มข้อมูลรถยนต์
[![user-Register.png](https://i.postimg.cc/Jnx5RV9G/user-Register.png)](https://postimg.cc/5YHCmG9V)
* เป็นหน้าเพิ่มข้อมูลต่างๆของรถยนต์
   * ผู้ใช้ต้อง Scan QR code เพื่อรับ LINE UID จากระบบ
   * จากนั้นนำ LINE UID กรอกลงช่องเพื่อที่จะได้รับการแจ้งเตือนและการกระทำต่างๆผ่าน LINE ได้
#
#
5. ###### หน้าเข้าสู่ระบบของ Admin
![capture](https://www.img.in.th/images/c745b21baeb1c7cf9497d881f36913ae.png)
* เป็นหน้าที่ Admin เข้าสู่ระบบหลังบ้าน
#
#
6. ###### หน้าแสดงข้อมูลของ Admin และแสดงจำนวนรถทั้งหมดของระบบ
![capture](https://www.img.in.th/images/465f08156bab9b583715ba5d85a09bfa.png)
* เป็นหน้าแสดงจำนวนรถทั้งหมดของระบบ
   * แสดงข้อมูลส่วนตัวของ Admin
   * สามารถลบข้อมูลซ้ำซ้อนของตารางได้
#
#
7. ###### หน้าค้นหารถที่เข้า-ออก ตามวันเวลาที่ต้องการได้
![capture](https://www.img.in.th/images/85f17154c9edf6786796198e060842d0.png)
* เป็นหน้าค้นหาจำนวนรถที่เข้า-ออก ตามเวลาที่กำหนดได้
#
#
8. ###### หน้าค้นหาข้อมูลเจ้าของรถ
![capture](https://www.img.in.th/images/9ae971ae1bb85ae3c446325d1dd02eff.png)
* เป็นหน้าค้นหาข้อมูลรถและเจ้าของยนต์
#
#
9. ###### หน้าส่งแจ้งเตือนหรือประกาศต่างๆไปยังผู้ใช้ทุกคน
![capture](https://www.img.in.th/images/c440f9d35d810fb211d7c1e5345e70cc.png)
* เป็นหน้าส่ง Notification ไปยังผู้ใช้ทุกคน
#
#
10. ###### หน้า interface LINE 
![capture](https://www.img.in.th/images/b46e1073ac23303e9e368fe38c42bea6.jpg)
* เป็น bot account ไว้ใช้งานกับสมาชิก จะมี interface ให้ใช้ทั้งหมด 6 แบบ
   * LockCar ผู้ใช้สามารถ Lock และ UnLock รถยนต์ได้ผ่าน LINE
   * เบอร์โทร รปภ. สามารถโทรเพื่อร้องขอให้ รปภ. Lock และ UnLock ได้
   * Report เป็น interface การ Repot รายงานต่างๆจากผู้ใช้ไปยังระบบ
   * ประวัติเข้า-ออก ผู้ใช้สามารถดูประวัติการเข้า-ออกของรถตัวเองได้
   * Location ผู้ใช้สามารถดูที่ตั้งของจุดตรวจรถยนต์ได้
   * เช็คจำนวนรถยนต์ ผู้ใช้สามารถเช็คจำนวนรถยนต์ที่อยู่ภายในบริเวณมหาวิทยาลัยพะเยาได้
