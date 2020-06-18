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
insert into config (name, bool, haveVal, val) VALUES ('indexpg_videoHeader',true,true,'../static/images/element/thumbnail-min.mp4');
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
   hotlink LONGTEXT DEFAULT NULL,
   type TEXT,
   PRIMARY KEY ( id )
);

create table profile (
   id INT NOT NULL,
   greetings LONGTEXT,
   profile LONGTEXT,
   background LONGTEXT,
   isDark BOOL DEFAULT FALSE,
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