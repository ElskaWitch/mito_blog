<?php
     // 1- Requête pour récupérer mes jeux / Query to get all games
    $sql =  "SELECT * FROM  blog WHERE categorie = 'politique'"; //si l'on veut plus spécifique on remplace * par name, genre...
    // 2- Prépare la requête (preformater la requête)
    $query = $pdo->prepare($sql);
    // 3- execute ma requête
    $query->execute();
    // 4- On stocke ma requête dans une variable / stock my query in variable
    $politiques = $query->fetchAll();
    // debug_array($politiques); //affiche le tabelau avec tous les objets

  