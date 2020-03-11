<?php
require_once "db/connection/EDatabase.php";


function getPost(){
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

function addPost($commentaire, $typeMedia, $nomMedia)
{
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

        if (!empty($nomMedia)) {

            $id = EDatabase::lastInsertId();

            for ($i = 0; $i < sizeof($nomMedia); $i++) {

                $sql = "INSERT INTO M152.Media (typeMedia, nomMedia, creationDate, modificationDate, Post_idPost)
            VALUES (:tm, :nm, :dateCreation, :dateModif, :id)";
                $req = EDatabase::prepare($sql);
                $req->execute(array(
                    ":tm" => $typeMedia[$i],
                    ":nm" => $nomMedia[$i],
                    ":dateCreation" => date("Y-m-d H:i:s"),
                    ":dateModif" => date("Y-m-d H:i:s"),
                    ":id" => $id
                ));
            }
        }
        EDatabase::commit();
    } catch (\Throwable $th) {
        EDatabase::rollBack();
    }
}
