<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link type="text/css" rel="stylesheet" href="materialize.css" media="screen,projection" />
		<link rel="stylesheet" href="multiplication.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />


	</head>

	<body>
		<div class="container center-align">
			<h2>Choisir une table :</h2>

			<div class="menudiv">

				<form class="menu" action="multiplication.php" method="post">

					<select id="nam" name="tb">
						<?php
						for($i=1; $i<=10; $i++)
						{
							echo "<option value='$i'>$i</option>";
						}
						?>	
					</select>

					<input type="submit" value="envoyer">
					<br>
					<br>
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
			<h2>Choisir une table :</h2>
			<div class="input-field row">

				<form class="balek" action="multiplication.php" method="post">


					<label class="lbl" for="ca">
						<input type="checkbox" class="filled-in"  id="ca" name="box[]" value="1"/>
						<span>1</span>
					</label>

					<label for="cb">
						<input type="checkbox" class="filled-in"  id="cb" name="box[]" value="2"/>
						<span>2</span>
					</label>

					<label for="cc">
						<input type="checkbox" class="filled-in"  id="cc" name="box[]" value="3"/>
						<span>3</span>
					</label>

					<label for="cd">
						<input type="checkbox" class="filled-in"  id="cd" name="box[]" value="4"/>
						<span>4</span>
					</label>

					<label for="ce">
						<input type="checkbox" class="filled-in"  id="ce" name="box[]" value="5"/>
						<span>5</span>
					</label>

					<label for="cf">
						<input type="checkbox" class="filled-in"  id="cf" name="box[]" value="6"/>
						<span>6</span>
					</label>

					<label for="cg">
						<input type="checkbox" class="filled-in"  id="cg" name="box[]" value="7"/>
						<span>7</span>
					</label>

					<label for="ch">
						<input type="checkbox" class="filled-in"  id="ch" name="box[]" value="8"/>
						<span>8</span>
					</label>


					<label for="ci">
						<input type="checkbox" class="filled-in"  id="ci" name="box[]" value="9"/>
						<span>9</span>
					</label>


					<label for="cj">
						<input type="checkbox" class="filled-in"  id="cj" name="box[]" value="10"/>
						<span>10</span>
					</label><br>




					<!--
<input type="checkbox" class="filled-in" checked="checked"id="checkun" name="box[]" value="1">
<label for="checkun">1</label>
<input type="checkbox" id="checkdeux" class="filled-in" checked="checked"name="box[]" value="2">
<label for="checkdeux">2</label>
<input type="checkbox" id="checktrois" name="box[]" class="filled-in" checked="checked" value="3">
<label for="checktrois">3</label>
<input type="checkbox" id="checkquatre" name="box[]" class="filled-in" checked="checked" value="4">
<label for="checkquatre">4</label>
<input type="checkbox" id="checkcinq" name="box[]" class="filled-in" checked="checked"value="5">
<label for="checkcinq">5</label>
<input type="checkbox" id="checksix" name="box[]"class="filled-in" checked="checked" value="6">
<label for="checksix">6</label>
<input type="checkbox" id="checksept" name="box[]"class="filled-in" checked="checked" value="7">
<label for="checksept">7</label>
<input type="checkbox" id="checkhuit" name="box[]" class="filled-in" checked="checked"value="8">
<label for="checkhuit">8</label>
<input type="checkbox" id="checkneuf" name="box[]"class="filled-in" checked="checked" value="9">
<label for="checkneuf">9</label>
<input type="checkbox" id="checkdix" name="box[]" class="filled-in" checked="checked"value="10">
<label for="checkdix">10</label>
-->

					<input type="submit" value="envoyer"><br>
					<br>

					
						<?php

						if (isset($_POST["box"])) {
							$boxs = $_POST['box'];
							
							echo '<div id="result">';
							
							foreach($boxs as $box) {
								
								echo '<div class="col s4">';
								
								for ($j = 1; $j <= 10; $j++) {
									$results = $box * $j;
									echo '<p>'.$box.' x '.$j.' = <strong>'.$results.'</strong></p>';
								}
								
								echo '</div>';
								
							}
							
							echo '</div>';
						}




						?>
					
				</form>

			</div>


			<h2>Jeu :</h2>

			<div class="reponsediv">

				<form class="reponse" method="post" action="multiplication.php">
					<select id="tabl" name="table">
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
					<br>
					<br>
					<input type="hidden" name="random" value="<?php echo $random ?>">

					<input name="rep" id="rep" type="text" placeholder="Répondre ici.. ">
					<input value="Send or Next" type="submit">

					<br>
					<br>
					<br>
					<?php
	$reponse = $_POST['table'] * $_POST['random'];

						   if ($_POST['rep'] != "") {
							   if($reponse == $_POST['rep']) {
								   echo "d(-_-)b Bravo d(-_-)b";
							   } else {
								   echo "Essaye encore ..";
							   }
						   }

					?>


				</form>

			</div>
		</div>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
		<script src="multiplication.js"></script>
	</body>

</html>