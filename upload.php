<?php
if (isset($_FILES['img'])) {
    $dossier = 'upload/';
    $fichier = basename($_FILES['img']['name']);
    $dir = "upload";
    $nbFile = 0;

    $fichier = $nbFile . $_FILES['img']['name'];

    $typeFichier = $_FILES['img']['type'];
    $typesVoulus = array("image/gif", "image/png", "image/jpeg", "video/mp4", "audio/mpeg");
    if (in_array($typeFichier, $typesVoulus)) {
        // Open a directory, and read its contents
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    echo "filename:" . $file . "<br>";
                    if ($file == $fichier) {
                        $nbFile++;
                        $fichier = $nbFile . $_FILES['img']['name'];
                    }
                }
                closedir($dh);
            }
        }

        $_FILES['img']['name'] = $fichier;

        move_uploaded_file($_FILES['img']['tmp_name'], $dossier . $fichier);
    }


    /*if(move_uploaded_file($_FILES['img']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }*/
}

header("Location: post.php");
exit;
