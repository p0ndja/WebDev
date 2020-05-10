# SMD WebDev

![Image](https://repository-images.githubusercontent.com/216790969/da52a000-7792-11ea-997b-7503371435f0)

สำหรับโปรเจค WebDev นี้เป็นโปรเจคที่พัฒนาขึ้น บนภาษา **HTML, PHP, CSS, JavaScript, SQL** (รวมถึง Bootstrap 4.4.1) เพื่อสร้างเว็บไซต์โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง) ตามปณิธานของพวกเราที่ตั้งใจเอาไว้ว่าจะให้มันเป็นโปรเจคจบของพวกเรา **PondJaᵀᴴ และ ˢᵖᵉᶜᵗᵉʳRisaka**
ซึ่งโปรเจคนี้ถือเป็นโปรเจคด้านเว็บไซต์แรกที่มีโอกาสได้ทำ ซึ่งถ้าหากมีข้อผิดพลาดหรือบัคใด ๆ ที่รู้สึกขัดใจ สามารถ Pull เข้ามาได้เลยนะครับ จะได้ทำการปรับแก้ไขให้

This 'WebDev' project is base on **HTML, PHP, CSS, JavaScript, SQL Computer languages** (with Bootstrap 4.4.1) to create our dream website for our school, The demonstration school of Khon Kaen University (Mo Din Daeng) 
This is our first website project, if there's something which is not prefectly. Feel free to create a pull request to us.


#### **This project has a 'GNU General Public License v3.0', please keep in mind that you'll need to opensource your edited code if you using our code.**

![Image](https://me.pondja.com/img/Annotation%202019-11-29%20114539.jpg) ![Image](https://me.pondja.com/img/Annotation%202019-11-29%20115148.jpg) ![Image](https://me.pondja.com/img/Annotation%202019-11-29%20115227.jpg)

# Live Demo: [https://smd.pondja.com](https://smd.pondja.com)


#### PondJaᵀᴴ & ˢᵖᵉᶜᵗᵉʳRisaka

# Technical Zone

#### Connect.php
-----------------
สำหรับไฟล์ **'/global/connect.php'** จะไม่มีอยู่ในโฟลเดอร์นั้นเพราะว่าเรื่องความลับของข้อมูลที่เปิดเผยไม่ได้ เอาเป็นว่าให้สร้างเองตาม Template ด้านล่างนี้นะครับ

For the **'/global/connect.php'** file. There's a secret on the database information, so I can't show you here,
but you follow this template:

```
<?php
    ob_start();
    session_start();

    //ตรงนี้ให้ปรับค่าตามเซิฟเวอร์แต่ละเครื่องนะครับ // You need to update this information to match with your server
    //ข้อมูลในส่วนนี้เป็นความลับ ไม่สามารถเผยแพร่ลงสาธารณะได้ครับ // This one is secret, so I can't public.
    //;w;

    //ไฟล์นี้จะมีเป็น Template ให้อยู่ใน /global/ นะครับ ชื่อ 'connect.template.php'
    //This template file is in /global/, named 'connect.template.php'

    $dbhost = "IP เซิฟเวอร์ MySQL ของคุณ";
    $dbuser = "Username สำหรับเข้าใช้งาน MySQL ของคุณ";
    $dbpass = "Password สำหรับเข้าใช้งาน MySQL ของคุณ";
    $dbdatabase = "Database ที่ต้องการให้ระบบใช้งาน";
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbdatabase);
    mysqli_set_charset($conn, 'utf8');

    if(! $conn ) {
        die('Could not connect: ' . mysqli_error($conn));
    }

    include(function.php);

?>
```

#### SQL Structure
-----------------
สำหรับ SQL Structure ของตัวเว็บไซด์ จะปรากฎในชื่อไฟล์ 'template.sql' นะครับ // The template file for SQL Structure is named 'template.sql'
เพียงแค่ Import เข้า Database ก็สามารถใช้งานได้เลยครับ // What you need just import that template file into your database.

หรือตามโค้ตด้านล่างไปใช้ในการ Generate Table ได้เลยครับ // Or just use code below to generate table.

```
create table achievement (
	id INT NOT NULL,
	page404 BOOLEAN DEFAULT false,
	betaTester BOOLEAN DEFAULT false,
	WebDevTycoon BOOLEAN DEFAULT false,
	the4thFloor BOOLEAN DEFAULT false,
	Xmas BOOLEAN DEFAULT false,
	PRIMARY KEY ( id )
);

create table config(
	id INT NOT NULL AUTO_INCREMENT,
	name LONGTEXT NOT NULL,
	bool BOOLEAN,
	title LONGTEXT,
	description LONGTEXT,
	haveVal BOOL DEFAULT FALSE,
	val LONGTEXT,
	valTitle LONGTEXT,
	valDescription LONGTEXT,
	PRIMARY KEY (id)
);

insert into config (name, bool) VALUES ('indexpg_showCarousel',true);
insert into config (name, bool) VALUES ('indexpg_showLatestNews',true);
insert into config (name, bool) VALUES ('indexpg_showCourse',true);
insert into config (name, bool) VALUES ('indexpg_showPreviewGallery',true);
insert into config (name, bool) VALUES ('indexpg_AlertMessage',false);
insert into config (name, bool, haveVal, val) VALUES ('indexpg_Countdown',true,true,'Jan 1, 2020 00:00:00');
insert into config (name, bool, haveVal, val) VALUES ('indexpg_videoHeader',true,true,'../static/images/header/thumbnail-min.mp4');
insert into config (name, bool, haveVal, val) VALUES ('global_Livestream',true,true,'https://pondja.com');
insert into config (name, bool, haveVal, val) VALUES ('global_lastUpdate',true,true,'ปรับปรุงครั้งล่าสุด...');
insert into config (name, bool) VALUES ('global_snowEffect',true);
insert into config (name, bool) VALUES ('global_override_checking_admin',false);
insert into config (name, bool) VALUES ('global_userProfile',true);
insert into config (name, bool) VALUES ('achi_achievementSystem',true);
insert into config (name, bool) VALUES ('user_allowRegister',true);
insert into config (name, bool) VALUES ('user_allowLogin',true);
insert into config (name, bool) VALUES ('user_allowPostForum',true);
insert into config (name, bool) VALUES ('user_profile_allowEdit_ProfilePic',true);
insert into config (name, bool) VALUES ('user_profile_allowEdit_BackgroundPic',true);
insert into config (name, bool) VALUES ('user_profile_allowEdit_Bio',true);
insert into config (name, bool) VALUES ('user_profile_displayExperience',true);
insert into config (name, bool) VALUES ('user_allowEditProfile',true);

create table forum(
	id INT NOT NULL,
	title TEXT NOT NULL,
	writer INT NOT NULL,
	time TINYTEXT,
	article LONGTEXT NOT NULL,
	pin BOOL DEFAULT false,
	type INT DEFAULT 1,
	PRIMARY KEY (id)
);

create table post (
   id INT NOT NULL AUTO_INCREMENT,
   title TEXT NOT NULL,
   writer INT NOT NULL,
   time TINYTEXT NOT NULL,
   article LONGTEXT NOT NULL,
   cover TEXT DEFAULT NULL,
   tags TEXT DEFAULT NULL,
   hide BOOL DEFAULT false,
   pin BOOL DEFAULT false,
   attachment LONGTEXT DEFAULT NULL,
   type TEXT,
   PRIMARY KEY ( id )
);

create table profile (
   id INT NOT NULL,
   greetings LONGTEXT,
   profile LONGTEXT,
   background LONGTEXT,
   PRIMARY KEY ( id )
);

create table user (
   id INT NOT NULL,
   username TEXT NOT NULL,
   password TEXT NOT NULL,
   citizen_id BIGINT NOT NULL,
   prefix VARCHAR(10) NOT NULL,
   firstname TEXT NOT NULL,
   lastname TEXT NOT NULL,
   firstname_en TEXT NOT NULL,
   lastname_en TEXT NOT NULL,
   grade INT NOT NULL,
   class INT NOT NULL,
   email TEXT,
   isAdmin BOOLEAN DEFAULT false,
   isTeacher BOOLEAN DEFAULT false,
   isNewsReporter BOOLEAN DEFAULT false,
   isForumEditor BOOLEAN DEFAULT false,
   isRegistrator BOOLEAN DEFAULT false,
   isTimetableDesigner BOOLEAN DEFAULT false,
   isSubjectRegistrator BOOLEAN DEFAULT false,
   PRIMARY KEY ( id )
);
```

ปล. ผมใช้ MySQL นะครับ
P.S. I use MySQL.
