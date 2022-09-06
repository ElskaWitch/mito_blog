<?php

//  1- On écrit la requête
$sql = "UPDATE blog SET titre = :titre, auteur = :auteur, categorie = :categorie, description = :description, url_img = :url_img, updated_at = NOW() WHERE id= :id";

// 2- Preparatoin de la requête
$query = $pdo->prepare($sql);

// 3- protection SQL et en associant requête et valeur
$query->bindvalue(':id', $id, PDO::PARAM_INT);
$query->bindValue(':titre', $titre, PDO::PARAM_STR);
$query->bindValue(':auteur', $auteur, PDO::PARAM_STR);
$query->bindValue(':description', $description, PDO::PARAM_STR);
$query->bindValue(':categorie', $categorie, PDO::PARAM_STR);
$query->bindValue(':url_img', $url_img, PDO::PARAM_STR);

// 4- execute la requête
$query->execute();

// 5- Redirection
$_SESSION["success"] = "L'article a bien été updaté";
// header("Location: index.php");