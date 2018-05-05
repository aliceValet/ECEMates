<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=ecemates', 'root', '');



if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();




if (isset ($_GET['id'])) { $variable = $_GET["id"]; }
   else {
      $variable = 1;
   }

$commentaire = "<a href='commentaire.php?id=".$variable." '>Accueil</a>";
$profil= "<a href='profil.php?id=".$variable." '>Profil</a>";
$photo= "<a href='photo.php?id=".$variable." '>Photos/videos</a>";

$messagerie= "<a href='reception.php'>Messagerie</a>";
$reseau = '<a href="reseau_pro.php">Reseau</a>';

 



?>




<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
      <div id="menus">
&bull;<?php echo $commentaire; ?> 
&bull;<?php echo $profil; ?> 
&bull;<?php echo $photo; ?> 
&bull;<?php echo $messagerie; ?> 
&bull;<?php echo $reseau; ?> 
&bull;
</div>
   </head>
   <body>

      <div align="center">
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         <?php
         if (!empty($userinfo['avatar']))
           {
            ?>
            <img src="membres/avatars/<?php echo $userinfo['avatar']; ?>" width="150" />
          <?php
           } 
         ?>
         <br/>
         Pseudo = <?php echo $userinfo['pseudo']; ?>
         <br />
         Mail = <?php echo $userinfo['mail']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editionprofil.php">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a>
         <?php
         }
         ?>
      </div>

   </body>
</html>
<?php   
}
?>
