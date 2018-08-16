<!DOCTYPE html>
<html>

	<head>
		<title class="blog">Geocanard</title>
		<link href="bootstrap.min.css" rel="stylesheet">
		<link rel=Stylesheet type="text/css" href=style.css>
	</head>


	<body>

		<img class="image" src="logo.png">
		<h1>GEOCANARD</h1>

		
<?php
			$pdo = new PDO('mysql:host=localhost;dbname=geocanard', 'segond', 'loudmila32');
		?>



		<?php
			try
			{
    		$bdd = new PDO('mysql:host=localhost;dbname=geocanard;charset=utf8', 'segond', 'loudmila32');
			}

			catch (Exception $e)
			{
        	die('Erreur : ' . $e->getMessage());
			}


$req = $bdd->query('SELECT id, region, ville, combien, DATE_FORMAT(date, \'%d/%m/%Y \') AS date FROM localisation ORDER BY date DESC LIMIT 0, 9');


while ($donnees = $req->fetch())

{

?>

<div class="news">

    <h2>

        <?php echo htmlspecialchars($donnees['region']); ?>

        <em>à <?php echo $donnees['ville']; ?></em>

    </h2>

    
    
    
    <p>


    <em><b>Canards <?php echo nl2br(htmlspecialchars($donnees['combien'])); ?></b></em>


    / le <?php echo nl2br(htmlspecialchars($donnees['date']));

    ?>

    <br />

    
    </p>

    <em><a href="geocanard1.php?localisation=<?php echo $donnees['id']; ?>">Formulaire d'ajout</a></em>
    

</div>

<?php

} // Fin de la boucle des articles.

$req->closeCursor();

?>



	<script type="text/javascript" src="jquery.min.js"></script>
	<script src="bootstrap.min.js"></script>
	</body>
</html>