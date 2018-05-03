<?php

$photo = isset($_POST["photo"])? $_POST["photo"] : ""; 
$Image = "";

$extensions = array ('.jpg');
// //connecter l'utilisateur dans BDD
// //votre serveur = localhost | votre login = root | votre mot de pass = ‘’ (rien)
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=localhost;dbname=ecemates', 'root', '', $pdo_options);

 if ($_POST['validation']){
//création de la variable du dossier ou l'image sera enregistré
$uploads_dir = 'C:\Users\cfran\Documents';
//Récupération du nom de l'image
        $name = $_FILES["imaged"]["name"];
//mettre l'image dans le dossier precedemment donnée dans la variable et le nommé ensuite
//par son nom recuperer aussi precedemment
        move_uploaded_file($_FILES["imaged"]["tmp_name"], "$uploads_dir/$name");
//mettre le chemin de l'image dans variable
        $lien = "$uploads_dir/$name";
        echo $lien;


//l'inserer dans la BDD
        $insertimg = $bdd->prepare("INSERT INTO photo(imaged) VALUES(?)");
        $insertimg->execute(array($lien));
       // echo  '<img src= "'.$data['image'].'" >';
 
}




?>