<meta charset="utf-8" />

<?php

$bdd= new PDO('mysql:host=127.0.0.1;dbname=ecemates;charset=utf8','root','');

if(isset($_GET['id']) AND !empty($_GET['id'])) {

	$getid =htmlspecialchars($_GET['id']);

	$evenements = $bdd->prepare('SELECT * FROM evenements WHERE id = ?');
	$evenements->execute(array($getid));
	$evenements = $evenements->fetch();

	if(isset($_POST['submit_commentaire'])) {
		if(isset($_POST['commentaire']) AND !empty($_POST['commentaire']
	)) {
			$evenements= htmlspecialchars($_POST['commentaire']);

			$ins= $bdd->prepare('INSERT INTO commentaire(commentaires,id_evenement) VALUES (?,?) ');
			$ins->execute(array($commentaires,$getid));
			$c_msg="<span style='color:green'> Votre commentaire a bien été posté</span>";


	} else {
		$c_msg= "Erreur :Vous ne pouvez pas laisser un commentaire vide";
	}
}
	?>

	<h2>Evenements:</h2>
	<p><?= $evenements['contenu'] ?></p>
	


	<br/><br/>
	
	<h2>Commentaires :</h2>

	<form method= "POST">
		
		<textarea name="commentaire" placeholder="Votre commentaire..."></textarea><br/>
		<input type="submit" value="Poster mon commentaire" name="submit_commentaire" />
		<input type="submit" value="Like" name="like"/>
	</form>

	<?php if(isset($c_msg)) { echo $c_msg; } ?>

<?php
}
?>