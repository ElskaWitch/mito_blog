<?php 
include("../helpers/pdo.php");
require_once("../sql/selectAllPolitique-sql.php"); 
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
                    if(count($politiques) == 0 ) {
                        echo"<tr><td class='text-center'>Pas de jeux disponibles actuellement</td></tr>";
                    } else { ?>
                        <?php foreach($politiques as $politique): ?>
                        <tr class="hover:text-blue-500">
                            <th><?= $index++ ?></th>
                            <td><a class="hover:text-blue-500 hover:underline" href="showBlog.php?id=<?=$politique['id'] ?>&titre=<?= $politique['titre'] ?>&auteur=<?= $politique['auteur']?>"><?= $politique['titre'] ?></a></td>
                            <td><?= $politique['auteur'] ?></td>
                            <td><?= $politique['categorie'] ?></td>
                            <!-- <td><?= $politique['description'] ?></td> -->
                            <td>
                                <a href="showBlog.php?id=<?=$politique['id'] ?>&name=<?= $politique['titre']?>&auteur=<?= $politique['auteur']?>"> 
                                    <img src="img/loupe.png" alt="loupe" class="w-4 hover:text-blue-500">
                                </a>
                            </td>
                            <td>
                                <!-- update btn bouton modifier -->
                                <a href="modifierBlog.php?id=<?= $politique["id"] ?>&name=<?=$politique["titre"] ?>" class="btn btn-success text-white">Modifier</a>
                            </td>
                            <td>
                                <?php include("partials/_modalPolitique.php") ?>
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
