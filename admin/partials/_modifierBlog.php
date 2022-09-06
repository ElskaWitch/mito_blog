<?php
// on démarre la session ici
    session_start();
    
    // petit rappel: La combinaison en dessous permet de voir le lien parfait 
    //   echo $_SERVER['PHP_SELF']
    include('../helpers/functions.php'); //include function
    // inclure PDO (pdo.php) pour la connexion à la BDD dans mon script
    require_once("../helpers/pdo.php");
    // debug_array($_GET)  //on peut vérifier si ça prend bien enn compte dans le lien

    // création array error
    $error = [];
    $errorMessage = "<span class='text-red-500'>*Ce champs est obligatoire</span>";
    // variable success
    $success = false;

    
    // 1- verifie qu'on recupere id existant du jeux 
    // On vérifie que id existe (cad pas vide) et qu'il est numérique
    if(!empty($_GET['id']) && is_numeric($_GET['id'])){
    // 2- Je nettoie mon id contre xss
        // $id = trim(htmlspecialchars($_GET['id']));  //pareil en dessous
        $id = clear_xss($_GET['id']); //car créé dans functions.php
    // 3- faire la query (requête) vers BDD
        $sql = "SELECT * FROM blog WHERE id=:id";
    // 4- Préparation de la requête
        $query = $pdo->prepare($sql);
    // 5- Sécuriser la query (requête) contre injection sql
        $query->bindvalue(':id',$id, PDO::PARAM_INT);
    // 6- Execute la query vers la base de donnée BDD
        $query->execute();
    // 7- On stocke tout dans une variable le jeu récupéré
        $blog= $query->fetch();
        // debug_array($blog);
        // $blog=[]; //teste comment ça réagit lorsqu'il n'y a rien

        if(!$blog){
            $_SESSION["error"]= "Cet article n'est pas disponible !";
            header("Location: index.php");
        }
    } else {
        $_SESSION["error"]= "URL invalide !";
        header("Location: index.php");
    }

    // 2- On envoie vers la BDD
    if (!empty($_POST["submited"])) {
        require_once("../validation-formulaire/include.php");
        debug_array($_FILES);
        if(count($error) == 0){
        require_once("../sql/updateBlog-sql.php");
        }
    }
?>
<div class="pt-16">
  <a href="index.php" class="text-gray-100 bg-gray-800 hover:bg-gray-900 p-2 rounded uppercase text-xs ">Retour Accueil</a>
    <?php $main_title = "Modifier l'article";
      include("partials/_h1.php") ?>
    <form action="" method="POST" enctype="multipart/form-data">
      <!-- input for name -->
        <div class="mb-3">
          <label for="titre" class="font-semibold text-gray-100">Titre de l'article</label>
          <input type="text" name="titre" class="input input-bordered w-full max-w-xs block" value="<?= $blog["titre"]  ?>" />
          <p>
            <?php
            if (!empty($error["titre"])) {
            echo $error["titre"];
            }
            ?>
          </p>
        </div>
        <!-- input for auteur -->
        <div class="mb-3">
          <label for="auteur" class="font-semibold text-gray-100">Auteur</label>
          <input type="text" name="auteur" class="input input-bordered w-full max-w-xs block" value="<?= $blog["auteur"]  ?>" />
          <p>
            <?php
            if (!empty($error["auteur"])) {
            echo $error["auteur"];
            }
            ?>
          </p>
        </div>
        <!-- input description -->
      <div class="mt-5">
        <label for="description" class="font-semibold text-gray-100">Description</label>
        <textarea name="description" class="textarea textarea-bordered block" placeholder="Description de l'article"><?= $blog["description"] ?></textarea>
        <p>
          <?php
          if (!empty($error["description"])) {
            echo $error["description"];
          }
          ?>
        </p>
      </div>

        <!-- select for catégorie -->
      <?php
      $categorieArr = [
        ["name" => "Sport"],
        ["name" => "Politique"],
        ["name" => "Dev Web"],
        
      ]

      ?>
      <div class="">
        <h2 class="font-semibold text-gray-100 pt-4 pb-2">Catégorie</h2>
        <select class="select select-bordered w-full max-w-xs" name="categorie">
          <option disabled selected>Choisir la catégorie</option>
          <?php foreach ($categorieArr as $categorie) : ?>
            <option value="<?= $categorie["name"] ?>" <?php 
                                                  //je sauvegarde en memoire ce que le user a choisi
                                                  if ($blog["categorie"] == $categorie["name"]) echo 'selected="selected"'?>>
              <?= $categorie["name"] ?>
            </option>
          <?php endforeach ?>
        </select>
        <p>
          <?php
          if (!empty($error["categorie"])) {
            echo $error["categorie"];
          }
          ?>
        </p>
      </div>

      <!-- upload image img -->
    <div class="py-3 ">
      <label for="url_img" class="font-semibold text-gray-100 ">Votre image</label>
      <input type="file" class="text-gray-300 block mt-3 bg-black" id="url_img" name="url_img">
      <p>
        <?php
        if (!empty($error["url_img"])) {
          echo $error["url_img"];
        }
        ?>
      </p>
    </div>

      <!-- input id -->
      <input type="hidden" name="id" value="<?= $blog["id"] ?>">
      <!-- submit btn -->
      <div class="mt-4">
        <input type="submit" name="submited" value="Modifier" class="btn bg-blue-500">
      </div>
    </form>
</div>