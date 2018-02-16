<?php

include_once('class.jeu.php');

  $jeu = new Jeu();

?>
<form name="form2" id="jeu" method="post" enctype="multipart/form-data" action="">
  <?php
echo $jeu->formulaire();

include_once("bdd.php");
include_once("sql.php");

$sql = new SQL($db);

if(isset($_POST['nom_jeu'])){
  $sql->addJeu();
}
