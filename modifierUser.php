<?php

include_once('class.user.php');
include_once("bdd.php");
include_once("sql.php");

$id_user = $_GET['id'];

$sql = new SQL($db);
$listeUser = $sql->getListUser();
$recupUser = $sql->getListUser($id_user);

foreach($recupUser as $user_db){
  ?>
  <form name="form2" id="user" method="post" enctype="multipart/form-data" action="">
<?php
  echo $user_db->formulaireModifier($user_db);
  ?>
</form>
<?php
}

if(isset($_POST['nom_user'])){
  var_dump($_POST);
  $sql->modifierUser($_POST);
}

?>
