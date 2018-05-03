<meta charset="utf-8" />

<?php

$bdd= new PDO('mysql:host=127.0.0.1;dbname=ecemates;charset=utf8','root','');
$acteur =$bdd->query('SELECT Nom FROM acteur');

if(isset($_GET['q']) AND !empty($_GET['q'])) {
	
	$q = htmlspecialchars($_GET['q']);
	$acteur = $bdd->query('SELECT Nom FROM acteur WHERE Nom LIKE "%'.$q.'%" ORDER BY Nom DESC');
}
 

	?>

<form methode="GET">
	<input type="search" name="q" placeholder="Recherche..." />
	<input type="submit" value="Valider" />
</form>

<?php if($acteur->rowCount() > 0) { ?>


<ul>
<?php while($a=$acteur->fetch()){ ?>
	<li><?= $a['Nom'] ?></li>
<?php } ?>

</ul>
<?php } else { ?> 
Aucun resultat pour la recherche "<?= $q ?>"...
<?php }