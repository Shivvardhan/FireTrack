

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
) ENGINE=InnoDB AUTO_INCREMENT=111111 DEFAULT CHARSET=utf8mb4;




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
) ENGINE=InnoDB AUTO_INCREMENT=11111187 DEFAULT CHARSET=utf8mb4;

INSERT INTO patients VALUES("11111111","Shri","brijesh pal singh","1973-11-12","M","1","2022-09-01","cash","","300");
INSERT INTO patients VALUES("11111112","Ku.","Amogh richhraiya","2007-07-07","M","2","2022-09-01","cash","","300");
INSERT INTO patients VALUES("11111113","Shri","neeru richarikala","1987-11-11","F","3","2022-09-01","cash","","300");
INSERT INTO patients VALUES("11111114","Shri","maya yadav","1967-01-01","F","4","2022-09-01","cash","","300");
INSERT INTO patients VALUES("11111115","Smt.","Deepak rajak","1987-01-01","M","5","2022-09-01","cash","","300");
INSERT INTO patients VALUES("11111116","Shri","Manju rajak","1992-01-01","F","6","2022-09-01","cash","","300");
INSERT INTO patients VALUES("11111117","Smt.","yogesh kumar","2003-01-01","M","7","2022-09-01","cash","","300");
INSERT INTO patients VALUES("11111118","Smt.","shivanshu shrivastav","2000-01-01","M","8","2022-09-01","cash","","300");
INSERT INTO patients VALUES("11111119","Smt.","mahendra singh","1989-07-02","M","9","2022-09-01","cash","","300");
INSERT INTO patients VALUES("11111120","Shri","Sadhna moury","2000-09-16","F","10","2022-09-01","cash","","300");
INSERT INTO patients VALUES("11111121","Shri","raj kumari jatav","1990-01-01","F","11","2022-09-01","cash","","300");
INSERT INTO patients VALUES("11111122","Smt.","Ram kumari sharma","1972-01-01","F","1","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111123","Shri","  usha kourav","1971-01-01","F","2","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111124","Ku.","mushkan rawat","2011-01-01","F","3","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111125","Shri","vinit sharma","1988-01-01","M","4","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111126","Ku.","rishav kumar","2015-01-01","M","5","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111127","Shri","pratap singh rajpoot","1950-01-01","M","6","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111128","Shri","bal kishn sharma","1971-01-01","M","7","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111129","Shri","Ankit garg","1989-01-01","M","8","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111130","Shri","Resham yadav","1979-01-01","M","9","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111131","Shri","Bharat singh","1980-01-01","M","10","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111132","Smt.","Neelam jatav","1997-01-01","F","11","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111133","Smt.","Rabiya khan","1987-01-01","F","12","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111134","Smt.","Meena goswami","1963-01-01","F","13","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111135","Smt.","Anushka goyal","2011-01-01","F","14","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111136","Ku.","ananiya goswami","2011-01-01","F","15","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111137","Shri","Aryan joshi","2003-01-01","M","16","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111138","Smt.","sushila bangal","1957-01-01","F","17","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111139","Smt.","Rupali shinde","1998-01-01","F","18","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111140","Shri","    Pratap singh","1963-01-01","M","19","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111141","Smt.","      Saroj shrivastav","1962-01-01","F","20","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111142","Smt.","Sanam gudiyal","1999-01-01","F","21","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111143","Shri","Pahad singh","1982-01-01","M","22","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111144","Smt.","Maya devi","1977-01-01","F","23","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111145","Shri","Ramesh chand kushwha","1958-01-01","M","24","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111146","Shri","Dr m p rajpoot","1948-01-01","M","25","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111147","Smt.","Meera garg","1969-01-01","F","26","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111148","Shri","  GOVIND  THAGLE","1967-01-01","M","27","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111149","Shri","Rajendra kumar jain","1967-01-01","M","28","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111150","Smt.","Rani bhorse","1993-01-01","F","29","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111151","Smt.","kapoori devi","1952-01-01","F","30","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111152","Smt.","Shefali gupta","1992-11-05","F","31","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111153","Ku.","akshara nigam","2012-01-01","F","32","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111154","Smt.","Rekha nigam","1972-01-01","F","33","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111155","Smt.","Rekha tripathi","1972-01-01","F","34","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111156","Shri","NIKIN     AGARWAL","1984-01-01","M","35","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111157","Ku.","KASHVI     GUPTA","2017-01-01","F","36","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111158","Smt.","premlata","1980-01-01","F","37","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111159","Ku.","MANSHV   IBATRA","2013-01-01","F","38","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111160","Smt.","PARWATI  SHAKYA","1962-01-01","F","39","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111161","Shri","chote    lal kushwah","1982-01-01","M","40","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111162","Shri","ak","2022-01-01","M","41","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111163","Smt.","Kamla Gupta","1962-01-01","F","42","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111164","Smt.","Rani Devi","1952-01-01","F","43","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111165","Smt.","Anjana Pal","1987-01-01","F","44","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111166","Shri","Krishna Pal","1975-01-01","M","45","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111167","Smt.","Savarna Khatri","1949-01-01","F","46","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111168","Smt.","Ranjana    Gaur","1975-01-01","F","47","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111169","Shri","Ajay  Surve","1968-01-01","M","48","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111170","Shri","Rishab   chaurasiya","2002-01-01","M","49","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111171","Shri","Nafees  be","1957-01-01","F","50","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111172","Smt.","Shiksha sharma","1979-01-01","F","51","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111173","Shri","pratap singh  kushwah","1977-01-01","M","52","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111174","Shri","Kamal Motwani","1964-01-01","M","53","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111175","Smt.","Ritika Vadhwani","1980-01-01","F","54","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111176","Shri","Kallu gour","1987-12-19","M","55","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111177","Shri","kritesh suri ","1962-01-01","M","56","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111178","Smt.","asha suri ","1962-01-01","F","57","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111179","Smt.","shabanam  khan","1977-01-01","F","58","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111180","Shri","savar khan","1986-01-01","M","59","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111181","Ku.","ashma ali ","1997-01-01","F","60","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111182","Smt.","pushpa sharma ","1970-01-01","F","61","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111183","Shri","akash  prajapati ","1997-01-01","M","62","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111184","Smt.","bindiya sharma ","1980-01-01","F","63","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111185","Shri","HARSHIT VARSHNEY S/O GOPAL SHANKAR VARSHNEY","40","M","64","2022-09-08","cash","","300");
INSERT INTO patients VALUES("11111186","Shri","HARSHIT VARSHNEY S/O GOPAL SHANKAR VARSHNEY","4","M","1","2022-10-02","cash","","300");



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
INSERT INTO rate VALUES("17","checkup","300");



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `access_level` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("1","admin","Harshit Varshney","2209dc2b272cf24e9d9cc3302a10ff89","harshitvarshney39@gmail.com","admin");
INSERT INTO users VALUES("19","kvmeh","Hospital Admin","0b25a92997c77569c1142a2c6f86767a","contact@kvmeyehospital.com","admin");

