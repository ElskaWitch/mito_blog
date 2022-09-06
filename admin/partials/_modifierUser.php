<?php
// on démarre la session ici
    session_start();
    $title = "Modifier User"; // title for current page
    include('partials/_header.php'); //include header
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
        $sql = "SELECT * FROM user WHERE id=:id";
    // 4- Préparation de la requête
        $query = $pdo->prepare($sql);
    // 5- Sécuriser la query (requête) contre injection sql
        $query->bindvalue(':id',$id, PDO::PARAM_INT);
    // 6- Execute la query vers la base de donnée BDD
        $query->execute();
    // 7- On stocke tout dans une variable le jeu récupéré
        $user= $query->fetch();
        // $user=[]; //teste comment ça réagit lorsqu'il n'y a rien

        if(!$user){
            $_SESSION["error"]= "Cet utilisateur n'existe pas !";
            header("Location: index.php");
        }
    } else {
        $_SESSION["error"]= "URL invalide !";
        header("Location: index.php");
    }

    // 2- On envoie vers la BDD
    if (!empty($_POST["submited"])) {
        require_once("../validation-formulaire/includeUser.php");
        if(count($error) == 0){
        require_once("../sql/updateUser-sql.php");
        }
    }
?>
<div class="pt-16">
  <a href="index.php" class="text-gray-100 bg-gray-800 hover:bg-gray-900 p-2 rounded uppercase text-xs ">Retour Accueil</a>
    <?php $main_title = "Modifier l'utilisateur";
      include("../partials/_h1.php") ?>
    <form action="" method="POST">
      <!-- input for name -->
        <div class="mb-3">
          <label for="nom" class="font-semibold text-gray-100">Nom</label>
          <input type="text" name="nom" class="text-gray-300 bg-gray-700 input input-bordered w-full max-w-xs block" value="<?= $user["nom"]  ?>" />
          <p>
            <?php
            if (!empty($error["nom"])) {
            echo $error["nom"];
            }
            ?>
          </p>
        </div>
        <!-- input for prenom -->
        <div class="mb-3">
          <label for="prenom" class="font-semibold text-gray-100">Prenom</label>
          <input type="text" name="prenom" class="text-gray-300 bg-gray-700 input input-bordered w-full max-w-xs block" value="<?= $user["prenom"]  ?>" />
          <p>
            <?php
            if (!empty($error["prenom"])) {
            echo $error["prenom"];
            }
            ?>
          </p>
        </div>
        <!-- input for email -->
        <div class="mb-3">
          <label for="email" class="font-semibold text-gray-100">Email</label>
          <input type="email" name="email" class="text-gray-300 bg-gray-700 input input-bordered w-full max-w-xs block" value="<?= $user["email"]  ?>" />
          <p>
            <?php
            if (!empty($error["email"])) {
            echo $error["email"];
            }
            ?>
          </p>
        </div>
       
      <!-- input id -->
      <input type="hidden" name="id" value="<?= $user["id"] ?>">
      <!-- submit btn -->
      <div class="mt-4">
        <input type="submit" name="submited" value="Modifier" class="btn bg-blue-500">
      </div>
    </form>
</div>