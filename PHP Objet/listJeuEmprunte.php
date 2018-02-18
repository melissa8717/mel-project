<?php

session_start();

?>

<form name="form2" id="listJeuEmprunt" method="post" enctype="multipart/form-data" action="">
  <?php

include_once('class.jeu.php');
include_once("bdd.php");
include_once("sql.php");

$sql = new SQL($db);

$id_user = $_GET['id_user'];
$listeJeux = $sql->getJeuEmprunt($id_user);

?>
<h2><a href="../listJeu.php">Voir les jeux :</a></h2>


<table>
  <tr>
    <td><h3>Liste des jeux :</h3></td>
  </tr>
  <tr>
    <td>Numero du jeu</td>
      <td>Nom de l'emprunteur</td>
    <td>Statut du jeu</td>

    <td>Nom jeu</td>
    <td>Editeur</td>
    <td>Année de sortie</td>
    <td>Descriptif</td>
    <td>Catégorie</td>
    <td>Durée du jeu en minutes</td>
    <td>Nombre du joueurs</td>
    <td>Commentaire</td>

  </tr>
	<?php
  foreach ($listeJeux as $key => $jeux){
    $id_jeu = $jeux->getIdJeu();
    $statut = $jeux->getStatutJeu();


    //  $empruntJeu = $jeux->getJeuEmprunt();
		?>

		<tr>
      <td><?php echo $id_jeu; ?></td><td><?php echo $id_user;?></td><td><?php echo $statut;?></td><?php echo $jeux->toHTML() ;?>

		</tr>
	<?php }
	?>
	</table>
