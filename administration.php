<?php

$bdd =new PDO('mysql:host=127.0.0.1;dbname=administration;charset=utf8','root','');

$membres =$bdd->query('SELECT * FROM membres');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Administration</title>
</head>
<body>

	<ul>
		<?php while($m=$membres->fetch()) { ?>
		<li><?= $m['id'] ?> : <?= $m['Nom'] ?></li>
		<?php } ?>
	</ul>


	</body>
	</html>