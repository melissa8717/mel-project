
<form name="form2" id="connexion" method="post" enctype="multipart/form-data" action="">
  <?php

include_once('class.user.php');


include_once("bdd.php");
include_once("sql.php");
$sql = new SQL($db);
$formCo = new User();


echo $formCo->formulaireConnexionUser();

//$connexion = $sql->getUser($id_user);

if(isset($_POST['nom_user'])){
  $sql->connexionUser($_POST);

}
?>
