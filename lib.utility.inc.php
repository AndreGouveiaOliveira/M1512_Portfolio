<?php
require_once "db/connection/EDatabase.php";

function getMedia()
{
    $sql = "SELECT typeMedia FROM Media";
    $req = EDatabase::prepare($sql);
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}


function insertMedia(){
    $sql = "INSERT INTO table_name (typeMedia, nomMedia, creationDate, modificatonDate, Post_idPost)
    VALUES (value1, value2, value3, ...)";


}