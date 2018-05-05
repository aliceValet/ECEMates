<meta charset="utf-8" />

<?php

$bdd= new PDO('mysql:host=127.0.0.1;dbname=ecemates;charset=utf8','root','');
$reseau_pro =$bdd->query('SELECT * FROM reseau_pro');

if(isset($_GET['q']) AND !empty($_GET['q'])) {
	
	$q = htmlspecialchars($_GET['q']);
	$reseau_pro = $bdd->query('SELECT * FROM reseau_pro WHERE Nom LIKE "%'.$q.'%" ORDER BY Nom DESC');
}
 

	?>

<form methode="GET">
	<input type="search" name="q" placeholder="Recherche..." />
	<input type="submit" value="Valider" />
</form>

<?php if($reseau_pro->rowCount() > 0) { ?>


<ul>
<?php while($a=$reseau_pro->fetch()){ ?>
<p>
	<li><?= $a['Nom'] ?>
	<?= $a['Prenom'] ?>
	<?= $a['mail'] ?>
						</p> </li>
<?php } ?>

</ul>
<?php } else { ?> 
Aucun resultat pour la recherche "<?= $q ?>"...
<?php }