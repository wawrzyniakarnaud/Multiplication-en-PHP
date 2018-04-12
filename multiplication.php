<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" href="multiplication.css">
	</head>

	<body>

		<h2>Selectionné une table à afficher :</h2>

		<div class="menudiv">

			<form class="menu" action="multiplication.php" method="post">

				<select name="tb">
					<?php
					for($i=1; $i<=10; $i++)
					{
						echo "<option value='$i'>$i</option>";
					}
					?>	
				</select>

				<input type="submit" value="envoyer">

				<?php
				//traitement du formulaire
				//vérifie si le formulaire n'est pas vide
				if(!empty($_POST) && isset($_POST['tb'])) {

					//on recupere la valeur du select
					$valeur = $_POST['tb'];

					// on boucle de 1 à 10
					// on stock dans $i la valeur de 1 à 10
					for ($i = 1; $i <= 10; $i++) {
						// on fait le calcul de valeur multiplié par $i
						$resultat = $i * $valeur;

						//on affiche la phrase
						echo "$valeur x $i = $resultat <br>";


					}	
				}
				?>
			</form>

		</div>

		<div class="casediv">

			<form class="case" action="multiplication.php" method="post">

				<input type="checkbox" id="checkun" name="box[]" value="1">
				<label for="checkun">1</label>
				<input type="checkbox" id="checkdeux" name="box[]" value="2">
				<label for="checkdeux">2</label>
				<input type="checkbox" id="checktrois" name="box[]" value="3">
				<label for="checktrois">3</label>
				<input type="checkbox" id="checkquatre" name="box[]" value="4">
				<label for="checkquatre">4</label>
				<input type="checkbox" id="checkcinq" name="box[]" value="5">
				<label for="checkcinq">5</label>
				<input type="checkbox" id="checksix" name="box[]" value="6">
				<label for="checksix">6</label>
				<input type="checkbox" id="checksept" name="box[]" value="7">
				<label for="checksept">7</label>
				<input type="checkbox" id="checkhuit" name="box[]" value="8">
				<label for="checkhuit">8</label>
				<input type="checkbox" id="checkneuf" name="box[]" value="9">
				<label for="checkneuf">9</label>
				<input type="checkbox" id="checkdix" name="box[]" value="10">
				<label for="checkdix">10</label>

				<input type="submit" value="envoyer"><br>

				<?php

				if (isset($_POST["box"])) {
					$boxs = $_POST['box'];
					foreach($boxs as $box) {
						for ($j = 1; $j <= 10; $j++) {
							$results = $j * $box;
							echo "$j x $box = $results <br>";
						}
					}
				}




				?>

			</form>

		</div>




		<div class="reponsediv">

			<form class="reponse" method="post" action="multiplication.php">
				<select name="table">
					<?php
					for($a=1; $a<=10; $a++)
					{
						$isSelected = "";

						if($a == $_POST['table']) {
							$isSelected = "selected";
						}
						echo "<option value='$a' $isSelected>Table du $a</option>";
					}
					?>	

				</select>



				<?php 
				// si on a un post et un post table
				if(!empty($_POST) && isset($_POST['table'])) {
					$a = $_POST['table'];

					// si on a un post random et la valeur de rep n'est pas vide
					if (isset($_POST['random']) && $_POST['rep'] != "") {
						$random = $_POST['random'];
						// sinon
					} else {
						$random = rand(1,10);	
					}

					echo "Combien font $a x $random <br>";
				}
				?>

				<input type="hidden" name="random" value="<?php echo $random ?>">

				<input name="rep" id="rep" type="text" placeholder="Répondre ici.. ">
				<input value="Send or Next" type="submit">

<br>
				<?php
	// on calcul la reponse a trouver
	$reponse = $_POST['table'] * $_POST['random'];

					   // si le joueur a donné une réponse
					   if ($_POST['rep'] != "") {
						   // si il a donné la bonne reponse
						   if($reponse == $_POST['rep']) {
							   echo "gagné";
							   //sinon
						   } else {
							   echo "perdu";
						   }
					   }

				?>


			</form>

		</div>

	</body>

</html>