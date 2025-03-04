

CREATE TABLE `patient_treatment` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `f_pre` varchar(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` varchar(11) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `checkup_no` int(11) DEFAULT NULL,
  `rdate` varchar(25) NOT NULL,
  `payment` varchar(7) NOT NULL,
  `chno` varchar(15) NOT NULL,
  `oct` varchar(7) NOT NULL,
  `ffa` varchar(7) NOT NULL,
  `prp` varchar(7) NOT NULL,
  `noprp` int(1) DEFAULT NULL,
  `sectoral` varchar(7) NOT NULL,
  `nosectoral` int(1) DEFAULT NULL,
  `barrage` varchar(7) NOT NULL,
  `nobarrage` int(1) DEFAULT NULL,
  `yaglaser` varchar(7) NOT NULL,
  `bscan` varchar(7) NOT NULL,
  `fphoto` varchar(7) NOT NULL,
  `cct` varchar(7) NOT NULL,
  `perimetry` varchar(7) NOT NULL,
  `yagpi` varchar(7) NOT NULL,
  `antivegf` varchar(5) NOT NULL,
  `ranieyeinj` varchar(7) NOT NULL,
  `rajumabinj` varchar(7) NOT NULL,
  `glaucomaworkup` varchar(7) NOT NULL,
  `iolworkup` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111111154 DEFAULT CHARSET=utf8mb4;

INSERT INTO patient_treatment VALUES("111111148","Shri","Harshit Varshney","2003-12-11","M","1","2022-07-27","cash","","1600","1000","1500","2","3000","1","3000","1","1600","600","500","300","1000","2000","","7000","16000","3000","3000");
INSERT INTO patient_treatment VALUES("111111149","Shri","harsh Varshney","2003-12-11","M","2","2022-07-27","cash","","1600","","","","","","","","","","","","","","","","","","");
INSERT INTO patient_treatment VALUES("111111150","Smt.","Krishna Varshney","1971-09-04","F","1","2022-07-28","cash","","","","","0","","0","","0","","","","","","","7000","","","","");
INSERT INTO patient_treatment VALUES("111111151","Shri","shivvardhan singh sikarwar","18","M","1","2023-05-19","cash","","1600","","","","","","","","1600","","","","","","","","","","");
INSERT INTO patient_treatment VALUES("111111152","Shri","shivvardhan singh sikarwar","20","M","1","2023-07-02","cash","","","","","0","","0","","0","","","","","","","","","","","");
INSERT INTO patient_treatment VALUES("111111153","Shri","Chetan","24","M","1","2023-10-01","cash","","1600","","","","","","","","","","","","","","7000","","","","");



CREATE TABLE `patients` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `f_pre` varchar(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` varchar(11) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `checkup_no` int(11) DEFAULT NULL,
  `rdate` varchar(25) NOT NULL,
  `payment` varchar(7) NOT NULL,
  `chno` varchar(15) NOT NULL,
  `fee` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111111136 DEFAULT CHARSET=utf8mb4;

INSERT INTO patients VALUES("1","smt.","Manu sharma","2003-12-11","M","","2022-06-29","cash","","300");
INSERT INTO patients VALUES("2","Shri","harshit varshney","2003-12-11","M","","2022-06-29","cash","","300");
INSERT INTO patients VALUES("8","","harshit varshney","2003-12-11","M","","2022-07-02","cash","","300");
INSERT INTO patients VALUES("9","","harshit varshney","2003-12-11","M","","2022-07-02","cash","","300");
INSERT INTO patients VALUES("10","","HARSHIT VARSHNEY S/O GOPAL SHANKAR VARSHNEY","2003-12-11","M","","2022-07-06","cash","","300");
INSERT INTO patients VALUES("11","","Aryan Shivhare","2000-12-11","M","","2022-07-06","cheque","123456789521471","300");
INSERT INTO patients VALUES("12","ku.","vaishnavi dubey","2003-12-11","F","","2022-07-06","cheque","123456789521471","300");
INSERT INTO patients VALUES("13","","aaravardhan singh rajawat","2002-05-04","O","","2022-07-06","cash","","300");
INSERT INTO patients VALUES("14","","yuvraj singh","2000-12-10","F","","2022-07-06","cheque","123456789521471","300");
INSERT INTO patients VALUES("15","","dep singh","1962-01-22","O","","2022-07-06","cheque","123456789521471","300");
INSERT INTO patients VALUES("16","","harsh raj","2002-12-11","M","","2022-07-06","cash","","300");
INSERT INTO patients VALUES("111111115","","harshit varshney","2003-12-11","M","","2022-07-05","cheque","123456789521471","300");
INSERT INTO patients VALUES("111111116","","aravardhan singh rajawat","2002-12-11","O","","2022-07-05","cheque","123456789521471","300");
INSERT INTO patients VALUES("111111117","","Aryan Shivhare","2000-12-11","M","","2022-07-10","cash","","300");
INSERT INTO patients VALUES("111111118","","harshit","2003-11-12","M","","2002-11-10","cheque","123456789521471","300");
INSERT INTO patients VALUES("111111119","","harsh","2003-11-12","M","","2022-07-06","cash","","300");
INSERT INTO patients VALUES("111111120","","Krishna Varshney","2000-12-11","M","","2022-07-11","cash","","300");
INSERT INTO patients VALUES("111111121","","Aryan Shivhare","2000-12-11","O","","2022-07-11","cheque","123456789521471","300");
INSERT INTO patients VALUES("111111122","","Krishna Varshney","2003-12-11","M","","2022-07-11","cash","","300");
INSERT INTO patients VALUES("111111123","","Aryan Shivhare","2000-12-11","F","","2022-07-11","cash","","300");
INSERT INTO patients VALUES("111111124","shri","Aryan Shivhare","1971-12-11","M","5","2022-07-11","cash","","300");
INSERT INTO patients VALUES("111111127","Shri","HARSHIT VARSHNEY S/O GOPAL SHANKAR VARSHNEY","2000-12-11","M","1","2022-07-21","cash","","300");
INSERT INTO patients VALUES("111111130","Shri","harshit","2000-12-11","M","1","2022-07-28","cash","","300");
INSERT INTO patients VALUES("111111131","Shri","HARSHIT VARSHNEY S/O GOPAL SHANKAR VARSHNEY","2003-12-11","M","1","2022-08-20","cash","","300");
INSERT INTO patients VALUES("111111132","Shri","HARSHIT VARSHNEY S/O GOPAL SHANKAR VARSHNEY","2003-12-11","M","1","2022-08-21","cash","","0");
INSERT INTO patients VALUES("111111133","Shri","HARSHIT VARSHNEY S/O GOPAL SHANKAR VARSHNEY","2000-12-11","M","2","2022-08-21","cash","","0");
INSERT INTO patients VALUES("111111134","Shri","Krishna Varshney","2003-12-11","M","3","2022-08-21","cash","","300");
INSERT INTO patients VALUES("111111135","Shri","HARSHIT VARSHNEY ","2003-12-11","M","4","2022-08-21","cheque","123456789","500");



CREATE TABLE `rate` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `rate` int(6) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

INSERT INTO rate VALUES("1","oct","1600");
INSERT INTO rate VALUES("2","ffa","1000");
INSERT INTO rate VALUES("3"," green laser prp","1500");
INSERT INTO rate VALUES("4"," green laser sectoral laser","3000");
INSERT INTO rate VALUES("5","yag laser","1600");
INSERT INTO rate VALUES("6","b scan","600");
INSERT INTO rate VALUES("7","f. photo","500");
INSERT INTO rate VALUES("8","cct","300");
INSERT INTO rate VALUES("9","perimetory","1000");
INSERT INTO rate VALUES("10","yag pi","2000");
INSERT INTO rate VALUES("11","RANIEYE INJ.","7000");
INSERT INTO rate VALUES("12","glaucoma work up","3000");
INSERT INTO rate VALUES("13","iol workup","3000");
INSERT INTO rate VALUES("14","RAJUMAB INJ","16000");
INSERT INTO rate VALUES("15","barrage","3000");
INSERT INTO rate VALUES("16","ANTIVEGF INJ","7000");
INSERT INTO rate VALUES("17","checkup","500");



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `access_level` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("1","admin","Harshit Varshney","0044deeec43ded19b952125079eb1781","harshitvarshney39@gmail.com","admin");
INSERT INTO users VALUES("2","shiv","","8878","shivvardhan53@gmail.com","admin");
INSERT INTO users VALUES("3","harsh","","0044deeec43ded19b952125079eb1781","harsh@gmail.com","user");
INSERT INTO users VALUES("17","heeru","heeru","571f40019883d9e6a3c92003aba8706a","heeru@gmail.com","admin");

