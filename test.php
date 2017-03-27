
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

    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <title></title>
</head>
<body>

<div id="title">

    <h1>Module texte trou</h1>


    <div id="progression_bar"><div class="bar_fixed"></div></div>


</div>


<a href="?idExercice=1" id="exo1">Exercice 1</a>
<a href="?idExercice=2" id="exo2">Exercice 2</a>

<?php

$idExercice = $_GET["idExercice"];

include("config.php");

//fonction titre en fonction de exercice (working)
function scrollbarrTitle($idExercice,$bdd)


{
    $reponse = $bdd->query('SELECT id_exercic, titreScroll, id FROM scrollBarr
                             WHERE scrollBarr.id_exercic = "' . $idExercice . '" ');


    $title = array();
    $title['id_exercic']= array();
    $title['id']= array();
    $title['titreScroll']= array();

    while ($donnees = $reponse->fetch())
    {

        array_push($title['id_exercic'], $donnees['id_exercic']);
        array_push($title['id'], $donnees['id']);
        array_push($title['titreScroll'], $donnees['titreScroll']);
    }




    return $title;

}

$title = scrollbarrTitle($idExercice,$bdd);
$arrayScroll = array();


for ($i=0 ; $i<count($title['id']);$i++)
{


   $arrayScroll[$i] = $title['id'][$i];

}

for ($i=0 ; $i<count($title['titreScroll']);$i++)
{


    echo $title ['titreScroll'][$i] ;

}



//fonction choix en fonction de id scroll
function likscroll2choix($idExercice, $arrayScroll, $bdd)
    {

        //for ($i = 0; $i < count($arrayScroll); $i++) {

        // foreach ($arrayScroll as $array){

        foreach ($arrayScroll as $array=>$row) {



            $donnees = $bdd->query('SELECT choix.choix, scrollBarr.id FROM choix, scrollBarr WHERE  choix.id_scrollBarr="' . $row . '" AND choix.id_ex= "' . $idExercice . '"');

           echo '<p>'. $row. '</p>';
        }


           $res = array();
           $res['choix'] = array();




           while ($reponse=$donnees->fetch()) {
               array_push($res['choix'], $reponse['choix']);



               return $res;
           }
    }



$res = likscroll2choix($idExercice, $arrayScroll, $bdd);

    for ($i =0 ; $i<count($res['choix']);$i++)
    {
    echo "<li>" . $res['choix'][$i] . "</li>";


    }


/* <- <p><button type="button" class="btn btn-info" id="boutonIndice">Besoin d'un indice (2)</button>
 </p>
 <p><button type="button" class="btn btn-primary" id ="boutonValider">Valider</button></p>
 <ul class="indice"></ul> ->*/


?>
</body>
</html>
