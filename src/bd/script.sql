/* SELECT * FROM Ateliers AS At, Laboratoire AS La WHERE At.id_laboratoire = La.id_laboratoire ORDER BY At.date_atelier ASC; */

SELECT * FROM Ateliers AS A WHERE id_laboratoire = "$id_labo" ORDER BY A.date_atelier ASC;


INSERT INTO Ateliers (`id_atelier`, `nom_atelier`, `theme_atelier`, `type_atelier`, `id_laboratoire`, `lieu_atelier`, `duree_atelier`, `date_atelier`, `horaire_atelier`, `capacite_atelier`, `inscription_atelier`) 
VALUES ("$id", "$nom", "$theme", "$type", "$lieu", "$duree", "$date", "$horaire", "$capacite", "$inscription");


DELETE FROM Ateliers WHERE id_atelier = "$id_atelier" AND id_laboratoire = "$id_labo";


UPDATE Ateliers
SET nom_atelier = "$nom", theme_atelier = "$theme", type_atelier = "$type", lieu_atelier = "$theme", duree_atelier = "$duree", date_atelier = "$date", horaire_atelier = "$horaire", capacite_atelier = "$capacite", inscription_atelier = "$inscription"
WHERE id_atelier = "$id_atelier" AND id_laboratoire = "$id_labo";
