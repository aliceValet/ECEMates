<meta charset="utf-8" />

<?php

$bdd= new PDO('mysql:host=127.0.0.1;dbname=ecemates;charset=utf8','root','');
$entreprise =$bdd->query('SELECT * FROM entreprise');

if(isset($_GET['q']) AND !empty($_GET['q'])) {
	
	$q = htmlspecialchars($_GET['q']);
	$entreprise = $bdd->query('SELECT * FROM entreprise WHERE Intituleduposte LIKE "%'.$q.'%" ORDER BY Nom DESC');
}
 

	?>

<form methode="GET">
	<input type="search" name="q" placeholder="Recherche..." />
	<input type="submit" value="Valider" />
	<input type="submit" value="Ajouter" />
</form>

<?php if($entreprise->rowCount() > 0) { ?>


<ul>
<?php while($a=$entreprise->fetch()){ ?>
<p>
	<li><?= $a['Nom'] ?></li><br/>
	<?= $a['logo'] ?><br/>
	<?= $a['Intituleduposte'] ?><br/>
	<?= $a['mail'] ?><br/>
	</p>
<?php } ?>

</ul>
<?php } else { ?> 
Aucun resultat pour la recherche "<?= $q ?>"...
<?php }