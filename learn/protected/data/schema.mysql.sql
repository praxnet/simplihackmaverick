CREATE TABLE IF NOT EXISTS tbl_user
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(128) NOT NULL,	
	password VARCHAR(128) NOT NULL,
    designation VARCHAR(128)  NULL,
	company VARCHAR(128)  NULL,
	email VARCHAR(128) NOT NULL,
	experience VARCHAR(128) NULL, 
	dob date NULL,
	intro TEXT,
	user_data TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert into tbl_user (id, username, password, email, dob, intro) values  (12, 'abc', 'test', 'abc@test.com', '1983-08-22', NULL), (101, 'senthil','test','senthil@test.com', '1987-08-22', NULL);


CREATE TABLE  IF NOT EXISTS tbl_course 
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(128) NOT NULL,
	tags TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert into tbl_course (id, name, active) values (1, 'CPP', 1);

CREATE TABLE  IF NOT EXISTS tbl_tag
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert into tbl_tag (id, name) values (1, 'Programming');



CREATE TABLE tbl_qa  
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	course_id INT,
	question VARCHAR(255) NOT NULL,
	options TEXT NOT NULL,
	answer TEXT NOT NULL,
	CONSTRAINT FK_course_quiz FOREIGN KEY (course_id)
		REFERENCES tbl_course (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE  IF NOT EXISTS tbl_trainer
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	course_id INT NOT NULL ,	
	user_id INT NOT NULL,
	trainer_level ENUM('basic', 'intermediate', 'adv'),
	created DATETIME NOT NULL,
	modified DATETIME NOT NULL
);	
 
insert into tbl_trainer (course_id, user_id, trainer_level, created, modified) values (1, 12, 'basic', NOW(), NOW()); 

CREATE TABLE  IF NOT EXISTS tbl_course_enrollment
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	course_id INT NOT NULL ,
	date_enrolled DATETIME NOT NULL,
	trainer_id VARCHAR(128) NOT NULL,
	created DATETIME NOT NULL,
	modified DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert into tbl_course_enrollment (user_id, course_id, date_enrolled, trainer_id, created, modified) values (101, 1, NOW(), 12, NOW(), NOW());
