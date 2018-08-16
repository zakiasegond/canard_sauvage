<?php ?><!DOCTYPE html>
<html>
	<head>
		<title class="blog">Formulaire canard</title>
        <link href="bootstrap.min.css" rel="stylesheet">
		<link rel=Stylesheet type="text/css" href=style.css>
	</head>
	<body>
		<img class="image" src="logo.png">
        <h1>GEOCANARD</h1>
		<h2>Ajouter</h2>

    <div id="ajouter">

        <form method="POST" >


 			Date<input type="date" class="date" name="date" size="20" maxlength="20">

            Region<input type="text" class="region" name="region"> 

            Ville<input type="text" class="ville" name="ville">

            Combien de canards<input type="number" class="combien" name="combien"> 

            
            <button  class="button" name="submit" type="submit" value="Envoyer">Enregistrer</button>

        </form>

    </div>



<?php

//Message d'erreur si input vide.

if(!empty($_POST['submit'])){

    if (!empty($_POST['region']) && !empty($_POST['ville']) && !empty($_POST['combien']) && !empty($_POST['date'])){

        try {

            //Pour éviter les erreur.

            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

            // Connexion à la base de données.

            $bdd = new PDO('mysql:host=localhost;dbname=geocanard;charset=utf8', 'segond','loudmila32', $pdo_options);

            //Ajout du nouvel article dans la base de donnée.

            $req = $bdd->prepare('INSERT INTO localisation(region, ville, combien,  date)

                VALUES(:region, :ville, :combien, :date)');

            $req->execute(array(

                ':region' => $_POST['region'],

                ':ville' => $_POST['ville'],

                ':combien' => $_POST['combien'],

                ':date' => $_POST['date']


            ));

            header('Location: index.php');

        }

        catch (Exception $e){

            die('Erreur : ' . $e->getMessage());

        }

    }else{

        echo  "<script>alert( 'Erreur, Remplissez tous les champs!');</script>"; 

    }

}

?>

    <script type="text/javascript" src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
	</body>
</html>