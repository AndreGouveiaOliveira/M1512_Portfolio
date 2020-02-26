<?php
if(isset($_FILES['img']))
{ 
     $dossier = 'upload/';
     $fichier = basename($_FILES['img']['name']);
     if(move_uploaded_file($_FILES['img']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}

header("Location: post.php");
exit;