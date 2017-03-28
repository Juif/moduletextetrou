<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/module_texteTrou.css">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery-3.1.1.js"></script>
    <script src="module_texteTrou_test.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <title></title>
</head>
<body>
<div id="tout">
<section>
    <header>
        <style>
            .navbar-default{
                background-color: #2aabd2;
            }
            .navbar-default .navbar-nav>li>a{
                color: #ffffff;
            }
            .navbar-default .navbar-nav
            {text-align: center;}

            .navbar-brand
            {
                font-size: 45px;
                padding-right: 30px;
                margin-right: 35px;
            }
            .navbar-form
            {
                width: 300px;
            }

        </style>

        <nav class="navbar navbar-default">
            <div container-fluid>
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Mathrix</a>
                </div>
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Rechercher">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">En direct</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Classe</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-bell"></i></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pseudo
                            <i class="glyphicon glyphicon-triangle-bottom"></i>
                            <span class="carpet"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Mon compte</a></li>
                            <li><a href="#">Premium</a></li>
                            <li><a href="#">Deconnection</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <p>
    <p id="retour"><a href="#">< Retour
        </a></p>
    <article id="bar_titre">
        <aside>
            <nav class="navbar navbar-right">
                <ul class="menuAside">
                    <li class="active"><a href="#"><i class="glyphicon glyphicon-play"></i>  Cours</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-pencil"></i>  Activité 1</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-align-left"></i>  Activité 2</a></li>
                </ul>
            </nav>
        </aside>

        <div id="title">

            <h2>Texte à trou</h2>

            <style>
                .progressBar
                {
                    height: 17px;
                    width: 250px;
                    border: 2px solid #777777;
                    padding-left: 30px;
                }
            </style>

            <div id="progressBarDiv">
                <progress id="progressBar" value="0" max="100"></progress>
                <i class="glyphicon glyphicon-star-empty"></i>

            </div>

            <a href="#" id="buttonFavoris"><i class="glyphicon glyphicon-heart-empty"></i> </a>
        </div>

        <p></p>
    </article>

    <div id="exercices-reponses">
        <article id="exercices">
            <button onclick="loadDoc1()" id="?idExercice=6">1</button>
            <button onclick="loadDoc2()" id="?idExercice=7">2</button>
            <button onclick="loadDoc3()" id="?idExercice=8">3</button>
        </article>

        <script>
            function loadDoc1() {
                var xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200 || this.status === 0) {
                        document.getElementById("tout").innerHTML = this.responseText;
                    }
                };
                xhr.open('GET', 'http://localhost/Projet/test2.php?idExercice=1', true);
                xhr.send();
            }
            function loadDoc2() {
                var xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200 || this.status === 0) {
                        document.getElementById("tout").innerHTML = this.responseText;
                    }
                };
                xhr.open('GET', 'http://localhost/Projet/test2.php?idExercice=2', true);
                xhr.send();
            }

        </script>

        <article id="reponses">
            <?php

            $idExercice = $_GET["idExercice"];

            include("config.php");


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



            for ($i=0 ; $i<count($title['titreScroll']);$i++)
            {

                echo $title ['titreScroll'][$i] ;

            }

            ?>

            <label for="reponse"></label><br/>
            <select name="reponse" id="reponse">

                <?php
                function rechercheOptions($idExercice, $bdd)
                {
                    $reponse = $bdd->query('SELECT id,choix, id_scrollBarr FROM choix	 WHERE id_ex="' . $idExercice . ' " '  . ORDER BY DESC);


                    $res = array();
                    $res['id'] = array();
                    $res['id_scrollBarr'] = array();
                    $res['choix'] = array();



                    while ($donnees = $reponse->fetch()) {

                        array_push($res['id'], $donnees['id']);
                        array_push($res['id_scrollBarr'], $donnees['id_scrollBarr']);
                        array_push($res['choix'],$donnees['choix']);

                    }

                    return $res;

                }

                $res = rechercheOptions($idExercice,$bdd);

                for ($i =0 ; $i<count($res['choix']);$i++)
                {
                   
                        ?>'
                        <option value="?php echo $res['choix'][$i]; ?>"> <?php echo $res['choix'][$i]; ?>'</option>' ;
                        <?php
               
                }

                ?>
            </select>
            <div class="buttonValidHint">
                <button type="button" class="btn btn-info" id="boutonIndice">Besoin d'un indice (2)</button>
                <button type="button" class="btn btn-warning" id ="boutonValider">Valider</button>
                <ul class="indice"></ul>
            </div>
        </article>
    </div>
</section>
</div>
</body>
</html>
