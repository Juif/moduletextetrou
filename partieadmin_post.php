	<?php

	try
{
	$bdd = new PDO('mysql:host=localhost;dbname=texteTrou;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
	die('Erreur : ' .$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO admin (titre, exo) VALUES(?,?)');
$req->execute(array($_POST['titre'], $_POST['exo']));

header('Location:partieadmin.php');
?>
