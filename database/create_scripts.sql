create database if not exists akounamatata;
create database if not exists owa;

create user "akounamatata"@"localhost" identified by "akounamatata";
grant all on akounamatata.* to "akounamatata"@"localhost";


CREATE TABLE user
(
  login VARCHAR(20) PRIMARY KEY NOT NULL,
  passwd VARCHAR(20) NOT NULL
);
CREATE TABLE language
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  locale VARCHAR(20) NOT NULL,
  language VARCHAR(20) NOT NULL
);
CREATE TABLE website
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  website VARCHAR(20) NOT NULL
);
CREATE TABLE tagcontent
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  languageID INT,
  tagnameID INT,
  tagcontent VARCHAR(20)
);
CREATE TABLE tagname
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  tagname VARCHAR(20) NOT NULL,
  websiteID INT
);
ALTER TABLE tagcontent ADD FOREIGN KEY (languageID) REFERENCES language (id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE tagcontent ADD FOREIGN KEY (tagnameID) REFERENCES tagname (id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE tagname ADD FOREIGN KEY (websiteID) REFERENCES website (id) ON DELETE CASCADE ON UPDATE CASCADE;
