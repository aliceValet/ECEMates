<meta charset="utf-8" />

<?php

$bdd= new PDO('mysql:host=127.0.0.1;dbname=ecemates;charset=utf8','root','');


$reseau=$bdd->query('SELECT Nom FROM reseau WHERE Contact_pro=0');
$reseau1=$bdd->query('SELECT Nom FROM reseau WHERE Contact_pro=1');

if(isset($_GET['q']) AND !empty($_GET['q'])) {
	
	$q = htmlspecialchars($_GET['q']);


	$reseau = $bdd->query('SELECT Nom FROM reseau WHERE Nom LIKE "%'.$q.'%" ORDER BY Nom DESC');
}
 

	?>

<form methode="GET">
	<input type="search" name="q" placeholder="Recherche..." />
	<input type="submit" value="Valider" />
</form>
<h2>Amis :</h2>


<?php if($reseau->rowCount() > 0) { ?>


<ul>
<?php while($a=$reseau->fetch()){ ?>
	<li><?= $a['Nom'] ?></li>
<?php } ?>

</ul>
<?php } else { ?> 
Aucun resultat pour la recherche "<?= $q ?>"...
<?php } ?>

<h2> Contact professionnel :</h2>
<?php if($reseau1->rowCount() > 0) { ?>


<ul>
<?php while($a=$reseau1->fetch()){ ?>
	<li><?= $a['Nom'] ?></li>
<?php } ?>

</ul>
<?php } else { ?> 
Aucun resultat pour la recherche "<?= $q ?>"...
<?php }