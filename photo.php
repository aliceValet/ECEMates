<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=ecemates', 'root', '');
if(isset($_GET['id_photo']) AND $_GET['id_photo'] > 0) {
   $getid = intval($_GET['id_photo']);
   $requser = $bdd->prepare('SELECT * FROM photos_videos WHERE id_photo = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
}
if(isset($_FILES['image']) AND !empty($_FILES['image']['name']))
{
   $tailleMax = 2097152;
   $extensionsValides = array('jpg','jpeg', 'gif', 'png');
   if($_FILES['image']['size'] <= $tailleMax)
   {
      $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides))
      {
            $chemin = "membres/photos/".$_SESSION['id_photo'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
            if($resultat)
            {
               $updateavatar = $bdd ->prepare('UPDATE photos_videos SET image = :image WHERE id_photo = :id_photo');
               $updateavatar->execute (array(
                  'image' => $_SESSION['id_photo'].".". $extensionUpload,
                   'id_photo' => $_SESSION['id_photo'] 
                ));
               header('Location: photo.php?id='.$_SESSION['id_photo']);
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

if (isset ($_GET['id'])) { $variable = $_GET["id"]; }
   else {
      $variable = 1;
   }

$commentaire = "<a href='commentaire.php?id=".$variable." '>Accueil</a>";
$profil= "<a href='profil.php?id=".$variable." '>Profil</a>";
$photo= "<a href='photo.php?id=".$variable." '>Photos/videos</a>";

$messagerie= "<a href='reception.php'>Messagerie</a>";

?>


<!DOCTYPE html>
<html>
   	<head>
		<meta charset = “utf-8”>
         
      <div id="menus">
    

&bull;<?php echo $commentaire; ?> 
&bull;<?php echo $profil; ?> 
&bull;<?php echo $photo; ?> 
&bull;<?php echo $messagerie; ?> 
&bull;

</div>
<img src="logov.png" height="100" width="100"/>

<title> Photos/vidéos </title>
	</head>
	<body>



<form action="photo.php" method="post" enctype="multipart/form-data">
        <p>
        	<h4> Vos photos : <h4><br />
<img src="image1.jpg" alt="Paris" height="100" width="100"/>
<br /><br />	
               
             <p>
            <label for="image">Parcourir dans mes images : </label><input type="file" name="image" id="image" /><br />
            <label for="validation">Ajouter cette nouvelle photo : </label><input type="submit" name="validation" id="validation" value="Ajouter" />
        </p>
        </p>
</form>
<?php
$dir = 'membres/photos/*.{jpg,jpeg,gif,png}';
$files = glob($dir,GLOB_BRACE);
  
echo 'Listing des images du repertoire miniatures <br />';
foreach($files as $image)
{ 
   $f= str_replace($dir,'',$image);
   echo $f.'<br />';
}
?>


<?php
if (!empty($userinfo['image']))
           {
            ?>
            <img src="membres/photos/<?php echo $userinfo['image']; ?>" width="150" />
          <?php
           } 
         ?>


	</body>
</html>