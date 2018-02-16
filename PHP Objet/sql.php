<?php
class Sql{

	private $_db;
public function __construct($db){

	$this->setDb($db);

}

public function getList()
{
	$jeus =[];

	$q = $this->_db->query('SELECT id_jeu, nomJeu, editeur, anneeSortie, categorie, commentaire, descriptif, nbrJoueur, duree from ludo');

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
	//var_dump($q);

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

	var_dump($q);
	$q->execute();
}

public function modifier(){
	$q = $this->_db->prepare('UPDATE ludo set nomJeu =  :nomJeu where id_jeu = :id_jeu ');
	$nomJeu = $_POST['nom_jeu'];
	$id_jeu = $_GET['id'];
	$q->bindParam(':id_jeu', $id_jeu);
	$q->bindParam(':nomJeu', $nomJeu);

	$q->execute();
	var_dump($q);
	//header('Location: ../listJeu.php');
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

public function getUser($id_user){
	$q =$this ->_db->prepare('SELECT id_user, nom_user, mdp_user from user WHERE id_user = :id_user');
	$id_user = $_GET['id'];

  $q->bindParam(':id_user', $id_user);
	//var_dump($q);

	$q->execute();

	while ($donnes = $q->fetch(PDO::FETCH_ASSOC)){
		$getUser[] = new User($getUser);

	return $getUser;
	}

}

}