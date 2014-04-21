#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------



SET foreign_key_checks = 0; 
DROP TABLE IF EXISTS subit;
SET foreign_key_checks = 0; 
DROP TABLE IF EXISTS Taille;
SET foreign_key_checks = 0; 
DROP TABLE IF EXISTS _Type;
SET foreign_key_checks = 0; 
DROP TABLE IF EXISTS Reparation;
SET foreign_key_checks = 0; 
DROP TABLE IF EXISTS Etat;
SET foreign_key_checks = 0; 
DROP TABLE IF EXISTS Message;
SET foreign_key_checks = 0; 
DROP TABLE IF EXISTS Location;
SET foreign_key_checks = 0; 
DROP TABLE IF EXISTS Cadenas;
SET foreign_key_checks = 0; 
DROP TABLE IF EXISTS Velo;
SET foreign_key_checks = 0; 
DROP TABLE IF EXISTS Cotisation;
SET foreign_key_checks = 0; 
DROP TABLE IF EXISTS Adherent;
SET foreign_key_checks = 0; 
DROP TABLE IF EXISTS Admin;

CREATE TABLE Adherent(
    id_adherent             int (11) Auto_increment  NOT NULL ,
    nom_adherent            Varchar (50) ,
    prenom_adherent         Varchar (50) ,
    date_naissance_adherent Date ,
    -- lieu_naissance_adherent Varchar (25) ,
    adresse_adherent        Varchar (150) ,
    code_Postal_Adherent    Int ,
    telephone_adherent      Varchar (15) ,
    adresse_mail_adherent   Varchar (50) ,
    password_adherent       Varchar (100) ,
    photo_adherent          Varchar (100) ,
    id_cotisation           Int ,
    id_location             Int ,
    PRIMARY KEY (id_adherent )
)ENGINE=InnoDB;


CREATE TABLE Admin(
    id_admin int (11) Auto_increment  NOT NULL ,
    pseudo_admin varchar(50),
    password_admin varchar(100),
    PRIMARY KEY (id_admin)
)ENGINE=InnoDB;

CREATE TABLE Cotisation(
    id_cotisation int (11) Auto_increment  NOT NULL ,
    id_adherent   Int ,
    PRIMARY KEY (id_cotisation )
)ENGINE=InnoDB;


CREATE TABLE Velo(
    id_velo     int (11) Auto_increment  NOT NULL ,
    id_location Int ,
    id_Etat     Int ,
    id_adherent Int ,
    id_taille   Int ,
    id_type     Int ,
    PRIMARY KEY (id_velo )
)ENGINE=InnoDB;


CREATE TABLE Cadenas(
    id_cadenas int (11) Auto_increment  NOT NULL ,
    id_velo    Int ,
    PRIMARY KEY (id_cadenas )
)ENGINE=InnoDB;


CREATE TABLE Location(
    id_location          int (11) Auto_increment  NOT NULL ,
    prix_location        Float ,
    date_location        Date ,
    date_depart_location Date ,
    date_retour_location Date ,
    id_velo              Int ,
    id_adherent          Int ,
    id_Etat              Int ,
    PRIMARY KEY (id_location )
)ENGINE=InnoDB;


CREATE TABLE Message(
    id_message           int (11) Auto_increment  NOT NULL ,
    contenu_message      Text ,
    id_adherent          Int ,
    id_adherent_Adherent Int ,
    PRIMARY KEY (id_message )
)ENGINE=InnoDB;


CREATE TABLE Etat(
    id_Etat      int (11) Auto_increment  NOT NULL ,
    libelle_etat Varchar (100) ,
    PRIMARY KEY (id_Etat )
)ENGINE=InnoDB;


CREATE TABLE Reparation(
    id_reparation          int (11) Auto_increment  NOT NULL ,
    description_reparation Text ,
    prix_reparation        Float ,
    PRIMARY KEY (id_reparation )
)ENGINE=InnoDB;


CREATE TABLE _Type(
    id_type      int (11) Auto_increment  NOT NULL ,
    libelle_type Varchar (25) ,
    PRIMARY KEY (id_type )
)ENGINE=InnoDB;


CREATE TABLE Taille(
    id_taille      int (11) Auto_increment  NOT NULL ,
    libelle_taille Varchar (25) ,
    PRIMARY KEY (id_taille )
)ENGINE=InnoDB;


CREATE TABLE subit(
    id_velo       Int NOT NULL ,
    id_reparation Int NOT NULL ,
    PRIMARY KEY (id_velo ,id_reparation )
)ENGINE=InnoDB;

ALTER TABLE Adherent ADD CONSTRAINT FK_Adherent_id_cotisation FOREIGN KEY (id_cotisation) REFERENCES Cotisation(id_cotisation);
ALTER TABLE Adherent ADD CONSTRAINT FK_Adherent_id_location FOREIGN KEY (id_location) REFERENCES Location(id_location);
ALTER TABLE Cotisation ADD CONSTRAINT FK_Cotisation_id_adherent FOREIGN KEY (id_adherent) REFERENCES Adherent(id_adherent);
ALTER TABLE Velo ADD CONSTRAINT FK_Velo_id_location FOREIGN KEY (id_location) REFERENCES Location(id_location);
ALTER TABLE Velo ADD CONSTRAINT FK_Velo_id_Etat FOREIGN KEY (id_Etat) REFERENCES Etat(id_Etat);
ALTER TABLE Velo ADD CONSTRAINT FK_Velo_id_adherent FOREIGN KEY (id_adherent) REFERENCES Adherent(id_adherent);
ALTER TABLE Velo ADD CONSTRAINT FK_Velo_id_taille FOREIGN KEY (id_taille) REFERENCES Taille(id_taille);
ALTER TABLE Velo ADD CONSTRAINT FK_Velo_id_type FOREIGN KEY (id_type) REFERENCES _Type(id_type);
ALTER TABLE Cadenas ADD CONSTRAINT FK_Cadenas_id_velo FOREIGN KEY (id_velo) REFERENCES Velo(id_velo);
ALTER TABLE Location ADD CONSTRAINT FK_Location_id_velo FOREIGN KEY (id_velo) REFERENCES Velo(id_velo);
ALTER TABLE Location ADD CONSTRAINT FK_Location_id_adherent FOREIGN KEY (id_adherent) REFERENCES Adherent(id_adherent);
ALTER TABLE Location ADD CONSTRAINT FK_Location_id_Etat FOREIGN KEY (id_Etat) REFERENCES Etat(id_Etat);
ALTER TABLE Message ADD CONSTRAINT FK_Message_id_adherent FOREIGN KEY (id_adherent) REFERENCES Adherent(id_adherent);
ALTER TABLE Message ADD CONSTRAINT FK_Message_id_adherent_Adherent FOREIGN KEY (id_adherent_Adherent) REFERENCES Adherent(id_adherent);
ALTER TABLE subit ADD CONSTRAINT FK_subit_id_velo FOREIGN KEY (id_velo) REFERENCES Velo(id_velo);
ALTER TABLE subit ADD CONSTRAINT FK_subit_id_reparation FOREIGN KEY (id_reparation) REFERENCES Reparation(id_reparation);

-- Ajout d'un adhérent bidon de test
INSERT INTO Adherent VALUES (null,'Limballe','Pierre','1995-08-04','1 rue gaston defferre Belfort','90000','0688370492','a@a.fr','1337',null,null,null);
--Ajout  d'un Admin
INSERT INTO Admin VALUES (null,'Admin','Admin');