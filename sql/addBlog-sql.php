<?php
// 1- Ecriture de la requête (attention: noter name etc... à partir du tableau phpmyadmin d'où PEGI)
$sql = "INSERT INTO blog(titre, auteur, categorie, description, created_at, url_img) VALUES(:titre, :auteur, :categorie, :description, NOW(), :url_img)";

// 2- On prépare la requête
$query = $pdo->prepare($sql);

// 3- On associe chaque requête à sa valeur et protection contre injection SQL
$query->bindValue(':titre', $titre, PDO::PARAM_STR);
// STMT = Float, nombre à virgule)
$query->bindValue(':auteur', $auteur, PDO::PARAM_STR); 
$query->bindValue(':description', $description, PDO::PARAM_STR);
$query->bindValue(':categorie', $categorie, PDO::PARAM_STR);
$query->bindValue(':url_img', $url_img, PDO::PARAM_STR);

// 4- On execute la requête
$query->execute();

// 5- Redirection vers home
$_SESSION["success"] = "L'article a bien été ajouté";
header("Location: index.php");