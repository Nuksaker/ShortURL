# Project Short URL

## My name is Sorawit Siamhong

## ขั้นตอนการติดตั้ง

- ติดตั้ง Xampp หรือโปรแกรมที่ใช้รัน PHP และ MySQL
- สร้างฐานข้อมูล shorturl
  _ CREATE TABLE `url` (
  `id` int(11) NOT NULL,
  `full_url` varchar(1024) NOT NULL,
  `short_url` varchar(8) NOT NULL,
  `click` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  _ หรือ import file shorturl.sql

## ขั้นการใช้งาน

\* อธิบายโดยใช้เป็น Xampp \*

- ลิ้งใช้งาน localhost/shorturl/ หรือชื่อโฟล์เดอร์ที่ได้ทำการบันทึก

## LINK code https://github.com/Nuksaker/ShortURL.git
