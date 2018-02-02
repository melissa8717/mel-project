<?php

$hello="hello world!";
$nom="Julia";
echo($nom.$hello."<br />");

$fruit=Array();
$fruit[0]="fraise";
$fruit[1]="banane";
echo($fruit[1]."<br />");

$date = date("d-m-Y");
$heure = date("H:i");
echo($date);
echo($heure."<br />");


$nbr=10;

if($nbr>0 && $nbr<10){
echo ("LE nombre est compris entre 0 et 9"."<br />");
}

elseif($nbr>=10 && $nbr<20){
echo("le nombre est entre 10 et 19"."<br />");
}
else{
echo ("le nombre est supérieur a 20"."<br />");
}


switch($nom){
case 'Julia';
echo("Votre nom est Julia");
break;

case 'Rosana';
echo("Votre nom est Rosana");
break;

case 'test';
echo("Votre nom est test");
break;

default:
echo ("Je ne sais pas qui vous etes !!");
}


if ($nom == 'Julia'){
echo("Votre nom est Julia"."<br />");
}
elseif ($nom == 'Rosana'){
echo("Votre nom est Rosana"."<br />");
}
elseif ($nom == 'test'){
echo("Votre nom est  test"."<br />");
}
else{
echo("Je ne sais pas qui vous etes"."<br />");
}


$chiffre=5;

for($i=0;$i<$chiffre;$i++){
  echo("Notre chiffre est différent de".$i."<br />");
}

echo("Notre chiffre est égal à".$i."<br />");

$y=0;

while ($y<$chiffre){
  echo("Le chiffre est différent de".$y."<br />");
  $y=$y+1;
}

echo("le chiffre est égal à".$y."<br />");



$fp= fopen ("donnees.txt",r);
$contenu = fgets($fp,255);
fclose($fp);

echo ("notre fiche contient".$contenu."<br />");

$fp = fopen("compteur.txt","r+");
$visite = fgets($fp,11);
$visite = $visite+1;
fseek ($fp,0);
fputs($fp,$visite);
fclose($fp);

echo("Le nombre de visite est de ". $visite."<br />");


function affichage ($taille, $couleur, $texte) {
	echo '<font size = "'.$taille.'" color = "'.$couleur.'">'.$texte.'</font>';
}

affichage("2","red","Mon texte");


$base = mysqli_connect ('localhost', 'root', 'chatons');
$mysqli_connect = mysqli_select_db ($base, 'appli_frais' ) ;



$sql = 'select nom, prenom from Visiteur';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on recupere le resultat sous forme d'un tableau
$data = mysqli_fetch_array($req);

// on libère l'espace mémoire alloué pour cette interrogation de la base


while ($data =mysqli_fetch_array($req)){
echo 'nom', 'prenom'.$data['nom'].$data['prenom']."<br />";

}

mysqli_free_result ($req);
mysqli_close ($base);
/*
$temps = 365*24*3600;
setcookie ("pseudo", "pseudo", time() + $temps);

isset($_COOKIE['pseudo']);{
  echo('Bonjour'.$_COOKIE['pseudo']);
}


$bdd = new PDO('mysql:hostlocalhost;dname=appli_frais, charset=utf8',' root', 'chatons');
$reponse = $bdd->query('SELECT libelle FROM Etat');
$donnes=$reponse->fetch();
while($donnes = $reponse->fecth()){
  echo $donnes['libelle'];
}*/
?>
