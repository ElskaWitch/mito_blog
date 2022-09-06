<!-- header -->
<?php
// start session
session_start();
$title = "Ajouter Utilisateur"; // title for current page
include("partials/_header.php"); // include header
include("helpers/functions.php"); // include function
// inclure PDO pour la connexion a la BDD dans mon script
require_once("helpers/pdo.php");

//////////////////////////////////
// Traitetement du formulaire
///////////////////////////////////
// création array error
$error = [];
$errorMessage = "<span class='text-red-500'>*Ce champs est obligatoire</span>";
// variable success
$success = false;

// 1- je verifie que le btn submit fonctionne en affichant un message echo "Hourra"
if (!empty($_POST["submited"])) {
  require_once("validation-formulaire/includeUser.php");
  // debug_array($_FILES);
  if (count($error) == 0) {
    require_once("sql/addUser-sql.php");
  }
}
?>

<section class="py-12">
  <a href="index.php" class="text-gray-100 bg-gray-800 hover:bg-gray-900 p-2 rounded uppercase text-xs ">Retour Accueil</a>
  <h1 class="text-5xl text-center font-semibold uppercase p-10 text-gray-100">Viendez Nombreux!!</h1>
  <form class="grid justify-center" action="" method="POST" enctype="multipart/form-data">
    
    <!-- input for nom -->
    <div class="mb-3">
      <label for="nom" class="font-semibold text-gray-100">Nom</label>
      <input type="text" name="nom" class="text-gray-300 input input-bordered w-full max-w-xs bg-gray-700 block" value="<?php
                                                                                                if (!empty($_POST["nom"])) {
                                                                                                  echo $_POST["nom"];
                                                                                                } ?>" />
      <p>
        <?php
        if (!empty($error["nom"])) {
          echo $error["nom"];
        }
        ?>
      </p>
    </div>
    <!-- input for prenom-->
    <div class="mb-3">
      <label for="prenom" class="font-semibold text-gray-100">Prenom</label>
      <input type="text" name="prenom" class="text-gray-300 input input-bordered w-full max-w-xs bg-gray-700 block" value="<?php
                                                                                                if (!empty($_POST["prenom"])) {
                                                                                                  echo $_POST["prenom"];
                                                                                                } ?>" />
      <p>
        <?php
        if (!empty($error["prenom"])) {
          echo $error["prenom"];
        }
        ?>
      </p>
    </div>
    <!-- input for email-->
    <div class="mb-3">
      <label for="email" class="font-semibold text-gray-100">Email</label>
      <input type="email" name="email" class="text-gray-300 input input-bordered w-full max-w-xs bg-gray-700 block" value="<?php
                                                                                                if (!empty($_POST["email"])) {
                                                                                                  echo $_POST["email"];
                                                                                                } ?>" />
      <p>
        <?php
        if (!empty($error["email"])) {
          echo $error["email"];
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