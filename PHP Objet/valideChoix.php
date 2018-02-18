
  <?php

include_once('class.user.php');
include_once("bdd.php");
include_once("sql.php");

$sql = new SQL($db);
$emprunt = $sql->empruntJeu();
$id_user = $_GET['id_user'];


?>

<h3>Votre jeu a bien été emprunté !</h3>
<a href="../emprunt.php">Emprunter un autre jeu</a>
<td><a href="../listJeuEmprunte.php/?id_user=<?php echo $id_user;?>">Voir mes jeux empruntés</a></td>
