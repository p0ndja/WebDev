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
insert into config (name, bool, haveVal, val) VALUES ('indexpg_videoHeader',true,true,'../static/images/element/thumbnail2020-min.mp4');
insert into config (name, bool, haveVal, val) VALUES ('global_Livestream',true,true,'https://pondja.com');
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
insert into config (name, bool, haveVal, val) VALUES ('global_categoryListThing',true,true,'news|order|announce|qa|advice|registration|personal|library|pta');
insert into config (name, bool) VALUES ('global_temporaryClose', false);

create table std_2563(
   id INT NOT NULL AUTO_INCREMENT,
   date TEXT NOT NULL,
   PRIMARY KEY (id)
);

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
   title TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
   writer INT NOT NULL,
   time TINYTEXT NOT NULL,
   article LONGTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
   cover TEXT DEFAULT NULL,
   tags TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
   hide BOOL DEFAULT false,
   pin BOOL DEFAULT false,
   attachment LONGTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
   hotlink LONGTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
   type TEXT,
   PRIMARY KEY ( id )
);

create table profile (
   id INT NOT NULL,
   greetings LONGTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci ,
   profile LONGTEXT,
   background LONGTEXT,
   graduation LONGTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
   isDark BOOL DEFAULT FALSE,
   tagPostID LONGTEXT DEFAULT NULL,
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
   grade INT DEFAULT NULL,
   class INT DEFAULT NULL,
   email TEXT DEFAULT NULL,
   isEmailVerify BOOLEAN DEFAULT false,
   isAdmin BOOLEAN DEFAULT false,
   isTeacher BOOLEAN DEFAULT false,
   isNewsReporter BOOLEAN DEFAULT false,
   isForumEditor BOOLEAN DEFAULT false,
   isRegistrator BOOLEAN DEFAULT false,
   isTimetableDesigner BOOLEAN DEFAULT false,
   isSubjectRegistrator BOOLEAN DEFAULT false,
   PRIMARY KEY ( id )
);