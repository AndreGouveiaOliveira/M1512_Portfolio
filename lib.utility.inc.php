<?php
require_once "db/connection/EDatabase.php";


function getPost()
{
    $sql = "SELECT idPost, commentaire FROM Post";
    $req = EDatabase::prepare($sql);
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function getMedia($idPost)
{
    $sql = "SELECT typeMedia FROM Media WHERE Post_idPost = :idPost";
    $req = EDatabase::prepare($sql);
    $req->execute(array(
        ":idPost" => $idPost
    ));

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function addPost($commentaire, $typeMedia, $nomMedia, $tmpName)
{
    $push = true;
    try {
        EDatabase::beginTransaction();

        $sql = "INSERT INTO M152.Post (commentaire, creationDate, modificationDate)
        VALUES ( :c,:dateCreation,:dateModif)";
        $req = EDatabase::prepare($sql);
        $req->execute(array(
            ":c" => $commentaire,
            ":dateCreation" => date("Y-m-d h:m:s"),
            ":dateModif" => date("Y-m-d h:m:s")
        ));

        if (isset($_FILES['img'])) {
            if (!empty($nomMedia)) {

                $id = EDatabase::lastInsertId();

                for ($i = 0; $i < sizeof($nomMedia); $i++) {

                    $sql = "INSERT INTO M152.Media (typeMedia, nomMedia, creationDate, modificationDate, Post_idPost)
                VALUES (:tm, :nm, :dateCreation, :dateModif, :id)";
                    $req = EDatabase::prepare($sql);
                    $req->execute(array(
                        ":tm" => $typeMedia[$i],
                        ":nm" => checkFileExist($nomMedia[$i]),
                        ":dateCreation" => date("Y-m-d H:i:s"),
                        ":dateModif" => date("Y-m-d H:i:s"),
                        ":id" => $id
                    ));

                    if (!moveFile($typeMedia[$i], $nomMedia[$i], $tmpName[$i])) {
                        $push = false;
                    }
                }
            }
        }

        if ($push) {
            EDatabase::commit();
        } else {
            EDatabase::rollBack();
        }
    } catch (\Throwable $th) {
        EDatabase::rollBack();
    }
}

function moveFile($typeMedia, $nomMedia, $tmpName)
{
    $dossier = 'upload/';
    $move = false;
    
    $typesVoulus = array("image/gif", "image/png", "image/jpeg", "video/mp4", "audio/mpeg");

    if (in_array(mime_content_type($tmpName), $typesVoulus)) {

        $nomMedia = checkFileExist($nomMedia);

        if (move_uploaded_file($tmpName, $dossier . $nomMedia)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            $move = true;
        }
        return $move;
    }
}

function checkFileExist($nomMedia)
{
    $nbFile = 0;
    $dir = "upload";
    $fichier = basename($nomMedia);

    $fichier = $nbFile . $nomMedia;

    // Open a directory, and read its contents
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                // echo "filename:" . $file . "<br>";
                if ($file == $fichier) {
                    $nbFile++;
                    $fichier = $nbFile . $nomMedia;
                }
            }
            closedir($dh);
        }
    }
    return $fichier;
}

function showPost()
{
    $values = selectPostMedia();
    for ($i=0; $i < sizeOf($values); $i++) { 
        $postToShow = '<div class="uk-card uk-card-default uk-card-body uk-margin-medium-top">
        <div class="uk-card-header">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
        <div class="uk-width-auto">
        <img class="uk-border-circle" width="40" height="40" src="images/icon.jpg">
        </div>
        <div class="uk-width-expand">
        <p class="uk-card-title uk-margin-remove-bottom">' . $values[$i]["commentaire"] . '</p>
        </div>
        </div>
        </div>
        <div class="uk-card-body">
        <img width="200" height="200" src="upload/';

        if (!empty($values[$i]["nomMedia"])) {
            $postToShow .= $values[$i]["nomMedia"];
        }

        $postToShow .= '">
        </div>
        </div>';

        echo $postToShow;
    }
}

function selectPostMedia()
{
    $sql = "SELECT commentaire, nomMedia FROM Post JOIN Media ON Media.Post_idPost = Post.idPost ORDER BY Post.idPost DESC";
    $req = EDatabase::prepare($sql);
    $req->execute();
    
    return $req->fetchAll(PDO::FETCH_ASSOC);
}
