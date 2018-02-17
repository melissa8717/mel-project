<?php
$login ="admn";
$pwd = "admin";
echo('test4'.$login.'<br />');
echo('test5'.$pwd.'<br />');
var_dump($_POST);
if (isset($_POST['login']) && isset($_POST['password'])){
	echo ('test1'.$_POST['login'].'<br />');
	if($login == $_POST['login'] && $pwd == $_POST['password']){
		session_start();
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['pwd'] = $_POST['password'];
		echo('test2'.$_SESSION['login'].'<br />');
		echo('test3'.$_SESSION['pwd'].'<br />');
		include_once('session.php');
	}

	else{
		echo('Membre non reconnu');
	}
}

else{
	echo('Les variables du formulaire ne sont pas declarées');
}
