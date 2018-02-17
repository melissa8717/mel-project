
<!DOCTYPE html>
<html dir="ltr" lang="fr-FR">
  <head>
    <meta charset="utf-8">
    <title>Bienvenue dans votre ludotèque ! </title>
  </head>

  <body>
  	<h1>Bienvenue dans votre ludothèque !</h1>
<form action="creaJeu.php">
<label>Nom du jeu : </label><input type="text" name="nom_jeu" /><br />
<label>Editeur : </label><input type="text" name="editeur" /><br />
<label>Année de sortie : </label><input type="number" name="annee_sortie" /><br />
<label>Desciptif : </label><input type="text" name="descriptif" /><br />
<label>Catégorie : </label>
<select>
<option>Familiale</option>
<option>Figurine</option>
<option>Gestion</option>
<option>Expert</option>
<option>Apéro</option>
</select<br />
<label>Durée : </label><input type="number" name="duree" /><br />
<label>Nombre de joueurs : </label><input type="number" name="nbr_joueur" /><br />
<label>Commentaire : </label><textarea></textarea><br />

<input type="submit" value="Valider" />
</form>
  </body>
</html>
