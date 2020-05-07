CREATE TABLE `movies` (
	movieid int PRIMARY KEY AUTO_INCREMENT,
	title varchar(255) NOT NULL
);

CREATE TABLE `memberships` (
	membershipid int PRIMARY KEY AUTO_INCREMENT,
	membership varchar(50) NOT NULL,
	loanperiod int NOT NULL
);

CREATE TABLE `loans` (
	loanid int PRIMARY KEY AUTO_INCREMENT,
	firstname varchar(50) not null,
  	lastname varchar(50) not null,
  	phone varchar(50),
  	email varchar(80) not null,
  	loandate date not null,
  	returndate date not null,
  	returned boolean not null,
  	fk_movie int,
  	FOREIGN KEY (fk_movie) REFERENCES movies(movieid)
);

