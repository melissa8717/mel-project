<?php

	try{
		$db = new PDO('mysql:host=localhost;dbname=ludo', 'root', '');
	}
	catch (PDOException $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
