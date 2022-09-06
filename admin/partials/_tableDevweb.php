<?php 
include("../helpers/pdo.php");

require_once("../sql/selectAllDevweb-sql.php"); 
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
                    if(count($dev_webs) == 0 ) {
                        echo"<tr><td class='text-center'>Pas de jeux disponibles actuellement</td></tr>";
                    } else { ?>
                        <?php foreach($dev_webs as $dev_web): ?>
                        <tr class="hover:text-blue-500">
                            <th><?= $index++ ?></th>
                            <td><a class="hover:text-blue-500 hover:underline" href="showBlog.php?id=<?=$dev_web['id'] ?>&titre=<?= $dev_web['titre'] ?>&auteur=<?= $dev_web['auteur']?>"><?= $dev_web['titre'] ?></a></td>
                            <td><?= $dev_web['auteur'] ?></td>
                            <td><?= $dev_web['categorie'] ?></td>
                            <!-- <td><?= $dev_web['description'] ?></td> -->
                            <td>
                                <a href="showBlog.php?id=<?=$dev_web['id'] ?>&name=<?= $dev_web['titre']?>&auteur=<?= $dev_web['auteur']?>"> 
                                    <img src="img/loupe.png" alt="loupe" class="w-4 hover:text-blue-500">
                                </a>
                            </td>
                            <td>
                                <!-- update btn bouton modifier -->
                                <a href="modifierBlog.php?id=<?= $dev_web["id"] ?>&name=<?=$dev_web["titre"] ?>" class="btn btn-success text-white">Modifier</a>
                            </td>
                            <td>
                                <!-- bouton supprimer -->
                                <?php include("partials/_modalDevweb.php") ?>
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