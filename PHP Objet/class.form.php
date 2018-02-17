<?php

class Form{
  private $_login;
  private $_mdp;

  public function __construct($login='admin', $mdp='admin', $connexion='' ){
    $this->login= $login;
    $this->mdp =$mdp;
    $this->connexion =$connexion;
  }

  public function toHTML(){
    $htmlF = sprintf('Identifiant :', htmlspecialchars($this->login))
            . sprintf('Mot de passe :', htmlspecialchars($this->mdp));

    return $html;
  }

  public function formulaireAdmin(){
    $html = sprintf('<label>Identifiant : </label><input type="text" name="login" /><br />',htmlspecialchars($this->login))
          .sprintf('<label>Mot de passe : </label><input type="password" name="mdp" /><br />',htmlspecialchars($this->mdp))
          .sprintf('<input type="submit" value="Connexion" /><br />',htmlspecialchars($this->connexion));
    return $html;
  }

  public function validerForm(){


if (isset($_SESSION['login']) && isset ($_SESSION['mdp'])){
	echo('Votre login est '.$_SESSION['login'].'et le mdp '.$_SESSION['mdp']);
}
if (isset($_POST['login']) && isset($_POST['mdp'])){
	echo ('test1'.$_POST['login'].'<br />');
  //remplacement de $this->pdw par $this->mdp (c'est le nom de la propriété qui est définie dans ton objet que tu dois utiliser)
	if($this->login == $_POST['login'] && $this->mdp == $_POST['mdp']){
		session_start();
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['mdp'] = $_POST['mdp'];
   header('Location: form_jeu.php');
//exit();

	}

	else{
		echo('Membre non reconnu');
	}
}




  }
}

//Pas de besoin d'un tableau dans les paramètres que tu passe à ton constructeur, juste les valeurs des arguments
$form = new Form('admin', 'admin');
?>
<form name="form1" id="mainForm" method="post" enctype="multipart/form-data" action="">
  <?php
echo $form->formulaireAdmin();

if(isset($_POST)){
  $form->validerForm();
}
