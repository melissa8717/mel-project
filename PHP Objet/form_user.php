<?php

include_once('class.user.php');

  $user = new User();

?>
<form name="form2" id="user" method="post" enctype="multipart/form-data" action="">
  <?php
echo $user->formulaireUser();

include_once("bdd.php");
include_once("sql.php");

$sql = new SQL($db);

if(isset($_POST['nom_user']) ){
  $sql->addUser();
}
