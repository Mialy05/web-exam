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
INSERT INTO utilisateur VALUES("","sarobidy","bidy","sarobidy@gmail.com","456");
INSERT INTO utilisateur VALUES("","mialisoa","mu","mialisoa@gmail.com","789");

-- eto 1
CREATE TABLE categorie(
    idcategorie INTEGER auto_increment,
    nom VARCHAR(50),
    primary key (idcategorie)
);

INSERT INTO categorie VALUES("","jeu");
INSERT INTO categorie VALUES("","vetement");
INSERT INTO categorie VALUES("","technologie");
INSERT INTO categorie VALUES("","art");
<<<<<<< HEAD
<<<<<<< HEAD:application/sql/script.sql
INSERT INTO categorie VALUES("","jeux");

-- table vaovao
=======
INSERT INTO categorie VALUES("","plante");
>>>>>>> mialisoa:sql/script.sql

=======
INSERT INTO categorie VALUES("","plante");
>>>>>>> c8c7c288258a650d23e1e93b8a75c4c5a4ee401f

-- eto 2
CREATE TABLE objet(
	idobjet INTEGER auto_increment,
	idproprietaire INTEGER,
	titre VARCHAR(45),
	description VARCHAR(45),
	prix DOUBLE,
	primary key(idobjet),
	foreign key(idproprietaire) references utilisateur(idutilisateur)
);
-- typephoto 0 izy principale de 1 izy tsotra
CREATE TABLE photoobjet (
	idphoto INTEGER auto_increment,
	idobjet INTEGER,
	photo VARCHAR(100),
	typephoto INTEGER,
	primary key(idphoto),
	foreign key(idobjet) references objet(idobjet)
);

CREATE TABLE objetcategorie (
	idobjet INTEGER,
	idcategorie INTEGER,
	foreign key(idobjet) references objet(idobjet),
	foreign key(idcategorie) references categorie(idcategorie)
);

insert into objet values("",1,"carte","C'est un jeu qui se joue en societe avec des cartes.",2000.0);
insert into objet values("",2,"domino","C'est un jeu de hasard mais aussi de strategie.",5000.0);
insert into objet values("",3,"hasard","C'est un jeu où seul la chance qui compte.",6000.0);
insert into objet values("",1,"echec","C'est un jeu de strategie qui se joue à deux.",15000.0);
insert into objet values("",3,"lettre","C'est un jeu de societe dont le but est la composition de mots à partir des lettres.",20000.0);
insert into objet values("",2,"telephone","C'est un appareil electronique permettant specialiement de communiquer.",150000.0);
insert into objet values("",3,"ordinateur","C'est un systeme de traitement d'information programmable.",20000000.0);
insert into objet values("",1,"robot","C'est un dispositif mecatronique conçu poiur accomplir des tâches automatiquements.",20000.0);
insert into objet values("",2,"appareil virtuel","C'est une technologie permettant de plonger dans un monde virtuel.",20000.0);
insert into objet values("",2,"sculpture","C'est un art de creer des formes en trois dimension.",1600000.0);
insert into objet values("",3,"dessin","C'est un art de representer des objets par des moyens graphiques.",10000.0);
insert into objet values("",1,"chaussure","Chaussure qui complete votre look.",150000.0);
insert into objet values("",2,"jeans","C'est un pantalon tres style.",10000.0);
insert into objet values("",3,"veste","C'est un vetements à manche longue.",2000.0);
insert into objet values("",1,"chemise","C'est un vetement qui couvre le buste et les bras .",15000.0);


insert into photoobjet values("",1,"carte1.jpg",0);
insert into photoobjet values("",1,"carte2.jpg",1);
insert into photoobjet values("",1,"carte3.jpg",0);
insert into photoobjet values("",2,"dee.jpg",0);
-- insert into photoobjet values("",2,"dee1.jpg",0);
insert into photoobjet values("",2,"dees.jpg",1);
insert into photoobjet values("",3,"hasard.jpg",0);
insert into photoobjet values("",3,"hasard1.jpg",1);
insert into photoobjet values("",4,"echec1.jpg",0);
insert into photoobjet values("",5,"lettre1.jpg",0);
insert into photoobjet values("",5,"lettre2.jpg",1);
insert into photoobjet values("",6,"telephone.jpg",1);
insert into photoobjet values("",6,"telephone1.jpg",0);
insert into photoobjet values("",7,"ordinateur.jpg",1);
insert into photoobjet values("",7,"ordinateur1.jpg",0);
insert into photoobjet values("",7,"ordinateur2.jpg",0);
insert into photoobjet values("",8,"robot.jpg",0);
insert into photoobjet values("",9,"virtuel1.jpg",1);
insert into photoobjet values("",9,"virtuel.jpg",1);
insert into photoobjet values("",10,"sculpture1.jpg",1);
insert into photoobjet values("",10,"sculpture2.jpg",0);
-- insert into photoobjet values("",10,"sculpture.jpg",0);
insert into photoobjet values("",11,"dessin.jpg",1);
insert into photoobjet values("",11,"dessin1.jpg",0);
insert into photoobjet values("",11,"dessin2.jpg",0);
-- insert into photoobjet values("",11,"dessin3.jpg",0);
insert into photoobjet values("",12,"chaussure.jpg",1);
insert into photoobjet values("",12,"chaussure1.jpg",0);
insert into photoobjet values("",13,"jeans.jpg",1);
insert into photoobjet values("",13,"jeans1.jpg",0);
insert into photoobjet values("",14,"veste.jpg",1);
insert into photoobjet values("",15,"chemise.jpg",1);
insert into photoobjet values("",15,"chemise2.jpg",0);
-- insert into photoobjet values("",15,"chemise3.jpg",0);

insert into objetcategorie values(1,5);
insert into objetcategorie values(2,5);
insert into objetcategorie values(3,5);
insert into objetcategorie values(4,5);
insert into objetcategorie values(5,5);
insert into objetcategorie values(6,3);
insert into objetcategorie values(7,3);
insert into objetcategorie values(8,3);
insert into objetcategorie values(9,3);
insert into objetcategorie values(10,4);
insert into objetcategorie values(11,4);
insert into objetcategorie values(12,2);
insert into objetcategorie values(13,2);
insert into objetcategorie values(14,2);
insert into objetcategorie values(15,2);


-- view sarobidy
create view detailobjet as 
select objet.idobjet, titre, description, prix, idproprietaire, u.nom from objet 
join utilisateur as u on idproprietaire=u.idutilisateur 
join photoobjet as p on objet.idobjet=p.idobjet
where p.typephoto = 1;
