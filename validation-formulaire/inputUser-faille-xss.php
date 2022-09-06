<?php
// On vérifie que le user a selectionné unitem sinon ce champs est obligtoire
$nom = clear_xss($_POST["nom"]);
$prenom = clear_xss($_POST["prenom"]);
$email = clear_xss($_POST["email"]);
