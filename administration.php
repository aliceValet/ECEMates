<?php

$bdd =new PDO('mysql:host=127.0.0.1;dbname=ecemates;charset=utf8','root','');


if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {

	$supprime = (int) $_GET['supprime'];

	$req=$bdd->prepare('DELETE FROM membres WHERE id= ?');
	$req->execute(array($supprime));
}

$membres =$bdd->query('SELECT * FROM membres ORDER BY id DESC LIMIT 0,5');

if(isset($_GET['q']) AND !empty($_GET['q'])) {
	
	$q = htmlspecialchars($_GET['q']);
	$membres = $bdd->query('SELECT * FROM membres WHERE mail LIKE "%'.$q.'%" ORDER BY id DESC');
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Administration</title>
</head>
<body>
	<form methode="GET">
	<input type="search" name="q" placeholder="Recherche..." />
	<input type="submit" value="Valider" />
	<input type="submit" value="Ajouter" />
</form>
		<h2> Espace Administrateur</h2>
	<ul>
		<?php while($m = $membres->fetch()) { ?>
		<li><?= $m['id'] ?> : <?= $m['mail'] ?> - <a href="administration.php?supprime=<?= $m['id'] ?>">Supprimer </a> </li>
		<?php } ?>
	</ul>


	</body>
	</html>
