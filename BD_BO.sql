DROP DATABASE NPANEL;

CREATE DATABASE IF NOT EXISTS NPANEL;
USE NPANEL;

CREATE TABLE ESTATS(
ID_ESTAT INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
ESTAT VARCHAR(200),
DETALLS VARCHAR(200)
);

CREATE TABLE CATEGORIES(
ID_CATEGORIA INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
CATEGORIA VARCHAR(200),
PREFIX VARCHAR(200),
DATA_INICI DATE,
DATA_FI DATE,
ID_ESTAT INT,
SEXE ENUM('Masculí', 'Femení'),
FOREIGN KEY (ID_ESTAT) REFERENCES ESTATS (ID_ESTAT) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE USUARIS (
ID_USUARI INT AUTO_INCREMENT PRIMARY KEY,
EMAIL VARCHAR(200),
CONTRASENYA VARCHAR(200),
NOM VARCHAR(200),
COGNOMS VARCHAR(200),
FOTO BLOB,
SEXE ENUM('Masculí', 'Femení'),
DATA_NAIXEMENT DATE,
ROL ENUM('NEDADOR', 'ENTRENADOR', 'ADMINISTRADOR'),
VALIDAT ENUM('SI', 'NO'),
ID_ESTAT INT,
FOREIGN KEY (ID_ESTAT) REFERENCES ESTATS (ID_ESTAT) ON DELETE CASCADE ON UPDATE CASCADE,
ID_CATEGORIA INT ,
FOREIGN KEY (ID_CATEGORIA) REFERENCES CATEGORIES (ID_CATEGORIA) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE COMPETICIONS (
ID_COMPETICIO INT AUTO_INCREMENT,
COMPETICIO VARCHAR(200),
DATA_HORA_1 TIMESTAMP,
DATA_HORA_2 TIMESTAMP,
LLOC VARCHAR(200),
RESULTATS VARCHAR (200),
ID_CALENDARI VARCHAR(100),
ID_ESTAT INT,
FOREIGN KEY (ID_ESTAT) REFERENCES ESTATS (ID_ESTAT) ON DELETE CASCADE ON UPDATE CASCADE,
ID_CATEGORIA INT ,
FOREIGN KEY (ID_CATEGORIA) REFERENCES CATEGORIES (ID_CATEGORIA) ON DELETE CASCADE ON UPDATE CASCADE,
PRIMARY KEY (ID_COMPETICIO, ID_ESTAT, ID_CATEGORIA)
);

CREATE TABLE PARTICIPACIONS (
ID_USUARI INT,
ID_COMPETICIO INT,
ID_ESTAT INT,
ID_CATEGORIA INT,
PRIMARY KEY (ID_USUARI, ID_COMPETICIO, ID_ESTAT, ID_CATEGORIA)
);

CREATE TABLE ACTUALITAT(
ID_BLOG INT AUTO_INCREMENT PRIMARY KEY,
TITOL VARCHAR(200),
DATA_PUBLICACIO DATE,
COMENTARI VARCHAR(1000),
FOTO BLOB 	
);


CREATE TABLE DOCUMENTS (
	ID_DOCUMENT INT AUTO_INCREMENT PRIMARY KEY,
	TITUL VARCHAR (200),
	DOCUMENT VARCHAR(200)
	);

CREATE TABLE URLS (
	ID_ENLLAS INT AUTO_INCREMENT PRIMARY KEY,
	TITUL VARCHAR (200),
	URL VARCHAR(200)
	);

CREATE TABLE GALERIES (
	ID INT AUTO_INCREMENT PRIMARY KEY,
	NOM VARCHAR (200),
	URL VARCHAR(300)
	);

CREATE TABLE FOTOS (
	ID_FOTO INT AUTO_INCREMENT,
	NOM VARCHAR (200),
	URL VARCHAR(300),
	ID_GALERIA VARCHAR (200) REFERENCES GALERIES(NOM) ON DELETE CASCADE,
	PRIMARY KEY ( ID_FOTO, ID_GALERIA)
	);

CREATE TABLE HIST_ACTUALITAT(
ID_USUARI INT REFERENCES USUARIS (ID_USUARI),
ID_BLOG INT REFERENCES ACTUALITAT (ID_BLOG),
DATA_PUBLICACIO DATETIME,
ACCIO VARCHAR(200),
PRIMARY KEY ( ID_USUARI, ID_BLOG)
);

CREATE TABLE HIST_COMPETICIONS(
ID_USUARI INT REFERENCES USUARIS (ID_USUARI),
ID_COMPETICIO INT REFERENCES COMPETICIONS (ID_COMPETICIO),
DATA_PUBLICACIO DATETIME,
ACCIO VARCHAR(200),
PRIMARY KEY ( ID_USUARI, ID_COMPETICIO)
);

CREATE TABLE HIST_DOCUMENTS(
ID_USUARI INT REFERENCES USUARIS (ID_USUARI),
ID_DOCUMENT INT REFERENCES DOCUMENTS (ID_DOCUMENT),
DATA_PUBLICACIO DATETIME,
ACCIO VARCHAR(200),
PRIMARY KEY ( ID_USUARI, ID_DOCUMENT)

);

CREATE TABLE HIST_URLS(
ID_USUARI INT REFERENCES USUARIS (ID_USUARI),
ID_ENLLAS INT REFERENCES URLS (ID_ENLLAS),
DATA_PUBLICACIO DATETIME,
ACCIO VARCHAR(200),
PRIMARY KEY ( ID_USUARI, ID_ENLLAS)
);

CREATE TABLE HIST_GALERIES(
ID_USUARI INT REFERENCES USUARIS (ID_USUARI),
ID_GALERIA INT REFERENCES GALERIES (ID_GALERIA),
DATA_PUBLICACIO DATETIME,
ACCIO VARCHAR(200),
PRIMARY KEY ( ID_USUARI, ID_GALERIA)
);

CREATE TABLE HIST_USUARIS(
ID_USUARI INT REFERENCES USUARIS (ID_USUARI),
ID_USURAI_REGISTRAT VARCHAR (200),
DATA_PUBLICACIO DATETIME,
ACCIO VARCHAR(200),
PRIMARY KEY ( ID_USUARI, ID_USURAI_REGISTRAT)
);

CREATE TABLE HIST_ESTATS(
ID_USUARI INT REFERENCES USUARIS (ID_USUARI),
ID_ESTAT INT REFERENCES ESTATS (ID_ESTAT),
DATA_PUBLICACIO DATETIME,
ACCIO VARCHAR(200),
PRIMARY KEY ( ID_USUARI, ID_ESTAT)

);

CREATE TABLE HIST_CATEGORIES(
ID_USUARI INT REFERENCES USUARIS (ID_USUARI),
ID_CATEGORIA INT REFERENCES CATEGORIES (ID_ESTAT),
DATA_PUBLICACIO DATETIME,
ACCIO VARCHAR(200),
PRIMARY KEY ( ID_USUARI, ID_CATEGORIA)

);


/* Estats */
INSERT INTO `NPANEL`.`ESTATS` (`ID_ESTAT`, `ESTAT`, `DETALLS`) VALUES (NULL, 'ESCOLAR', 'De 8 a 16 anys');
INSERT INTO `NPANEL`.`ESTATS` (`ID_ESTAT`, `ESTAT`, `DETALLS`) VALUES (NULL, 'FEDERAT', 'De 8 a 20 anys (Masculí) i de 8 a 18 anys (Femení) ');
INSERT INTO `NPANEL`.`ESTATS` (`ID_ESTAT`, `ESTAT`) VALUES (NULL, 'MASTER');

/* Categories escolars */
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`) VALUES (NULL, 'Prebenjami', 'PB', '2007-01-01', '2008-12-31', '1');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`) VALUES (NULL, 'Benjami', 'B', '2005-01-01', '2006-12-31', '1');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`) VALUES (NULL, 'Alevi', 'ALE', '2003-01-01', '2004-12-31', '1');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`) VALUES (NULL, 'Infantil', 'INF', '2001-01-01', '2002-12-31', '1');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`) VALUES (NULL, 'Juvenil', 'JUV', '1999-01-01', '2000-12-31', '1');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`) VALUES (NULL, 'Cadet', 'CAD', '1980-01-01', '1998-12-31', '1');

/* Categories federats masculí*/
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Prebenjami', 'PB', '2007-01-01', '2007-12-31', '2', 'Masculí');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Benjami', 'B', '2004-01-01', '2006-12-31', '2', 'Masculí');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Alevi', 'ALE', '2002-01-01', '2003-12-31', '2', 'Masculí');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Infantil', 'INF', '1999-01-01', '2001-12-31', '2', 'Masculí');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Juvenil', 'JUV', '1997-01-01', '1998-12-31', '2', 'Masculí');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Absolutjove', 'ABJ', '1995-01-01', '1996-12-31', '2', 'Masculí');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Absolut', 'ABS', '1980-01-01', '1994-12-31', '2', 'Masculí');
/* Categories federats femení*/
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Prebenjami', 'PB', '2007-01-01', '2007-12-31', '2', 'Femení');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Benjami', 'B', '2005-01-01', '2006-12-31', '2', 'Femení');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Alevi', 'ALE', '2003-01-01', '2004-12-31', '2', 'Femení');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Infantil', 'INF', '2001-01-01', '2002-12-31', '2', 'Femení');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Juvenil', 'JUV', '1999-01-01', '2000-12-31', '2', 'Femení');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Absolutjove', 'ABJ', '1997-01-01', '1998-12-31', '2', 'Femení');
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'Absolut', 'ABS', '1980-01-01', '1996-12-31', '2', 'Femení');
 
/* Categories Masters */
INSERT INTO `NPANEL`.`CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES (NULL, 'MASTER', 'MS', NULL, NULL, '3', NULL);


/* Usuris*/
INSERT INTO `NPANEL`.`USUARIS` (`ID_USUARI` ,`EMAIL` ,`CONTRASENYA` ,`NOM` ,`COGNOMS` ,`FOTO` ,`SEXE` ,`DATA_NAIXEMENT` ,`ROL` ,`VALIDAT` ,`ID_ESTAT` ,`ID_CATEGORIA`) VALUES (NULL , 'ffores93@gmail.com', md5('admin'), 'Francesc', 'Forés Campos', NULL , 'Masculí', '1993-07-27', 'ADMINISTRADOR', 'SI', '2', '13');


select a.ID_CATEGORIA,  b.ID_ESTAT, a.Categoria, b.ESTAT, a.SEXE, a.DATA_INICI, a.DATA_FI
from CATEGORIES as a, ESTATS as b 
where a.ID_ESTAT = b.ID_ESTAT 
and b.ESTAT = 'FEDERAT'
and ( a.DATA_INICI <= '1999-07-27' and a.DATA_FI >= '1999-07-27' )
and ( a.SEXE = 'Femení' or a.SEXE is NULL)
;