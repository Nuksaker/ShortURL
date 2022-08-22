# Project Short URL
## My name is Sorawit Siamhong

## ขั้นตอนการติดตั้ง
* ติดตั้ง Xampp หรือโปรแกรมที่ใช้รัน PHP และ MySQL  
* สร้างฐานข้อมูล shorturl
    * CREATE TABLE url ( id INT NULL AUTO_INCREMENT , full_url CHAR(1024) NOT NULL , short_url CHAR(8) NOT NULL , cilck INT(11) NOT NULL , PRIMARY KEY (id)) ENGINE = InnoDB;
    * หรือ import file shorturl.sql

## ขั้นการใช้งาน
\* อธิบายโดยใช้เป็น Xampp \*
* ลิ้งใช้งาน localhost/shorturl/ หรือชื่อโฟล์เดอร์ที่ได้ทำการบันทึก

# LINK code https://github.com/Nuksaker/ShortURL.git