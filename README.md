# Project Short URL

## My name is Sorawit Siamhong

## ขั้นตอนการติดตั้ง

- ติดตั้ง Xampp หรือโปรแกรมที่ใช้รัน PHP และ phpmyadmin
- สร้างฐานข้อมูล shorturl
  - สร้างตาราง url
    - \_ CREATE TABLE `url` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `full_url` varchar(1024) NOT NULL,
      `short_url` varchar(8) NOT NULL,
      `click` int(11) NOT NULL
      `history` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  * สร้างตาราง user
    - \_ CREATE TABLE `url` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(1024) NOT NULL,
      `password` varchar(8) NOT NULL,
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  * หรือ import จากไฟล์ shorturl.sql

## ขั้นการใช้งาน

\* อธิบายโดยใช้เป็น Xampp \*

### ผู้ใช้งานทั่วไป

- ลิ้งใช้งาน localhost/shorturl หรือชื่อโฟล์เดอร์ที่ได้ทำการบันทึก /

### การเข้าสู่ระบบผู้ดูแล

- รหัสผู้ใช้งาน admin รหัสผ่าน 1234 หรือกำหนดได้ใน database

## LINK code https://github.com/Nuksaker/ShortURL.git
