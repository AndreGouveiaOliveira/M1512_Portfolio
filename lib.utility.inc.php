<?php
require_once "db/connection/EDatabase.php";

function getMedia()
{
    $sql = "SELECT typeMedia FROM Media";
    $req = EDatabase::prepare($sql);
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}
