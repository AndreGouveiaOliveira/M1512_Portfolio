<?php
require_once "lib.utility.inc.php";

if (isset($_FILES['img'])) {
    for ($i = 0; $i < sizeof($_FILES['img']['name']); $i++) {
        $dossier = 'upload/';
        $fichier = basename($_FILES['img']['name'][$i]);
        $dir = "upload";
        $nbFile = 0;

        $fichier = $nbFile . $_FILES['img']['name'][$i];

        $typeFichier = $_FILES['img']['type'][$i];
        $typesVoulus = array("image/gif", "image/png", "image/jpeg", "video/mp4", "audio/mpeg");
        if (in_array($typeFichier, $typesVoulus)) {
            // Open a directory, and read its contents
            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                        // echo "filename:" . $file . "<br>";
                        if ($file == $fichier) {
                            $nbFile++;
                            $fichier = $nbFile . $_FILES['img']['name'][$i];
                        }
                    }
                    closedir($dh);
                }
            }

            $_FILES['img']['name'][$i] = $fichier;

            move_uploaded_file($_FILES['img']['tmp_name'][$i], $dossier . $fichier);
        }
    }

    $commentaire = filter_input(INPUT_POST, "commentaire", FILTER_SANITIZE_STRING);
    addPost($commentaire,$_FILES['img']['type'],$_FILES['img']['name']);
}

header("Location: post.php");
exit;
