<?php


?>
<form name="form2" id="listusers" method="post" enctype="multipart/form-data" action="">
  <?php

include_once('class.user.php');
include_once("bdd.php");
include_once("sql.php");

$sql = new SQL($db);


$listeUser = $sql->getListUsers();
//$listeJeux = $sql->supprimer();
?>

<table>
  <tr>
    <td><h3>Liste des utilisateurs :</h3></td>
  </tr>
  <tr>
    <td>ID</td>
    <td>Nom</td>
    <td>Mot de passe</td>

    <td colspan="2" style="text-align:center;">Actions</td>
  </tr>
	<?php
  foreach ($listeUser as $key => $getUser){
    $id_user = $getUser->getIdUser();
    var_dump($getUser->toHTML());
		?>

		<tr>
      <td><?php echo $id_user; ?></td><?php echo $getUser->toHTML().'<td><a href="modifierUser.php/?id='.$id_user.'">Modifier</a> <a href="supprimerUser.php/?id='.$id_user.'">Supprimer</a></td>' ;?>

		</tr>
	<?php }
	?>
	</table>
