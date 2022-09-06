<!-- header -->
<?php
// on démarre la session ici
session_start();
  $title = "Accueil User"; // title for current page

  include('../helpers/functions.php'); //include function
    // petit rappel: La combinaison en dessous permet de voir le lien parfait 
  //   echo $_SERVER['PHP_SELF']

    // inclure PDO (pdo.php) pour la connexion à la BDD dans mon script
    require_once("../helpers/pdo.php");
    
    require_once("../sql/selectAllUser-sql.php")

?>
    
<!-- main content -->
<div class=" pt-16 wrap_content" >
    <!-- head content -->
    <div class=" wrap_content-head text-center">
        <?php $main_title = "Utilisateurs";
        include("../partials/_h1.php") ?>
        
        <?php $main_title = "Liste des utilisteurs";
        include("../partials/_p-indexblog.php") ?>
        
        <!-- ajouter un jeu button for add article user-->
        <!-- <div class="pt-4">
            <a href="adduser.php" class="btn bg-primary-500" >Add Article</a>
        </div> -->



        <?php require_once("partials/_alert.php") ?>
        
        
    </div>
    
    <!-- table -->
    <div class="overflow-x-auto mt-16">
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Supprimer</th>
                    <!-- <th>Supprimer</th> -->
                </tr>
            </thead>
            <tbody>
                <?php 
                    $index = 1;
                    if(count($users) == 0 ) {
                        echo"<tr><td class='text-center'>Pas de jeux disponibles actuellement</td></tr>";
                    } else { ?>
                        <?php foreach($users as $user): ?>
                        <tr class="hover:text-blue-500">
                            <th><?= $index++ ?></th>
                            <td><a class="hover:text-blue-500 hover:underline" href="showUser.php?id=<?=$user['id'] ?>&nom=<?= $user['nom'] ?>&prenom=<?= $user['prenom']?>"><?= $user['nom'] ?></a></td>
                            <td><?= $user['prenom'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <a href="showUser.php?id=<?=$user['id'] ?>&nom=<?= $user['nom']?>&prenom=<?= $user['prenom']?>&prenom=<?= $user['prenom']?>"> 
                                    <img src="img/loupe.png" alt="loupe" class="w-4 hover:text-blue-500">
                                </a>
                            </td>
                            <td>
                                <?php include("partials/_modalUser.php") ?>
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