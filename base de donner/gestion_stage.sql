drop database if exists gestion_stage;
create database if not exists gestion_stage;
use gestion_stage;
create table stagiaire(
idStagiaire int(4) auto_increment primary key,
 nom varchar(50),
 prenom varchar(50),
 civilite varchar(1),
 photo varchar(100),
 niveau varchar(50),
 idFiliere int(4)
);
create table Filiere(
 idFiliere int(4) auto_increment primary key,
 nomFiliere varchar(50),
 niveau varchar(50)
);
create table utilisateur(
idUser int(4) auto_increment primary key,
login varchar(50),
email varchar(255) unique,
role varchar(50),
etat int(1),
pwd varchar(255)
);
alter table stagiaire add constraint foreign key(idFiliere) references Filiere(idFiliere);
INSERT INTO Filiere(nomFiliere,niveau) VALUES
('TSDI','TS'),
('TSGI','TS'),
('TRI','TS'),
('TCE','T'),
('TGI','T'),
('ID','TS'),
('SMI','L'),
('SMA','L'),
('SMP','L'),
('SMP','L'),
('SMC','L'),
('SVU','L'),
('DD','TS'),
('MQL','M'),
('MSID','M'),
('WIST','M'),
('SMRT','M'),
('MQL','M'),
('MSID','M'),
('WIST','M'),
('SMRT','M'),
('TR','Q'),
('TS','Q'),
('TA','Q'),
('TZ','Q'),
('TSDI','TS'),
('TSGI','TS'),
('TRI','TS'),
('TCE','T'),
('TGI','T'),
('ID','TS'),
('SMI','L'),
('SMA','L'),
('SMP','L'),
('SMP','L'),
('SMC','L'),
('SVU','L'),
('DD','TS'),
('MQL','M'),
('MSID','M'),
('WIST','M'),
('SMRT','M'),
('MQL','M'),
('MSID','M'),
('WIST','M'),
('SMRT','M'),
('TR','Q'),
('TS','Q'),
('TA','Q'),
('TZ','Q'),
('TN','Q');

INSERT INTO utilisateur(login,email,role,etat,pwd) VALUES
('admin','mehdifedini10@gmail.com','ADMIN',1,md5('123')),
('user1','user1@gmail.com','VISITEUR',0,md5('123')),
('user2','user2@gmail.com','VISITEUR',1,md5('123'));
INSERT INTO stagiaire(nom,prenom,civilite,photo,idFiliere) VALUES
('SAADAOUI','MOHAMMED','M','hello0.jpg',1),
('EL FEDINI','EL MEHDI','M','hello1.jpg',2),
('EDARKAOUI','NADIA','F','hello2.jpg',3),
('SAADAOUI','MOHAMMED','M','hello0.jpg',1),
('EL FEDINI','EL MEHDI','M','hello1.jpg',2),
('EDARKAOUI','NADIA','F','hello2.jpg',3),
('SAADAOUI','MOHAMMED','M','hello0.jpg',1),
('EL FEDINI','EL MEHDI','M','hello1.jpg',2),
('EDARKAOUI','NADIA','F','hello2.jpg',3),
('SAADAOUI','MOHAMMED','M','hello0.jpg',1),
('EL FEDINI','EL MEHDI','M','hello1.jpg',2),
('EDARKAOUI','NADIA','F','hello2.jpg',3);
select * from stagiaire;
select *from Filiere;
select * from utilisateur;
