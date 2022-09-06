<!-- header -->
<?php
// on démarre la session ici
session_start();
  $title = "Accueil Blog Sport"; // title for current page
  include('partials/_header.php'); //include header
  include('helpers/functions.php'); //include function
    // petit rappel: La combinaison en dessous permet de voir le lien parfait 
  //   echo $_SERVER['PHP_SELF']

    // inclure PDO (pdo.php) pour la connexion à la BDD dans mon script
    require_once("helpers/pdo.php");
    
    require_once("sql/selectAllSports-sql.php")

?>
    
<!-- main content -->
<div class=" pt-16 wrap_content" >
    <!-- head content -->
    <div class=" wrap_content-head text-center">
        <?php $main_title = "Blog Sport";
        include("partials/_h1.php") ?>
        
        <p>L'app qui répertorie vos jeux</p>
        
        <!-- ajouter un jeu button for add article sport-->
        <div class="pt-4">
            <a href="addSport.php" class="btn bg-primary-500" >Add Article Sport</a>
        </div>



        <?php require_once("partials/_alert.php") ?>
        
        
    </div>
    
    <!-- table -->
    <div class="overflow-x-auto mt-16">
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Catégorie</th>
                    <!-- <th>Description</th> -->
                    <th>voir</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $index = 1;
                    if(count($sports) == 0 ) {
                        echo"<tr><td class='text-center'>Pas de jeux disponibles actuellement</td></tr>";
                    } else { ?>
                        <?php foreach($sports as $sport): ?>
                        <tr class="hover:text-blue-500">
                            <th><?= $index++ ?></th>
                            <td><a class="hover:text-blue-500 hover:underline" href="show.php?id=<?=$sport['id'] ?>&titre=<?= $sport['titre'] ?>&auteur=<?= $sport['auteur']?>"><?= $sport['titre'] ?></a></td>
                            <td><?= $sport['auteur'] ?></td>
                            <td><?= $sport['categorie'] ?></td>
                            <!-- <td><?= $sport['description'] ?></td> -->
                            <td>
                                <a href="show-sports.php?id=<?=$sport['id'] ?>&name=<?= $sport['titre']?>&auteur=<?= $sport['auteur']?>"> 
                                    <img src="img/loupe.png" alt="loupe" class="w-4 hover:text-blue-500">
                                </a>
                            </td>
                            <td>
                                <?php include("partials/_modalSports.php") ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    <!-- http://localhost/php/app_game/show.php -->
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>
<!-- end main content -->

<!-- footer -->
<?php 
    include('partials/_footer.php') //include footer
?> 