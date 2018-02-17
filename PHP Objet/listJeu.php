<?php


?>
<form name="form2" id="listJeu" method="post" enctype="multipart/form-data" action="">
  <?php

include_once('class.jeu.php');
include_once("bdd.php");
include_once("sql.php");

$sql = new SQL($db);


$listeJeux = $sql->getList();
//$listeJeux = $sql->supprimer();
?>
<h2><a href="../class.jeu.php">Créer un jeu :</a></h2>
<h2><a href="../listJeu.php">Voir les jeux :</a></h2>
<h2><a href="form_user.php">Créer un utilisateur :</a></h2>
<h2><a href="listUser.php">Voir les utilisateur :</a></h2>

<table>
  <tr>
    <td><h3>Liste des jeux :</h3></td>
  </tr>
  <tr>
    <td>Numero du jeu</td>
    <td>Nom jeu</td>
    <td>Editeur</td>
    <td>Année de sortie</td>
    <td>Descriptif</td>
    <td>Catégorie</td>
    <td>Durée du jeu en minutes</td>
    <td>Nombre du joueurs</td>
    <td>Commentaire</td>
    <td colspan="2" style="text-align:center;">Actions</td>
  </tr>
	<?php
  foreach ($listeJeux as $key => $jeux){
    $id_jeu = $jeux->getIdJeu();
		?>

		<tr>
      <td><?php echo $id_jeu; ?></td><?php echo $jeux->toHTML().'<td><a href="modifier.php/?id='.$id_jeu.'">Modifier</a></td>'.'<td><a href="supprimer.php/?id='.$id_jeu.'">Supprimer</a></td>' ;?>

		</tr>
	<?php }
	?>
	</table>
