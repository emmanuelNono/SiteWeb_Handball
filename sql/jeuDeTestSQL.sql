-- Jeu de test

use bd_hbck;

-- table personne
INSERT INTO personne (per_id, per_nom, per_prenom, per_date_nais, per_lieu_nais, per_sexe, per_mail, per_mdp, per_admin, per_redac, per_contact_ext, per_created_at, per_updated_at, per_deleted_at) VALUES (
null, "GENETAY", "Alain", "1965-05-23", "Truchtersheim", "Masculin", "alaingenetay.hbck@gmail.com", "tito", 1,0, 0, now(), null, null);
INSERT INTO personne (per_id, per_nom, per_prenom, per_date_nais, per_lieu_nais, per_sexe, per_mail, per_mdp, per_admin, per_redac, per_contact_ext, per_created_at, per_updated_at, per_deleted_at) VALUES (
null, "GALLIOZ", "Cécile", "1975-05-23", "Truchtersheim", "Masculin", "cecile@gallioz.fr", "tito", 1,0, 0, now(), null, null);
INSERT INTO personne (per_id, per_nom, per_prenom, per_date_nais, per_lieu_nais, per_sexe, per_mail, per_mdp, per_admin, per_redac, per_contact_ext, per_created_at, per_updated_at, per_deleted_at) VALUES (
null, "NONO", "Emmanuel", "1982-05-23", "Truchtersheim", "Masculin", "manuelnono@hotmail.fr", "tito", 1,0, 0, now(), null, null);
INSERT INTO personne (per_id, per_nom, per_prenom, per_date_nais, per_lieu_nais, per_sexe, per_mail, per_mdp, per_admin, per_redac, per_contact_ext, per_created_at, per_updated_at, per_deleted_at) VALUES (
null, "KOSCHIG", "Raphaël", "1982-04-26", "Truchtersheim", "Masculin", "alaingenetay.hbck@gmail.com", "tito", 1,0, 0, now(), null, null);
INSERT INTO personne (per_id, per_nom, per_prenom, per_date_nais, per_lieu_nais, per_sexe, per_mail, per_mdp, per_admin, per_redac, per_contact_ext, per_created_at, per_updated_at, per_deleted_at) VALUES (
null, "SAUVIGNON", "Dominique", "1976-03-26", "Truchtersheim", "Masculin", "alaingenetay.hbck@gmail.com", "tito", 1,0, 0, now(), null, null);


-- Table Article
INSERT INTO article(art_id, art_titre, art_contenu, art_auteur_id, art_photo_id,art_actif, art_created_at, art_updated_at, art_deleted_at) VALUES (
null,"Bienvenue","Ceci est ma première news",1, 1, 1, now(),null,null);

-- Table dde_accompagnant
INSERT INTO dde_accompagnant (dda_id, dda_lib, dda_actif, dda_created_at, dda_updated_at, dda_deleted_at) VALUES (
1, "On demande un accompagnant pour la rencontre du 25/01/2019",1,now(),null,null);

-- table equipe
INSERT INTO equipe (equ_id, equ_libelle, equ_widget_id, equ_categorie, equ_division, equ_created_at, equ_updated_at, equ_deleted_at) VALUES (
null, "SENIOR F1", "5df36c4051f99732b8cb73d2", "Senior", "National", now(), null, null);
INSERT INTO equipe (equ_id, equ_libelle, equ_widget_id, equ_categorie, equ_division, equ_created_at, equ_updated_at, equ_deleted_at) VALUES (
null, "SENIOR F2", "5df36c6751f99732b8cb73d3", "Senior", "Departemantal", now(), null, null);

-- table fonction (au sein du club)
INSERT INTO fonction (fon_id, fon_libelle, fon_created_at, fon_updated_at, fon_deleted_at) VALUES (
null, "Président", now(), null,null);
INSERT INTO fonction (fon_id, fon_libelle, fon_created_at, fon_updated_at, fon_deleted_at) VALUES (
null, "Secrétaire", now(), null,null);
INSERT INTO fonction (fon_id, fon_libelle, fon_created_at, fon_updated_at, fon_deleted_at) VALUES (
null, "Trésorier", now(), null,null);
INSERT INTO fonction (fon_id, fon_libelle, fon_created_at, fon_updated_at, fon_deleted_at) VALUES (
null, "Entraîneur", now(), null,null);
INSERT INTO fonction (fon_id, fon_libelle, fon_created_at, fon_updated_at, fon_deleted_at) VALUES (
null, "Entraîneur adjoint", now(), null,null);



-- table lien_per_fon_equ
INSERT INTO lien_per_fon_equ (lpfe_id, lpfe_per_id, lpfe_fon_id, lpfe_equ_id, lpfe_created_at, lpfe_updated_at, lpfe_deleted_at) VALUES (
null, 1,2,null, now(), null, null);

-- table photo
INSERT INTO photo (pho_id, pho_link, pho_libelle, pho_created_at, pho_updated_at, pho_deleted_at) VALUES (
null, "toto.jpg", "Illustration", now(), null, null);