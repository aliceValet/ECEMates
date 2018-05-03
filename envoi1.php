  <?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=ecemates', 'root', '');

 if(isset($_POST['envoi_message'])) {
       if(isset($_POST['destinataire'],$_POST['message']) AND !empty($_POST['destinataire']) AND !empty($_POST['message'])) {

          } else {
          $error = "Veuillez compléter tous les champs";
       }
    }

 ?>

   <!DOCTYPE html>
   <html>
   <head>
      <title>Envoi de message</title>
      <meta charset="utf-8" />
   </head>
   <body>
      <form method="POST">
         <label>Destinataire:</label>
         <select name="destinataire">
            
            <option>Boucle</option>
         
         </select>
      
         <br /><br />
         <textarea placeholder="Votre message" name="message"></textarea>
         <br /><br />
         <br /><br />
         <input type="submit" value="Envoyer" name="envoi_message" />
         <br /><br />

         <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
      </form>
    
   </body>
   </html>

