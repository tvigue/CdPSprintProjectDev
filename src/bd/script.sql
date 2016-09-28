SELECT * FROM Ateliers AS At, Laboratoire AS La WHERE At.id_laboratoire = La.id_laboratoire ORDER BY At.date_atelier ASC;

SELECT * FROM Ateliers WHERE id_laboratoire ="$id_labo";

INSERT INTO Ateliers (name_atelier,theme_atelier,type_atelier,lieu_atelier,duree_atelier,date_atelier,horaire_atelier,capacite,inscription)
VALUES ("$name","$theme","$type","$lieu","$duree","$date","$horaire","$capacite","$inscription");

DELETE FROM Ateliers where id_atelier = "$id_atelier" AND id_labo = "$id_labo";

UPDATE Ateliers
SET name_atelier = "$name",theme_atelier="$theme", type_atelier="$type", lieu_atelier="$theme", duree_atelier="$duree", date_atelier="$date", horaire_atelier="$horaire", capacite="$capacite", inscription="$inscription"
WHERE id_atelier = "$id_atelier" AND id_labo = "$id_labo";
