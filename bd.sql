DROP DATABASE NATACIO;
CREATE DATABASE IF NOT EXISTS NATACIO;


USE NATACIO;
/*
DROP TABLE ACTUALITAT;
DROP TABLE DETALL_CALENDARI;
DROP TABLE DOCUMENTS;
DROP TABLE GALERIES;
DROP TABLE FOTOS;
DROP TABLE URLS;
DROP TABLE USUARIS_INTERNS;
DROP TABLE ACTIVITATS;
DROP TABLE VALIDAR_USUARIS;
*/

CREATE TABLE ACTUALITAT(
ID_BLOG INT AUTO_INCREMENT PRIMARY KEY,
TITOL VARCHAR(200),
DATA_PUBLICACIO DATE,
COMENTARI VARCHAR(1000),
FOTO BLOB 	
);

CREATE TABLE USUARIS_INTERNS (
ID_USUARI INT AUTO_INCREMENT PRIMARY KEY,

CONTRASENYA VARCHAR(200),
EMAIL VARCHAR(200),
NOM VARCHAR(200),
COGNOMS VARCHAR(200),
FOTO BLOB,
SEXE ENUM('Masculí', 'Femení'),
DATA_NAIXEMENT DATE,
ROL ENUM('NEDADOR', 'ENTRENADOR', 'ADMINISTRADOR'),
ESTAT ENUM('FEDERAT', 'ESCOLAR','MASTER'),
CATEGORIA ENUM('PB','B','ALE','INF','JUV', 'CAD','ABJ','ABS','MASTER')
);

CREATE TABLE DETALL_CALENDARI (
ID_COMPETICIO INT AUTO_INCREMENT,
COMPETICIO VARCHAR(200),
DATA_HORA_1 TIMESTAMP,
DATA_HORA_2 TIMESTAMP,
ESTAT ENUM('FEDERAT', 'ESCOLAR','MASTER'),
CATEGORIA ENUM('PB','B','ALE','INF','JUV', 'CAD','ABJ','ABS','MASTER'),
LLOC VARCHAR(200),
RESULTATS VARCHAR (200),
ID_CALENDARI VARCHAR(100),
PRIMARY KEY (ID_COMPETICIO)
);

CREATE TABLE DOCUMENTS (
	ID_DOCUMENT INT AUTO_INCREMENT PRIMARY KEY,
	TITUL VARCHAR (200),
	DOCUMENT VARCHAR(200)
	);

CREATE TABLE VALIDAR_USUARIS (
ID_USUARI INT AUTO_INCREMENT PRIMARY KEY,

CONTRASENYA VARCHAR(200),
EMAIL VARCHAR(200),
NOM VARCHAR(200),
COGNOMS VARCHAR(200),
FOTO BLOB,
SEXE ENUM('Masculí', 'Femení'),
DATA_NAIXEMENT DATE,
ROL ENUM('NEDADOR', 'ENTRENADOR', 'ADMINISTRADOR'),
ESTAT ENUM('FEDERAT', 'ESCOLAR','MASTER'),
CATEGORIA ENUM('PB','B','ALE','INF','JUV', 'CAD','ABJ','ABS','MASTER')
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
	ID_GALERIA VARCHAR (200),
	PRIMARY KEY ( ID_FOTO, ID_GALERIA)
	);
ALTER TABLE FOTOS ADD FOREIGN KEY(ID_GALERIA)
REFERENCES GALERIES(NOM) ON DELETE CASCADE;

INSERT INTO `NATACIO`.`USUARIS_INTERNS` (`CONTRASENYA`,`EMAIL`, `NOM`, `COGNOMS`, `SEXE`, `DATA_NAIXEMENT`, `ROL`, `ESTAT`, `CATEGORIA`) 
VALUES (  MD5('admin'),'ffores93@gmail.com', 'francesc', 'fores campos', 'Masculí', '1993-07-27', 'ADMINISTRADOR', 'MASTER','MASTER');

INSERT INTO `NATACIO`.`USUARIS_INTERNS` (`CONTRASENYA`,`EMAIL`, `NOM`, `COGNOMS`, `SEXE`, `DATA_NAIXEMENT`, `ROL`, `ESTAT`, `CATEGORIA`) 
VALUES (  MD5('admin'),'francesc@iesebre.com', 'francesc', 'fores campos', 'Masculí', '2000-07-27', 'ENTRENADOR', 'FEDERAT', 'ABS');

INSERT INTO `NATACIO`.`USUARIS_INTERNS` (`CONTRASENYA`,`EMAIL`, `NOM`, `COGNOMS`, `SEXE`, `DATA_NAIXEMENT`, `ROL`, `ESTAT`, `CATEGORIA`) 
VALUES (  MD5('admin'),'nedador@gmail.com', 'francesc', 'fores campos', 'Femení', '2000-07-27', 'NEDADOR', 'MASTER', 'JUV');
