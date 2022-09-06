<?php 
include("../helpers/pdo.php");
require_once("../sql/selectAllBlog-sql.php"); 
?>

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
                    <th>modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $index = 1;
                    if(count($blogs) == 0 ) {
                        echo"<tr><td class='text-center'>Pas de jeux disponibles actuellement</td></tr>";
                    } else { ?>
                        <?php foreach($blogs as $blog): ?>
                        <tr class="hover:text-blue-500">
                            <th><?= $index++ ?></th>
                            <td><a class="hover:text-blue-500 hover:underline" href="showBlog.php?id=<?=$blog['id'] ?>&titre=<?= $blog['titre'] ?>&auteur=<?= $blog['auteur']?>"><?= $blog['titre'] ?></a></td>
                            <td><?= $blog['auteur'] ?></td>
                            <td><?= $blog['categorie'] ?></td>
                            <!-- <td><?= $blog['description'] ?></td> -->
                            <td>
                                <a href="showBlog.php?id=<?=$blog['id'] ?>&name=<?= $blog['titre']?>&auteur=<?= $blog['auteur']?>"> 
                                    <img src="img/loupe.png" alt="loupe" class="w-4 hover:text-blue-500">
                                </a>
                            </td>
                            <td>
                                <!-- update btn bouton modifier -->
                                <a href="modifierBlog.php?id=<?= $blog["id"] ?>&name=<?=$blog["titre"] ?>" class="btn btn-success text-white">Modifier</a>
                            </td>
                            <td>
                                <?php include("partials/_modalBlog.php") ?>
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
