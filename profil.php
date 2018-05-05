<meta charset="utf-8" />
<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=ecemates;charset=utf8','root','');


if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
{

	$tailleMax = 2097152;
	$extensionsValides = array('jpg','jpeg', 'gif', 'png');
	if($_FILES['avatar']['size'] <= $tailleMax)
	{
		$extensionUpload = strtolower(substr(strrschr($_FILES['avatar']['name'], '.'), 1));
		if(in_array($extensionUpload, $extensionsValides))
		{
				$chemin = "membres/avatars/".$_SESSION['id'].".".$extensionUpload;
				$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
				if($resulat)
				{
					$updateavatar = $bdd ->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
					$updateavatar ->execute (array(
						'avatar' => $_SESSION['id'].".". $extensionUpload,
						 'id' => $SESSION['id'] ));
				}
				else
				{
					$msg ="erreur importation";
				}
		}
		else
		 {
		 	$msg = "mauvais format";
		 }
	}
	else {
		$msg = "votre photo ne doit pas dépasser 2Mo";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Profil</title>

<meta name="viewport" content="width=device-width,	
 initial-scale=1">
 <link rel="stylesheet"
 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>

<body>
<a href="accueil.html" target="_blank"> <input type="button" value="Page d'acceuil"> </a>

<a href="profil.html" target="_blank"> <input type="button" value="Profil"> </a>
<a href="photo.html" target="_blank"> <input type="button" value="Photos/videos"> </a>
<a href="messagerie.html" target="_blank"> <input type="button" value="Messagerie"> </a>
<a href="reseau.html" target="_blank"> <input type="button" value="Réseau"> </a>
<a href="notification.html" target="_blank"> <input type="button" value="Notifications"> </a>
<a href="emplois.html" target="_blank"> <input type="button" value="Emplois"> </a>


	
		<table>
			<tr>
				<h3>Nom:</h3>
			</tr>
			<tr>
				<td>Prénom:</td>	
			</tr>
			<tr>
				<td>Pseudo:</td>	
			</tr>
			<tr>
				<td>Année / Fonction:</td>
	
			</tr>		
		</table>
		<form method="POST" action ="" enctype="multipart/form-data">
		<label> Avatar : </label>
		 <input type="file" name="avatar"/>
		 <input type="submit" value="mettre a jour le profil" name="mettre a jour" />
		
		</form>

<div class="container">
 <h2> Compétences :</h2>
 <p> bla bla bla.</p>
</div>


</body>
</html>
