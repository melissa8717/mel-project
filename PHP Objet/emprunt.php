<?php

session_start();

?>
<form name="form2" id="listJeu" method="post" enctype="multipart/form-data" action="">
  <?php

include_once('class.jeu.php');
include_once('class.user.php');

include_once("bdd.php");
include_once("sql.php");

$sql = new SQL($db);


$listeJeux = $sql->getList();

$nom_user = $_SESSION['nom_user'];
$id_user = $sql->getIdUser($nom_user);

//$listeJeux = $sql->supprimer();
?>
<h2><a href="../listJeu.php">Voir les jeux :</a></h2>
<td><a href="../listJeuEmprunte.php/?id_user=<?php echo $id_user;?>">Voir mes jeux empruntés</a></td>


<table>
  <tr>
    <td><h3>Liste des jeux :</h3></td>
  </tr>
  <tr>
    <td>Numero du jeu</td>
    <td>Statut du jeu</td>
    <td>Nom jeu</td>
    <td>Editeur</td>
    <td>Année de sortie</td>
    <td>Descriptif</td>
    <td>Catégorie</td>
    <td>Durée du jeu en minutes</td>
    <td>Nombre du joueurs</td>
    <td>Commentaire</td>
    <td>Emprunt</td>

    <td colspan="2" style="text-align:center;">Actions</td>
  </tr>
	<?php
  foreach ($listeJeux as $key => $jeux){
    $id_jeu = $jeux->getIdJeu();
    $statut = $jeux->getStatutJeu();

?>

		<tr>
      <td><?php echo $id_jeu; ?></td><td><?php echo $statut; ?></td><td><?php echo $jeux->toHTML(); ?></td><td><?php if($statut == "Libre"){ ?><a href="valideChoix.php/?id=<?php echo $id_jeu;?>&id_user=<?php echo $id_user;?>">Emprunter</a><?php }else echo "Deja emprunte" ; ?></td>

		</tr>
	<?php }
	?>
	</table>
