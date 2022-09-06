<?php
// 1- Ecriture de la requête (attention: noter name etc... à partir du tableau phpmyadmin d'où PEGI)
$sql = "INSERT INTO user(nom, prenom, email, created_at) VALUES(:nom, :prenom, :email, NOW())";

// 2- On prépare la requête
$query = $pdo->prepare($sql);

// 3- On associe chaque requête à sa valeur et protection contre injection SQL
$query->bindValue(':nom', $nom, PDO::PARAM_STR);
// STMT = Float, nombre à virgule)
$query->bindValue(':prenom', $prenom, PDO::PARAM_STR); 
$query->bindValue(':email', $email, PDO::PARAM_STR);

// 4- On execute la requête
$query->execute();

// 5- Redirection vers home
$_SESSION["success"] = "L'utilisateur a bien été ajouté";
header("Location: index.php");