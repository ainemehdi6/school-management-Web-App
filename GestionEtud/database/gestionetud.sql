create database gestionetud;
use gestionetud;

CREATE TABLE `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id_user`)
);
INSERT INTO `users` VALUES (1,'mehdi','aine','aine','123'),(2,'EL AINE','EL MEHDI','admin@admin.com','password');

CREATE TABLE `groupe` (
  `ID_GROUPE` int NOT NULL AUTO_INCREMENT,
  `LIBELE` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_GROUPE`)
);
INSERT INTO `groupe` VALUES (1,'2021'),(2,'2022'),(3,'2023'),(4,'2024'),(5,'2025');

CREATE TABLE `professeur` (
  `id_prof` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `codeppr` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  PRIMARY KEY (`id_prof`)
);
INSERT INTO `professeur` VALUES (1,'Hanine','Mohammed','K2201','Permanant'),(2,'Baidada','Chafik','K2202','Permanant'),(3,'Dahbi','Aziz','K2203','Permanant'),(4,'Rahal','Erratahi','K2204','Vacataire'),(5,' Assad','Noureddine','K2205','Vacataire'),(6,'Motanabi','Salma','K2206','Vacataire');

CREATE TABLE `semestre` (
  `id_semestre` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) NOT NULL,
  `coefficient` double(9,2) NOT NULL,
  PRIMARY KEY (`id_semestre`)
);
INSERT INTO `semestre` VALUES (1,'semestre 1 2020/2021',0.50),(2,'semestre 2 2020/2021',0.50),(3,'semestre 1 2021/2022',0.50),(4,'semestre 2 2021/2022',0.50),(5,'semestre 1 2022/2023',0.50),(6,'semestre 2 2022/2023',0.50),(7,'semestre 1 2023/2024',0.50),(8,'semestre 2 2023/2024',0.50),(9,'semestre 1 2024/2025',0.50),(10,'semestre 2 2024/2025',0.50);

CREATE TABLE `etudiant` (
  `id_etudiant` int NOT NULL AUTO_INCREMENT,
  `code_etudiant` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `nom_ar` varchar(25) NOT NULL,
  `prenom_ar` varchar(25) NOT NULL,
  `diplome` varchar(25) NOT NULL,
  `id_groupe` int NOT NULL,
  PRIMARY KEY (`id_etudiant`),
  KEY `fk_id_groupe` (`id_groupe`),
  CONSTRAINT `fk_id_groupe` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`ID_GROUPE`) ON DELETE CASCADE
);
INSERT INTO `etudiant` VALUES (1,'K121212','EL AINE','EL MEHDI','test','test','Licence Pro',1),(3,'K12394','Jouad','Oussama','test','test','Licence Pro',1),(4,'K853133','Bergach','Khalid','test','test','Licence Pro',1),(5,'K13944','Molta','Mohamed','test','test','Licence Pro',1),(6,'K8501002','Anbari','Ilyass','test','test','Licence Pro',1),(7,'K121441','Zahir','Hamid','test','test','Licence Pro',1),(8,'K13313','Chino','Brahim','test','test','Licence Pro',1),(10,'K311212','Brofa','Oussama','test','test','Licence Pro',1),(11,'K1111','Chana','Ahmed','test','test','Licence Pro',2);

CREATE TABLE `module` (
  `id_module` int NOT NULL AUTO_INCREMENT,
  `code_module` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `coefficient` double(9,2) NOT NULL,
  `id_semestre` int NOT NULL,
  `id_prof` int NOT NULL,
  PRIMARY KEY (`id_module`),
  KEY `fk_id_semestre` (`id_semestre`),
  KEY `fk_id_professeur` (`id_prof`),
  CONSTRAINT `fk_id_professeur` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`id_prof`) ON DELETE CASCADE,
  CONSTRAINT `fk_id_semestre` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`) ON DELETE CASCADE
);
INSERT INTO `module` VALUES (1,'01','JavaUML',0.50,1,2),(2,'02','Langue',0.25,1,6),(3,'03','Réseau Informatique',0.25,1,3),(4,'04','Systéme d\'information',0.25,2,1),(5,'122','Génie Logiciel',0.50,2,5),(6,'07','Web',0.25,2,4);

CREATE TABLE `examen` (
  `id_examen` int NOT NULL AUTO_INCREMENT,
  `id_prof` int NOT NULL,
  `id_groupe` int NOT NULL,
  `id_module` int NOT NULL,
  `date_examen` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_examen`),
  KEY `fk_exam_id_groupe` (`id_groupe`),
  KEY `fk_exam_id_prof` (`id_prof`),
  KEY `fk_exam_id_module` (`id_module`),
  CONSTRAINT `fk_exam_id_groupe` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`ID_GROUPE`) ON DELETE CASCADE,
  CONSTRAINT `fk_exam_id_module` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE,
  CONSTRAINT `fk_exam_id_prof` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`id_prof`) ON DELETE CASCADE
);
INSERT INTO `examen` VALUES (1,1,1,4,'2022-03-27'),(2,5,1,5,'2022-03-27'),(3,4,1,6,'2022-03-20'),(4,2,1,1,'2022-03-29'),(5,6,1,2,'2022-03-12'),(6,3,1,3,'2022-03-25');

CREATE TABLE `note` (
  `id_etudiant` int NOT NULL,
  `id_examen` int NOT NULL,
  `MOYENNE` double(4,2) DEFAULT '0.00',
  KEY `fk_id_etudiant` (`id_etudiant`),
  KEY `fk_id_exam` (`id_examen`),
  CONSTRAINT `fk_id_etudiant` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`) ON DELETE CASCADE,
  CONSTRAINT `fk_id_exam` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id_examen`) ON DELETE CASCADE
);
INSERT INTO `note` VALUES (1,1,19.00),(3,1,20.00),(4,1,18.00),(5,1,17.00),(6,1,16.00),(7,1,16.00),(8,1,16.00),(10,1,10.00),(1,2,17.00),(3,2,18.00),(4,2,18.00),(5,2,17.00),(6,2,16.00),(7,2,19.00),(8,2,20.00),(10,2,10.00),(1,3,12.00),(3,3,16.00),(4,3,16.00),(5,3,18.00),(6,3,19.00),(7,3,14.00),(8,3,14.00),(10,3,10.00),(1,4,19.00),(3,4,16.00),(4,4,17.00),(5,4,16.00),(6,4,15.00),(7,4,14.00),(8,4,18.00),(10,4,10.00),(1,5,18.00),(3,5,18.00),(4,5,18.00),(5,5,18.00),(6,5,18.00),(7,5,18.00),(8,5,18.00),(10,5,10.00),(1,6,18.00),(3,6,18.00),(4,6,18.00),(5,6,16.00),(6,6,16.00),(7,6,15.00),(8,6,19.00),(10,6,10.00);

