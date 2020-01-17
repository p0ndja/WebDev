# WebDev
-----------------
สำหรับโปรเจค WebDev นี้เป็นโปรเจคที่พัฒนาขึ้น บนภาษา **HTML, PHP, CSS, JavaScript, SQL** (รวมถึง Bootstrap 4.4.1) เพื่อสร้างเว็บไซต์โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง) ตามปณิธานของพวกเราที่ตั้งใจเอาไว้ว่าจะให้มันเป็นโปรเจคจบของพวกเรา **PondJaᵀᴴ และ ˢᵖᵉᶜᵗᵉʳRisaka**
ซึ่งโปรเจคนี้ถือเป็นโปรเจคด้านเว็บไซต์แรกที่มีโอกาสได้ทำ ซึ่งถ้าหากมีข้อผิดพลาดหรือบัคใด ๆ ที่รู้สึกขัดใจ สามารถ Pull เข้ามาได้เลยนะครับ จะได้ทำการปรับแก้ไขให้

This 'WebDev' project is base on **HTML, PHP, CSS, JavaScript, SQL Computer languages** (with Bootstrap 4.4.1) to create our dream website for our school, The demonstration school of Khon Kaen University (Mo Din Daeng) 
This is our first website project, if there's something which is not prefectly. Feel free to create a pull request to us.


#### **This project has a 'GNU General Public License v3.0', please keep in mind that you'll need to opensource your edited code if you using our code.**

#### Connect.php
-----------------
สำหรับไฟล์ **'/global/connect.php'** จะไม่มีอยู่ในโฟลเดอร์นั้นเพราะว่าเรื่องความลับของข้อมูลที่เปิดเผยไม่ได้ เอาเป็นว่าให้สร้างเองตาม Template ด้านล่างนี้นะครับ

For the **'/global/connect.php'** file. There's a secret on the database information, so I can't show you here,
but you follow this template:

```
<?php
    ob_start();
    session_start();
    //ตรงนี้ให้ปรับค่าตามเซิฟเวอร์แต่ละเครื่องนะครับ You need to update this information to match with your server
    //ข้อมูลในส่วนนี้เป็นความลับ ไม่สามารถเผยแพร่ลงสาธารณะได้ครับ This one is secret, so I can't public.
    //;w;
    $dbhost = "IP เซิฟเวอร์ MySQL ของคุณ";
    $dbuser = "Username สำหรับเข้าใช้งาน MySQL ของคุณ";
    $dbpass = "Password สำหรับเข้าใช้งาน MySQL ของคุณ";
    $dbdatabase = "Database ที่ต้องการให้ระบบใช้งาน";
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbdatabase);
    mysqli_set_charset($conn, 'utf8');

    if(! $conn ) {
        die('Could not connect: ' . mysqli_error($conn));
    }
?>
```

![Image](https://me.pondja.com/img/Annotation%202019-11-29%20114539.jpg) ![Image](https://me.pondja.com/img/Annotation%202019-11-29%20115148.jpg) ![Image](https://me.pondja.com/img/Annotation%202019-11-29%20115227.jpg)

# Live Demo: [https://satit.pondja.com](https://satit.pondja.com)




#### DEVELOPER
### PondJaᵀᴴ & ˢᵖᵉᶜᵗᵉʳRisaka
