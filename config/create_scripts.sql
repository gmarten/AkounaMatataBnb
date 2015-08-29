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
  locale VARCHAR(20) PRIMARY KEY NOT NULL,
  language VARCHAR(20) NOT NULL
);
CREATE TABLE website
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL
);
CREATE TABLE tagname
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  websiteID INT,
  eventID INT
);
CREATE TABLE tagcontent
(
  tagnameID INT,
  lang VARCHAR(20),
  content VARCHAR(40)
);
CREATE TABLE paragraph
(
  tagnameID INT,
  lang VARCHAR(20),
  content TEXT
);
CREATE TABLE event
(
  eventNumber INT PRIMARY KEY NOT NULL
);

ALTER TABLE website ADD UNIQUE KEY (name);
ALTER TABLE tagcontent ADD FOREIGN KEY (lang) REFERENCES language (locale) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE tagcontent ADD FOREIGN KEY (tagnameID) REFERENCES tagname (id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE tagcontent ADD PRIMARY KEY (tagnameID, lang);
ALTER TABLE tagname ADD FOREIGN KEY (websiteID) REFERENCES website (id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE tagname ADD FOREIGN KEY (eventID) REFERENCES event (eventNumber) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE tagname  ADD UNIQUE KEY (name, websiteID, eventID);
ALTER TABLE paragraph ADD FOREIGN KEY (lang) REFERENCES language (locale) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE paragraph ADD FOREIGN KEY (tagnameID) REFERENCES tagname (id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE paragraph ADD PRIMARY KEY (tagnameID, lang);

SET DEFINE OFF;

INSERT INTO language (locale, language) VALUES ('en', 'English');
INSERT INTO language (locale, language) VALUES ('de', 'Deutsch');
INSERT INTO language (locale, language) VALUES ('fr', 'Francais');
INSERT INTO language (locale, language) VALUES ('nl', 'Nederlands');
INSERT INTO user (login, passwd) VALUES ('cristina', 'wilder');
INSERT INTO event (eventNumber) VALUES (0);

INSERT INTO website (id, name) VALUES (1, 'header');
INSERT INTO website (id, name) VALUES (2, 'home');
INSERT INTO website (id, name) VALUES (3, 'rooms');
INSERT INTO website (id, name) VALUES (4, 'arrangements');
INSERT INTO website (id, name) VALUES (5, 'guestbook');
INSERT INTO website (id, name) VALUES (6, 'contact');
INSERT INTO website (id, name) VALUES (7, 'poi');

INSERT INTO tagname (id, name, websiteID, eventID) VALUES (1, 'home', 1, 0);
INSERT INTO tagname (id, name, websiteID, eventID) VALUES (2, 'rooms', 1, 0);
INSERT INTO tagname (id, name, websiteID, eventID) VALUES (3, 'arrangements', 1, 0);
INSERT INTO tagname (id, name, websiteID, eventID) VALUES (4, 'guestbook', 1, 0);
INSERT INTO tagname (id, name, websiteID, eventID) VALUES (5, 'contact', 1, 0);
INSERT INTO tagname (id, name, websiteID, eventID) VALUES (6, 'poi', 1, 0);
INSERT INTO tagname (id, name, websiteID, eventID) VALUES (7, 'paragraph_main_1', 2, 0);

INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('en', 1, 'Home');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('de', 1, 'Startseite');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('fr', 1, 'Accueil');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('nl', 1, 'Home');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('en', 2, 'Rooms & prices');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('de', 2, 'Zimmer & Preise');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('fr', 2, 'Chambres & tarifs');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('nl', 2, 'Kamers & Prijzen');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('en', 3, 'Arrangements');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('de', 3, 'Einrichtungen');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('fr', 3, 'Arrangements');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('nl', 3, 'Arrangementen');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('en', 4, 'Guestbook');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('de', 4, 'Gästebuch');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('fr', 4, 'Livre d''or');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('nl', 4, 'Gastenboek');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('en', 5, 'Contact');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('de', 5, 'Kontakt');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('fr', 5, 'Contacte');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('nl', 5, 'Contact');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('en', 6, 'Points of interest');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('de', 6, 'Sehenswürdigkeiten');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('fr', 6, 'Points d''intérêts');
INSERT INTO tagcontent (lang, tagnameID, content) VALUES ('nl', 6, 'Bezienswaardigheden');
INSERT INTO paragraph (lang, tagnameID, content) VALUES ('en', 7, '');
INSERT INTO paragraph (lang, tagnameID, content) VALUES ('de', 7, '');
INSERT INTO paragraph (lang, tagnameID, content) VALUES ('fr', 7, '');
INSERT INTO paragraph (lang, tagnameID, content) VALUES ('nl', 7, '');

SET DEFINE ON;