

CREATE TABLE WRITERS(
	email varchar(256) NOT NULL, 
	PRIMARY KEY(email),
	UNIQUE id(email),
	firstName varchar(25),
	lastName varchar(25),
	aboutMe varchar(1024),
	SampleArticle varchar(8192)
);

