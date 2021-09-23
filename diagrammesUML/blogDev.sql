#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        id_user            Int NOT NULL ,
        lastname_user      Varchar (20) NOT NULL ,
        firstname_user     Varchar (20) NOT NULL ,
        mail_user          Varchar (50) NOT NULL ,
        login_user         Varchar (25) NOT NULL ,
        password_user      Varchar (50) NOT NULL ,
        role_user          Bool NOT NULL ,
        statut_user        Bool NOT NULL ,
        isActiveUser_user  Bool NOT NULL ,
        isActiveAdmin_user Bool NOT NULL
	,CONSTRAINT utilisateur_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: article
#------------------------------------------------------------

CREATE TABLE article(
        id_art         Int NOT NULL ,
        title_art      Varchar (200) NOT NULL ,
        chapo_art      Varchar (1000) NOT NULL ,
        content_art    Varchar (5000) NOT NULL ,
        autor_art      Varchar (50) NOT NULL ,
        date_art       Datetime NOT NULL ,
        dateUpdate_art Datetime NOT NULL ,
        idActive_art   Bool NOT NULL ,
        id_user        Int NOT NULL
	,CONSTRAINT article_PK PRIMARY KEY (id_art)

	,CONSTRAINT article_utilisateur_FK FOREIGN KEY (id_user) REFERENCES utilisateur(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commentaire
#------------------------------------------------------------

CREATE TABLE commentaire(
        id_com         Int NOT NULL ,
        content_com    Varchar (5000) NOT NULL ,
        autor_com      Varchar (100) NOT NULL ,
        date_com       Datetime NOT NULL ,
        dateUpdate_com Datetime NOT NULL ,
        statut_com     Bool NOT NULL ,
        isActive_com   Bool NOT NULL ,
        id_art         Int NOT NULL ,
        id_user        Int NOT NULL
	,CONSTRAINT commentaire_PK PRIMARY KEY (id_com)

	,CONSTRAINT commentaire_article_FK FOREIGN KEY (id_art) REFERENCES article(id_art)
	,CONSTRAINT commentaire_utilisateur0_FK FOREIGN KEY (id_user) REFERENCES utilisateur(id_user)
)ENGINE=InnoDB;

