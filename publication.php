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
		$c_msg= "Erreur :Vous ne pouvez pas poster une publication vide";
	}
}
	?>

	
	<h2>Publication :</h2>

	<form method= "POST">
		
		<textarea name="commentaire" placeholder="Votre publication..."></textarea><br/>
		<input type="submit" value="Poster ma publication" name="submit_commentaire" />
		<input type="submit" value="Emotion" name="emotion"/>
		<input type="submit" value="video" name="Video"/>
	</form>

	<?php if(isset($c_msg)) { echo $c_msg; } ?>

<?php
}
?>