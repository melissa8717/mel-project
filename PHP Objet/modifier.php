<?php

include_once('class.jeu.php');
include_once("bdd.php");
include_once("sql.php");

$id_jeu = $_GET['id'];

$sql = new SQL($db);
$listeJeux = $sql->getList();
$recup = $sql->recupJeu($id_jeu);

foreach($recup as $jeu_db){
  ?>
  <form name="form2" id="jeu" method="post" enctype="multipart/form-data" action="">
<?php
  echo $jeu_db->formulaireModifier($jeu_db);
  ?>
</form>
<?php
}

if(isset($_POST['nom_jeu'])){
  var_dump($_POST);
  $sql->modifier($_POST);
}

?>
