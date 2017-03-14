
<?php
// affichage des erreur php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="module_texteTrou.css">
	<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
   	<script src="jquery-3.1.1.js"></script>
    	<script src="module_texteTrou.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.js"></script>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <title></title>
</head>
<body>

<div id="title">

    <h1>Module texte trou</h1>


    <div id="progression_bar"><div class="bar_fixed"></div></div>


</div>


<a href="?idExercice=1" id="exo1">Exercice 1<a>
        <a href="?idExercice=2" id="exo2">Exercice 2<a>

                <?php
                $idExercice = $_GET["idExercice"];

                //Recuperation message
                $reponse = $bdd->query('SELECT * FROM admin WHERE id = '. $idExercice. ';');
                //Affichage de chaque message
                while ($donnees = $reponse->fetch())
                {
                    echo '<div id="exo1">' . '<p><strong>' . htmlspecialchars($donnees['titre']) . '</strong> :' . '</p>' .
                        '<p>' . htmlspecialchars($donnees['exo']) . '<label for="reponse1"></label>
		<select name="reponse1" id="reponse1">
		<option value="idea" selected>' . htmlspecialchars($donnees['reponse01']) . '</option>
		<option value="idea2">' . htmlspecialchars($donnees['reponse2']) . '</option>
		<option value="idea3">' . htmlspecialchars($donnees['reponse3']) . '</option>
		</select>
		</p>' .
                        '</div>';
                }
                $reponse->closeCursor();
                ?>




               <p><button type="button" class="btn btn-info" id="boutonIndice">Besoin d'un indice (2)</button>
	 </p>
	 <p><button type="button" class="btn btn-primary" id ="boutonValider">Valider</button></p>
	 <ul class="indice"></ul>

</body>
</html>
