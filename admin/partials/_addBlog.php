<!-- header -->
<?php
// start session
session_start();

include("../helpers/functions.php"); // include function
// inclure PDO pour la connexion a la BDD dans mon script
require_once("../helpers/pdo.php");

//////////////////////////////////
// Traitetement du formulaire
///////////////////////////////////
// création array error
$error = [];
$errorMessage = "<span class='text-red-500'>*Ce champs est obligatoire</span>";
// variable success
$success = false;

// 1- je verifie que le btn submit fonctionne en affichant un message echo "Hourra"
if (!empty($_POST["submited"]) && isset($_FILES["url_img"]) && $_FILES["url_img"]["error"] == 0) {
  require_once("../validation-formulaire/include.php");
  // debug_array($_FILES);
  if (count($error) == 0) {
    require_once("../sql/addBlog-sql.php");
  }
}
?>
<section class="py-12">
  <a href="index.php" class="text-gray-100 bg-gray-800 hover:bg-gray-900 p-2 rounded uppercase text-xs ">Retour Accueil</a>
  <h1 class="text-5xl text-center font-semibold uppercase p-10 text-gray-100">Ajouter un article </h1>
  <form action="" method="POST" enctype="multipart/form-data">
    
    <!-- input for titre -->
    <div class="mb-3">
      <label for="titre" class="font-semibold text-gray-100">Titre</label>
      <input type="text" name="titre" class="text-gray-300 input input-bordered w-full max-w-xs bg-gray-700 block" value="<?php
                                                                                                if (!empty($_POST["titre"])) {
                                                                                                  echo $_POST["titre"];
                                                                                                } ?>" />
      <p>
        <?php
        if (!empty($error["titre"])) {
          echo $error["titre"];
        }
        ?>
      </p>
    </div>
    <!-- input for auteur-->
    <div class="mb-3">
      <label for="auteur" class="font-semibold text-gray-100">Auteur</label>
      <input type="text" name="auteur" class="text-gray-300 input input-bordered w-full max-w-xs bg-gray-700 block" value="<?php
                                                                                                if (!empty($_POST["auteur"])) {
                                                                                                  echo $_POST["auteur"];
                                                                                                } ?>" />
      <p>
        <?php
        if (!empty($error["auteur"])) {
          echo $error["auteur"];
        }
        ?>
      </p>
    </div>
    <!-- select for categorie -->
    <?php
    $categorieArr = [
      ["name" => "Sport"],
      ["name" => "Politique"],
      ["name" => "Dev Web"],
    ]

    ?>
    <div class="">
      <h2 class="font-semibold text-gray-100 pt-4 pb-2">Catégorie</h2>
      <select class="text-gray-300 select select-bordered w-full bg-gray-700 max-w-xs" name="categorie">
        <option class="text-gray-200" disabled selected>Choisir la catégorie</option>
        <?php foreach ($categorieArr as $categorie) : ?>
          <option value="<?= $categorie["name"] ?>" 
          <?php 
            // Je sauvegarde en mémoire ce que le user a choisi
            if(!empty($_POST["categorie"])){
              if($_POST["categorie"] == $categorie["name"]) echo 'selected="selected"';
            }
            ?>>
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
    <!-- input description -->
    <div class="mt-5">
      <label for="description" class="font-semibold text-gray-100">Description</label>
      <textarea name="description" class="textarea textarea-bordered block text-gray-300 bg-gray-700 md:w-[50%]" placeholder="Description de l'article"><?php if (!empty($_POST["description"])) {
                                                                                                                echo $_POST["description"];
                                                                                                              } ?></textarea>
      <p>
        <?php
        if (!empty($error["description"])) {
          echo $error["description"];
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

    <!-- submit btn -->
    <div class="mt-4">
      <input type="submit" name="submited" value="Ajouter" class="btn bg-blue-500">
    </div>
  </form>
  
</section>

<!-- footer -->
<?php
include("partials/_footer.php") // include footer
?>