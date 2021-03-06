<?php
class Sql{

	private $_db;


public function __construct($db){

	$this->setDb($db);

}

public function getList()
{
	$jeus =[];

	$q = $this->_db->query('SELECT id_jeu, nomJeu, editeur, anneeSortie, categorie, commentaire, descriptif, nbrJoueur, duree, statut from ludo');

	while ($donnes = $q->fetch(PDO::FETCH_ASSOC)){
		$jeus[] = new Jeu($donnes);
	}

	return $jeus;
}


	public function setDb(PDO $db){
		$this->_db = $db;
	}

public function addJeu(){

if (isset($_POST['nom_jeu'])  ){
    $q = $this->_db->prepare("INSERT INTO ludo (nomJeu, editeur, anneeSortie, categorie, commentaire, descriptif, nbrJoueur, duree) VALUES( :nomJeu, :editeur, :anneeSortie, :categorie, :commentaire, :descriptif, :nbrJoueur, :duree)");
		$nomJeu = $_POST['nom_jeu'];
		$editeur = $_POST['editeur'];
		$anneeSortie = $_POST['annee_sortie'];
		$categorie = $_POST['categorie'];
		$commentaire = $_POST['commentaire'];
		$descriptif = $_POST['descriptif'];
		$nbrJoueur = $_POST['nbr_joueur'];
		$duree = $_POST['duree'];
    $q->bindParam(':nomJeu', $nomJeu);
		$q->bindParam(':editeur', $editeur);
		$q->bindParam(':anneeSortie', $anneeSortie);
		$q->bindParam(':categorie', $categorie);
		$q->bindParam(':commentaire', $commentaire);
		$q->bindParam(':descriptif', $descriptif);
		$q->bindParam(':nbrJoueur', $nbrJoueur);
		$q->bindParam(':duree', $duree);

    $q->execute();
		header('Location: listJeu.php');

  }
  else {
    echo 'Données non valides';
  }

}


public function recupJeu($id_jeu){
	$q =$this ->_db->prepare('SELECT id_jeu, nomJeu, editeur, anneeSortie, categorie, commentaire, descriptif, nbrJoueur, duree from ludo WHERE id_jeu = :id_jeu');
  $q->bindParam(':id_jeu', $id_jeu);

	$q->execute();

	while ($donnes = $q->fetch(PDO::FETCH_ASSOC)){
		$recup[] = new Jeu($donnes);

	return $recup;
	}

}


public function supprimer($id_jeu){
	$q= $this->_db->prepare ('DELETE from ludo where  id_jeu= :id_jeu');
	$id_jeu = $_GET['id'];

	$q->bindParam(':id_jeu', $id_jeu);

	$q->execute();
	header('Location: ../listJeu.php');

}

public function modifier(){
	$q = $this->_db->prepare('UPDATE ludo set nomJeu =  :nomJeu where id_jeu = :id_jeu ');
	$nomJeu = $_POST['nom_jeu'];
	$id_jeu = $_GET['id'];
	$q->bindParam(':id_jeu', $id_jeu);
	$q->bindParam(':nomJeu', $nomJeu);

	$q->execute();
	header('Location: ../listJeu.php');
}

public function addUser(){

if (isset($_POST['nom_user'])  ){
	//INSERT INTO `ludo` (`id_jeu`, `nomJeu`, `editeur`, `anneeSortie`, `descriptif`, `categorie`, `duree`, `nbrJoueur`, `commentaire`) VALUES (NULL, 'Jeu tournoi', 'jml', '2015', 'Jeu de tournoi', 'Familiale', '30', '2', 'Commentaire');
		$q = $this->_db->prepare("INSERT INTO user (nom_user, mdp_user) VALUES( :nom_user, :mdp_user)");
		$nom_user = $_POST['nom_user'];
		$mdp_user = $_POST['mdp_user'];

		$q->bindParam(':nom_user', $nom_user);
		$q->bindParam(':mdp_user', $mdp_user);
		$q->execute();

		header('Location: listUser.php');

	}
	else {
		echo 'Données non valides';
	}

}

public function getListUser(){
	$q =$this ->_db->prepare('SELECT id_user, nom_user, mdp_user from user ');
	$q->execute();

	while ($donnes = $q->fetch(PDO::FETCH_ASSOC)){
		$getUser[] = new User($donnes);

	return $getUser;
	}
}


public function getUser($id_user){
	$q =$this ->_db->prepare('SELECT id_user, nom_user, mdp_user from user WHERE id_user = :id_user');
	$id_user = $_GET['id_user'];
  $q->bindParam(':id_user', $id_user);

	$q->execute();

	while ($donnes = $q->fetch(PDO::FETCH_ASSOC)){
		$getUser[] = new User($getUser);

	return $getUser;
	}

}



public function modifierUser(){

	$q = $this->_db->prepare('UPDATE user set nom_user =  :nom_user where id_user = :id_user ');
	$nom_user = $_POST['nom_user'];
	$id_user = $_GET['id'];
	$q->bindParam(':id_user', $id_user);
	$q->bindParam(':nom_user', $nom_user);
	$q->execute();

	//header('Location: ../listUser.php');
}


public function getListUsers()
{
	$users =[];

	$q = $this->_db->query('SELECT id_user, nom_user, mdp_user from user');

	while ($donnes = $q->fetch(PDO::FETCH_ASSOC)){
		$users[] = new User($donnes);
	}

	return $users;
}


public function supprimerUser($id_user){
	$q= $this->_db->prepare ('DELETE from user where  id_user= :id_user');
	$id_user= $_GET['id'];

	$q->bindParam(':id_user', $id_user);
	$q->execute();
	header('Location: ../listUser.php');

	}


	 public function connexionUser($data){
		 if (isset($data['nom_user']) && isset($data['mdp_user'])){
			 // REquete pour valider le mot de passe;
			 $query = $this->_db->prepare('SELECT mdp_user FROM user where nom_user = :nom_user');
			 $query->bindParam(':nom_user', $data['nom_user']);
			 $query->execute();
			 $mdp_db = $query->fetch(PDO::FETCH_ASSOC);

	  //remplacement de $this->pdw par $this->mdp (c'est le nom de la propriété qui est définie dans ton objet que tu dois utiliser)
		if($mdp_db['mdp_user'] == $data['mdp_user']){
			session_start();
			$_SESSION['nom_user'] = $_POST['nom_user'];
			$_SESSION['mdp_user'] = $_POST['mdp_user'];
	  header('Location: emprunt.php');
	//exit();

		}

}


}

public function empruntJeu(){



	$q = $this->_db->prepare('UPDATE ludo set statut = "Emprunté", id_user = :id_user where id_jeu = :id_jeu ');
	$id_jeu = $_GET['id'];
	$id_user = $_GET['id_user'];
	$q->bindParam(':id_user', $id_user);
	$q->bindParam(':id_jeu', $id_jeu);
	$q->execute();
}

public function getIdUser($nom_user){

		$query = $this->_db->prepare('SELECT id_user FROM user where nom_user = :nom_user');
		$query->bindParam(':nom_user', $nom_user);
		$query->execute();
		$id_user = $query->fetch(PDO::FETCH_ASSOC);

		return $id_user['id_user'];

 }


public function getJeuEmprunt($id_user){
	$query = $this->_db->prepare('SELECT * FROM ludo WHERE id_user = :id_user');
	$query->bindParam(':id_user', $id_user);
	$query->execute();

	while ($donnes = $query->fetch(PDO::FETCH_ASSOC)){
		$jeux[] = new Jeu($donnes);
	}

	return $jeux;
	}
}
