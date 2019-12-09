CREATE DATABASE db_hbck;

USE db_hbck;

CREATE TABLE personne 
(per_id INT NOT NULL AUTO_INCREMENT,
 per_nom VARCHAR(255) NOT NULL,
 per_prenom VARCHAR(255) NULL,
 per_date_nais DATE NULL,
 per_lieu_nais VARCHAR(255) NULL,
 per_sexe VARCHAR(50) NOT NULL,
 per_mail VARCHAR(255) NOT NULL,
 per_mdp VARCHAR(50) NOT NULL,
 per_admin INT(1) NOT NULL DEFAULT '0',
 per_redac INT(1) NOT NULL DEFAULT '0',
 per_created_at DATETIME NOT NULL,
 PRIMARY KEY (per_id));
 
 
CREATE TABLE article
 (art_id INT NOT NULL AUTO_INCREMENT,
 art_titre VARCHAR(255) NOT NULL,
 art_contenu LONGTEXT NOT NULL,
 art_auteur_id INT NOT NULL,
 art_actif INT(1) NOT NULL,
 art_created_at DATETIME NOT NULL,
 art_updated_at DATETIME NULL,
 art_deleted_at DATETIME NULL,
 PRIMARY KEY (art_id));
 
 
 CREATE TABLE equipe
 (equ_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 equ_libelle VARCHAR(255) NOT NULL,
 equ_widget_id VARCHAR(255) NOT NULL,
 equ_categorie VARCHAR(255) NOT NULL,
 equ_division VARCHAR(255) NOT NULL,
 equ_created_at DATETIME NOT NULL,
 equ_updated_at DATETIME NULL,
 equ_deleted_at DATETIME NULL);
 
 
CREATE TABLE rencontre
 (ren_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 ren_equipe_id INT NOT NULL,
 ren_equipe_adverse VARCHAR(255) NOT NULL,
 ren_ville VARCHAR(255) NOT NULL,
 ren_nom_stade VARCHAR(255) NOT NULL,
 ren_date DATETIME NULL,
 ren_notre_score INT(3) NULL,
 ren_score_adverse INT(3) NULL,
 ren_domicile INT(1) NULL,
 ren_created_at DATETIME NOT NULL,
 fon_updated_at DATETIME NULL,
 fon_deleted_at DATETIME NULL,
 CONSTRAINT fk_ren_equ FOREIGN KEY (ren_equipe_id) REFERENCES equipe(equ_id));
 
 
CREATE TABLE fonction
 (fon_id INT NOT NULL AUTO_INCREMENT,
 fon_libelle VARCHAR(255) NOT NULL,
 fon_created_at DATETIME NOT NULL,
 fon_updated_at DATETIME NULL,
 fon_deleted_at DATETIME NULL,
 PRIMARY KEY (fon_id));

 
CREATE TABLE lien_per_fon_equ
 (lpfe_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 lpfe_per_id INT NOT NULL,
 lpfe_fon_id INT NOT NULL,
 lpfe_equ_id INT NOT NULL,
 lpfe_created_at DATETIME NOT NULL,
 lpfe_updated_at DATETIME NULL,
 lpfe_deleted_at DATETIME NULL,
 CONSTRAINT fk_lpfe_per FOREIGN KEY (lpfe_per_id) REFERENCES personne(per_id),
 CONSTRAINT fk_lpfe_fon FOREIGN KEY (lpfe_fon_id) REFERENCES fonction(fon_id),
 CONSTRAINT fk_lpfe_equ FOREIGN KEY (lpfe_equ_id) REFERENCES equipe(equ_id));
 
 
CREATE TABLE photo
 (pho_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 pho_link VARCHAR(255) NOT NULL,
 pho_libelle VARCHAR(255) NOT NULL, 
 pho_created_at DATETIME NOT NULL,
 pho_updated_at DATETIME NULL,
 pho_deleted_at DATETIME NULL);