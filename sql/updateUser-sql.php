<?php

//  1- On écrit la requête
$sql = "UPDATE user SET nom = :nom, prenom = :prenom, email = :email WHERE id= :id";

// 2- Preparatoin de la requête
$query = $pdo->prepare($sql);

// 3- protection SQL et en associant requête et valeur
$query->bindvalue(':id', $id, PDO::PARAM_INT);
$query->bindValue(':nom', $nom, PDO::PARAM_STR);
$query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$query->bindValue(':email', $email, PDO::PARAM_STR);

// 4- execute la requête
$query->execute();

// 5- Redirection
$_SESSION["success"] = "L'utilisateur a bien été updaté";
header("Location: indexUser.php");