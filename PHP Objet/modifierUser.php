<?php

include_once('class.user.php');
include_once("bdd.php");
include_once("sql.php");

$id_user = $_GET['id'];

$sql = new SQL($db);
$listeUser = $sql->getListUser($id_user);
//this one
$recupUser = $sql->getListUsers();
//all

foreach($listeUser as $user_db){
  ?>
  <form name="form2" id="user" method="post" enctype="multipart/form-data" action="">
<?php
  echo $user_db->formulaireModifier($user_db);
  ?>
</form>
<?php
}

if(isset($_POST['nom_user'])){
  $sql->modifierUser($_POST);
}

?>
