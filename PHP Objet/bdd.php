<?php

	try{
		$db = new PDO('mysql:host=localhost;dbname=ludo', 'root', 'chatons');
	}
	catch (PDOException $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
