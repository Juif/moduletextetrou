<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/module_texteTrou2.css">
	<script src="jquery-3.1.1.js"></script>
	<script src="module_texteTrou2.js"></script>
	<title></title>
</head>
<body>

	<div id="title">

		<h1>Texte à trou</h1>


		<div id="progression_bar"><div class="bar_fixed"></div></div>


	</div>

<?php

try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=texteTrou;charset=utf8', 'root', 'root');
	}
catch(Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}

//Recuperation message
$reponse = $bdd->query('SELECT titre, exo FROM admin ORDER BY id DESC LIMIT 0,10');

//Affichage de chaque message
while ($donnees = $reponse->fetch())
	{
		echo '<p><strong>' . htmlspecialchars($donnees['titre']) . '</strong> :' . '</p>' .
		'<p>' . htmlspecialchars($donnees['exo']) . ' <label for="reponse">Reponse 1:</label>
		<select name="reponse1" id="reponse1">
		<option value="idea" selected>Idée</option>
		<option value="idea2">Idée 2</option>
		<option value="idea3">Idée 3</option>
		</select>
		.</p>';
	}
$reponse->closeCursor();

?>

	

 	<p><button class="boutonIndice">Besoin d'un indice (2)</button>
	 </p>
	 <p><button id ="boutonValider">Valider</button></p>
	 <ul class="indice"></ul>

</body>
</html>
