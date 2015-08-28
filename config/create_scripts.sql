create database if not exists akounamatata;
create database if not exists owa;

create user 'akounamatata'@'localhost' identified by 'akounamatata';
grant all on akounamatata.* to 'akounamatata'@'localhost';


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
  name VARCHAR(20) PRIMARY KEY NOT NULL
);
CREATE TABLE tagname
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  websiteID VARCHAR(20),
  eventID INT
);
CREATE TABLE tagcontent
(
  languageID INT,
  tagnameID INT,
  content VARCHAR(40)
);
CREATE TABLE paragraph
(
  languageID INT,
  tagnameID INT,
  content TEXT
);
CREATE TABLE event_image
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  eventID INT
);
CREATE TABLE event
(
  eventNumber INT PRIMARY KEY NOT NULL
);

ALTER TABLE tagcontent ADD FOREIGN KEY (languageID) REFERENCES language (id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE tagcontent ADD FOREIGN KEY (tagnameID) REFERENCES tagname (id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE tagcontent ADD PRIMARY KEY (languageID, tagnameID);
ALTER TABLE tagname ADD FOREIGN KEY (websiteID) REFERENCES website (name) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE tagname ADD FOREIGN KEY (eventID) REFERENCES event (eventNumber) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE tagname  ADD UNIQUE KEY (name, websiteID, eventID);
ALTER TABLE paragraph ADD FOREIGN KEY (languageID) REFERENCES language (id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE paragraph ADD FOREIGN KEY (tagnameID) REFERENCES tagname (id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE paragraph ADD PRIMARY KEY (languageID, tagnameID);
ALTER TABLE event_image ADD FOREIGN KEY (eventID) REFERENCES event (eventNumber) ON DELETE CASCADE ON UPDATE CASCADE;

SET DEFINE OFF;

INSERT INTO language (id, locale, language) VALUES (1, 'en', 'English');
INSERT INTO language (id, locale, language) VALUES (2, 'de', 'Deutsch');
INSERT INTO language (id, locale, language) VALUES (3, 'fr', 'Francais');
INSERT INTO language (id, locale, language) VALUES (4, 'nl', 'Nederlands');
INSERT INTO user (login, passwd) VALUES ('cristina', 'wilder');
INSERT INTO event (eventNumber) VALUES (0);

INSERT INTO website (name) VALUES ('header');
INSERT INTO website (name) VALUES ('home');
INSERT INTO website (name) VALUES ('rooms');
INSERT INTO website (name) VALUES ('arrangements');
INSERT INTO website (name) VALUES ('guestbook');
INSERT INTO website (name) VALUES ('contact');
INSERT INTO website (name) VALUES ('poi');

INSERT INTO tagname (id, name, websiteID, eventID) VALUES (1, 'home', 'header', 0);
INSERT INTO tagname (id, name, websiteID, eventID) VALUES (2, 'rooms', 'header', 0);
INSERT INTO tagname (id, name, websiteID, eventID) VALUES (3, 'arrangements', 'header', 0);
INSERT INTO tagname (id, name, websiteID, eventID) VALUES (4, 'guestbook', 'header', 0);
INSERT INTO tagname (id, name, websiteID, eventID) VALUES (5, 'contact', 'header', 0);
INSERT INTO tagname (id, name, websiteID, eventID) VALUES (6, 'poi', 'header', 0);

INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (1, 1, 'Home');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (2, 1, 'Startseite');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (3, 1, 'Accueil');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (4, 1, 'Home');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (1, 2, 'Rooms & prices');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (2, 2, 'Zimmer & Preise');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (3, 2, 'Chambres & tarifs');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (4, 2, 'Kamers & Prijzen');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (1, 3, 'Arrangements');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (2, 3, 'Einrichtungen');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (3, 3, 'Arrangements');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (4, 3, 'Arrangementen');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (1, 4, 'Guestbook');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (2, 4, 'Gästebuch');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (3, 4, 'Livre d''or');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (4, 4, 'Gastenboek');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (1, 5, 'Contact');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (2, 5, 'Kontakt');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (3, 5, 'Contacte');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (4, 5, 'Contact');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (1, 6, 'Points of interest');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (2, 6, 'Sehenswürdigkeiten');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (3, 6, 'Points d''intérêts');
INSERT INTO tagcontent (languageID, tagnameID, content) VALUES (4, 6, 'Bezienswaardigheden');


SET DEFINE ON;