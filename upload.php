<?php
require_once "lib.utility.inc.php";

$commentaire = filter_input(INPUT_POST, "commentaire", FILTER_SANITIZE_STRING);

if (!empty($commentaire)) {
    addPost($commentaire, $_FILES['img']['type'], $_FILES['img']['name'], $_FILES['img']['tmp_name']);
}


header("Location: post.php");
exit;
