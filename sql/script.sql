CREATE DATABASE takalo;
USE takalo;

CREATE TABLE utilisateur(
    idutilisateur INTEGER auto_increment, 
    nom VARCHAR(45),
    prenom VARCHAR(45),
    email VARCHAR(45) ,
    motdepasse VARCHAR(45),
    primary key (idutilisateur)
);

INSERT INTO utilisateur VALUES("","ionisoa","ionisoa","ionisoa@gmail.com","1234");