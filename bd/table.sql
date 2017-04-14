USE nl773507;

drop table user;
drop table account;


CREATE TABLE account(
	id int(8) NOT NULL auto_increment,
	username varchar(50) NOT NULL UNIQUE,
	password text NOT NULL,
	accountLevel int (1),
	PRIMARY KEY (id)
);


CREATE TABLE user(
	id int(8) NOT NULL,
	nom text NOT NULL,
	prenom text NOT NULL,
	mail tinytext NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id) REFERENCES account(id) ON DELETE CASCADE 
);

insert into account(username,password,accountLevel) values ("Doggo","32c35419c04e8a42920139a52d25b849",0);

insert into user values(1,"Doggo","Doggo","nico.legal21@gmail.com");

