<!DOCTYPE html>
<html lang="fr">
	<head>
		<title> PAFC - Inscriptions </title>
		<meta charset="UTF-8"/>
		<link type"text/css" rel="stylesheet" href="css/style.css" media="all"/>
		<link type"text/css" rel="stylesheet" href="css/all.css"/>
	</head>

	<body>
		<div class="sticky">
			<header>
				<div class="navbar">
					<div align="center">
						<img src="images/logo.png" alt="Logo PAFC">
						<h1>  Pays d'Allevard Football Club  </h1>
						<img src="images/logo.png" alt="Logo PAFC">
					</div>
					<img id="banner" src="images/banner.jpg"/>
					<a href="index.html"><i class="fa fa-fw fa-home"></i>Home</a>
					<a href="planning.html"><i class="fa fa-fw fa-calendar-alt"></i>Agenda</a>
					<a href="tarif.html"><i class="fa fa-fw fa-euro-sign"></i>Prix</a>
          <a class="active" href="pre-inscription.php"><i class="fa fa-fw fa-registered"></i>Licenses</a>
					<div class="dropdown">
						<button class="dropbtn"><i class="fa fa-fw fa-images"></i>Médias</button>
						<div class="dropdown-content">
						<a href="photo.html"><i class="fa fa-fw fa-image"></i>Photos</a>
						<a href="video.html"><i class="fa fa-fw fa-video"></i>Videos</a>
						</div>
					</div>
					<div id="sociaux">
					  <a href="https://www.facebook.com/Pays-dAllevard-Football-Club-123656981022147/" target="_blank"><i class="fab fa-facebook-f"></i></a>
					  <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
					</div>
				</div>
			</header>
		</div>

<?php
$ErreurNom = $ErreurEmail = $ErreurGenre = "";
$Nom = $email = $Genre = $Commentaire = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Nom"])) {
    $ErreurNom = "Le nom est requis";
  } else {
    $Nom = test_input($_POST["Nom"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$Nom)) {
      $ErreurNom = "Lettres et espaces uniquement";
    }
  }

  if (empty($_POST["email"])) {
    $ErreurEmail = "L'email est requis";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $ErreurEmail = "Format d'email invalide";
    }
  }

  if (empty($_POST["Commentaire"])) {
    $Commentaire = "";
  } else {
    $Commentaire = test_input($_POST["Commentaire"]);
  }

  if (empty($_POST["Genre"])) {
    $ErreurGenre = "Le genre est requis";
  } else {
    $Genre = test_input($_POST["Genre"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Formulaire d'inscription au PAFC</h2>
<p><span id="fix2" class="error">* éléments obligatoires</span></p>
<form method="post" action="/Site de sport - final/pre-inscription.php">
	<div class="input_Text">
  Genre:
  <input type="radio" name="Genre" value="Femme">Femme
  <input type="radio" name="Genre" value="Homme">Homme
  <input type="radio" name="Genre" value="autre">autre
	</div>
  <span id="fix" class="error">* <?php echo $ErreurGenre;?></span>
  <br/><br/>
	<div>
  <input class="inputText" type="text" name="Nom" placeholder="Votre nom (Ex : John Snow)" value="<?php echo $Nom;?>">
  <span class="error">* <?php echo $ErreurNom;?></span>
  <br/><br/>
  <input class="inputText" type="text" name="email" placeholder="Votre email (Ex : Martin.Luther@gmail.com)" value="<?php echo $email;?>">
  <span class="error">* <?php echo $ErreurEmail;?></span>
  <br/><br/>
  <textarea name="Commentaire" rows="5" cols="40" placeholder="Un Commentaire ?" ><?php echo $Commentaire;?></textarea>
  <br/><br/>
	</div>
  <input type="submit" name="submit" value="Soumettre">
</form>

<?php

if (empty($ErreurEmail) && empty($ErreurGenre) && empty($ErreurNom)) {
 echo "<br/>";
 echo "<p>Félicitations <b>$Nom</b> !</br></br>";
 echo "Votre inscription a bien été communiquée au PAFC, vous allez recevoir une réponse d'ici peu.</br>";
 echo "Merci de votre inscription.</p>";
}

?>

<footer class="auteur">
	Contact: Zolori (<a href="mailto:alban38.niemaz@gmail.com?subject=Demande d'information">alban38.niemaz@gmail.com</a>)
</footer>

</body>
</html>
