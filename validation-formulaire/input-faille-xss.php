<?php
// On vérifie que le user a selectionné unitem sinon ce champs est obligtoire
$titre = clear_xss($_POST["titre"]);
$auteur = clear_xss($_POST["auteur"]);
$categorie = !empty ($_POST["categorie"]) ? clear_xss($_POST["categorie"]) : [];
$description = clear_xss($_POST["description"]);
// $url_img = $GLOBALS["img_upload_path"] ;
$url_img = $img_upload_path;