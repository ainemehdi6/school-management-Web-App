create database GestionEtud;
use GestionEtud;

create table semestre(
id_semestre int not null auto_increment,
libelle varchar(25) not null,
coefficient double (9,2) not null,
CONSTRAINT pk_id_semestre PRIMARY KEY(id_semestre)
);

create table professeur(
id_prof int not null auto_increment,
nom varchar(25) not null,
prenom varchar(25) not null,
codeppr varchar(25) not null,
type varchar(25) not null,
CONSTRAINT pk_id_professeur PRIMARY KEY(id_prof)
);

create table module(
id_module int not null auto_increment,
code_module varchar(25) not null,
nom varchar(25) not null,
coefficient double (9,2) not null,
id_semestre int not null,
id_prof int not null,
CONSTRAINT pk_id_module PRIMARY KEY(id_module),
CONSTRAINT fk_id_semestre FOREIGN KEY (id_semestre)REFERENCES semestre(id_semestre) ON DELETE CASCADE,
CONSTRAINT fk_id_professeur FOREIGN KEY (id_prof)REFERENCES professeur(id_prof) ON DELETE CASCADE
);

 CREATE TABLE GROUPE(	
 ID_GROUPE  int not null auto_increment primary key, 
LIBELE VARCHAR(25) not null
);

create table etudiant(
id_etudiant int not null auto_increment,
code_etudiant varchar(25) not null,
nom varchar(25) not null,
prenom varchar(25) not null,
nom_ar varchar(25) not null,
prenom_ar varchar(25) not null,
diplome varchar(25) not null,
id_groupe int not null,
CONSTRAINT pk_id_etudiant PRIMARY KEY(id_etudiant),
CONSTRAINT fk_id_groupe FOREIGN KEY (id_groupe)REFERENCES groupe(id_groupe) ON DELETE CASCADE
);

create TABLE EXAMEN(	
id_examen int not null auto_increment primary key, 
id_prof int not null, 
id_groupe int not null, 
id_module int not null, 
date_examen VARCHAR(25),
CONSTRAINT fk_exam_id_groupe FOREIGN KEY (id_groupe)REFERENCES groupe(id_groupe) ON DELETE CASCADE,
CONSTRAINT fk_exam_id_prof FOREIGN KEY (id_prof)REFERENCES professeur(id_prof) ON DELETE CASCADE,
CONSTRAINT fk_exam_id_module FOREIGN KEY (id_module)REFERENCES module(id_module) ON DELETE CASCADE
);

CREATE TABLE NOTE(
id_etudiant int not null, 
id_examen int not null, 
MOYENNE double(4,2) DEFAULT 0,
CONSTRAINT fk_id_etudiant FOREIGN KEY (id_etudiant)REFERENCES etudiant(id_etudiant) ON DELETE CASCADE,
CONSTRAINT fk_id_exam FOREIGN KEY (id_examen)REFERENCES examen(id_examen) ON DELETE CASCADE
);

create table users(
id_user int not null auto_increment primary key,
nom varchar(25) not null, 
prenom varchar(25) not null,
username varchar(25) not null,
password varchar(25) not null
);

insert into users values(1,"mehdi","aine","aine","123");
insert into users values(2,"mehdi","aine","admin@admin.com","password");

Insert into GROUPE (ID_GROUPE,LIBELE) values (1,'2021');
Insert into GROUPE (ID_GROUPE,LIBELE) values (2,'2022');
Insert into GROUPE (ID_GROUPE,LIBELE) values (3,'2023');
Insert into GROUPE (ID_GROUPE,LIBELE) values (4,'2024');
Insert into GROUPE (ID_GROUPE,LIBELE) values (5,'2025');

Insert into ETUDIANT (CODE_ETUDIANT,NOM,PRENOM,NOM_AR,PRENOM_AR,DIPLOME,ID_GROUPE) values ('K121212','EL AINE','EL MEHDI','test','test','Licence Pro',1);
Insert into ETUDIANT (CODE_ETUDIANT,NOM,PRENOM,NOM_AR,PRENOM_AR,DIPLOME,ID_GROUPE) values ('K121212','EL AINE','EL MEHDI','AZAZ','CACC','LIcence Pro',1);
Insert into ETUDIANT (CODE_ETUDIANT,NOM,PRENOM,NOM_AR,PRENOM_AR,DIPLOME,ID_GROUPE) values ('K12394','Jouad','Oussama','test','test','Licence Pro',1);
Insert into ETUDIANT (CODE_ETUDIANT,NOM,PRENOM,NOM_AR,PRENOM_AR,DIPLOME,ID_GROUPE) values ('K853133','Bergach','Khalid','test','test','Licence Pro',1);
Insert into ETUDIANT (CODE_ETUDIANT,NOM,PRENOM,NOM_AR,PRENOM_AR,DIPLOME,ID_GROUPE) values ('K13944','Molta','Mohamed','test','test','Licence Pro',1);
Insert into ETUDIANT (CODE_ETUDIANT,NOM,PRENOM,NOM_AR,PRENOM_AR,DIPLOME,ID_GROUPE) values ('K8501002','Anbari','Ilyass','test','test','Licence Pro',1);
Insert into ETUDIANT (CODE_ETUDIANT,NOM,PRENOM,NOM_AR,PRENOM_AR,DIPLOME,ID_GROUPE) values ('K121441','Zahir','Imad','test','test','Licence Pro',1);
Insert into ETUDIANT (CODE_ETUDIANT,NOM,PRENOM,NOM_AR,PRENOM_AR,DIPLOME,ID_GROUPE) values ('K13313','Chino','Brahim','test','test','Licence Pro',1);
Insert into ETUDIANT (CODE_ETUDIANT,NOM,PRENOM,NOM_AR,PRENOM_AR,DIPLOME,ID_GROUPE) values ('K12121','Nano','Walid','test','test','Licence Pro',1);
Insert into ETUDIANT (CODE_ETUDIANT,NOM,PRENOM,NOM_AR,PRENOM_AR,DIPLOME,ID_GROUPE) values ('K311212','Brofa','Oussama','test','test','Licence Pro',1);
Insert into ETUDIANT (CODE_ETUDIANT,NOM,PRENOM,NOM_AR,PRENOM_AR,DIPLOME,ID_GROUPE) values ('K1111','Chana','Ahmed','test','test','Licence Pro',2);

Insert into PROFESSEUR (NOM,PRENOM,CODEPPR,TYPE) values ('Hanine','Mohammed','K2201','Permanant');
Insert into PROFESSEUR (NOM,PRENOM,CODEPPR,TYPE) values ('Baidada','Chafik','K2202','Permanant');
Insert into PROFESSEUR (NOM,PRENOM,CODEPPR,TYPE) values ('Dahbi','Aziz','K2203','Permanant');
Insert into PROFESSEUR (NOM,PRENOM,CODEPPR,TYPE) values ('Rahal','Erratahi','K2204','Vacataire');
Insert into PROFESSEUR (NOM,PRENOM,CODEPPR,TYPE) values (' Assad','Noureddine','K2205','Vacataire');
Insert into PROFESSEUR (NOM,PRENOM,CODEPPR,TYPE) values ('Motanabi','Salma','K2206','Vacataire');

Insert into SEMESTRE (ID_SEMESTRE,LIBELLE,COEFFICIENT) values (1,'semestre 1 2020/2021',0.5);
Insert into SEMESTRE (ID_SEMESTRE,LIBELLE,COEFFICIENT) values (2,'semestre 2 2020/2021',0.5);
Insert into SEMESTRE (ID_SEMESTRE,LIBELLE,COEFFICIENT) values (3,'semestre 1 2021/2022',0.5);
Insert into SEMESTRE (ID_SEMESTRE,LIBELLE,COEFFICIENT) values (4,'semestre 2 2021/2022',0.5);
Insert into SEMESTRE (ID_SEMESTRE,LIBELLE,COEFFICIENT) values (5,'semestre 1 2022/2023',0.5);
Insert into SEMESTRE (ID_SEMESTRE,LIBELLE,COEFFICIENT) values (6,'semestre 2 2022/2023',0.5);
Insert into SEMESTRE (ID_SEMESTRE,LIBELLE,COEFFICIENT) values (7,'semestre 1 2023/2024',0.5);
Insert into SEMESTRE (ID_SEMESTRE,LIBELLE,COEFFICIENT) values (8,'semestre 2 2023/2024',0.5);
Insert into SEMESTRE (ID_SEMESTRE,LIBELLE,COEFFICIENT) values (9,'semestre 1 2024/2025',0.5);
Insert into SEMESTRE (ID_SEMESTRE,LIBELLE,COEFFICIENT) values (10,'semestre 2 2024/2025',0.5);

Insert into MODULE (ID_MODULE,CODE_MODULE,NOM,COEFFICIENT,ID_SEMESTRE,ID_PROF) values (1,'01','JavaUML',0.5,1,2);
Insert into MODULE (ID_MODULE,CODE_MODULE,NOM,COEFFICIENT,ID_SEMESTRE,ID_PROF) values (2,'02','Langue',0.25,1,6);
Insert into MODULE (ID_MODULE,CODE_MODULE,NOM,COEFFICIENT,ID_SEMESTRE,ID_PROF) values (3,'03','Réseau Informatique',0.25,1,3);
Insert into MODULE (ID_MODULE,CODE_MODULE,NOM,COEFFICIENT,ID_SEMESTRE,ID_PROF) values (4,'04','Systéme d''information',0.25,2,1);
Insert into MODULE (ID_MODULE,CODE_MODULE,NOM,COEFFICIENT,ID_SEMESTRE,ID_PROF) values (5,'122','Génie Logiciel',0.5,2,5);
Insert into MODULE (ID_MODULE,CODE_MODULE,NOM,COEFFICIENT,ID_SEMESTRE,ID_PROF) values (6,'07','Web',0.25,2,4);


