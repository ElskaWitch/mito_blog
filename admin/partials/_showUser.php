<!-- header -->
<?php
// on démarre la session ici
    session_start();
    $title = "Afficher user"; // title for current page
    include('partials/_header.php'); //include header
    // petit rappel: La combinaison en dessous permet de voir le lien parfait 
    //   echo $_SERVER['PHP_SELF']
    include('../helpers/functions.php'); //include function
    // inclure PDO (pdo.php) pour la connexion à la BDD dans mon script
    require_once("../helpers/pdo.php");
    // debug_array($_GET)  //on peut vérifier si ça prend bien enn compte dans le lien

    // 1- On vérifie qu'on récupère id existant du jeu
    // On vérifie que id existe (cad pas vide) et qu'il est numérique
    if(!empty($_GET['id']) && is_numeric($_GET['id'])){
    // 2- Je nettoie mon id contre xss
        // $id = trim(htmlspecialchars($_GET['id']));  //pareil en dessous
        $id = clear_xss($_GET['id']); //car créé dans functions.php
    // 3- création la query (requête) vers BDD
        $sql = "SELECT * FROM user WHERE id=:id";
    // 4- Préparation de la requête
        $query = $pdo->prepare($sql);
    // 5- Sécuriser la query (requête) contre injection sql
        $query->bindvalue(':id',$id, PDO::PARAM_INT);
    // 6- Execute la query vers la base de donnée BDD
        $query->execute();
    // 7- On stocke tout dans une variable
        $user= $query->fetch();
        // debug_array($game);
        // $game=[]; //teste comment ça réagit lorsqu'il n'y a rien

        if(!$user){
            $_SESSION["error"]= "Cet utilisateur n'existe pas  !";
            header("Location:index.php");
        }
    } else {
        $_SESSION["error"]= "URL invalide !";
            header("Location:index.php");
    }
?>

<!-- main content -->
<main class="pt-16 text-gray-100">
    <a href="index.php" class="text-gray-100 bg-gray-800 hover:bg-gray-900 p-2 rounded uppercase text-xs ">Retour Accueil</a>
    <div class=" wrap_content-head">
        
    
        <div class="pt-6 flex space-x-4">
            <p>Nom: <?= $user["nom"] ?></p>
            <p>Prénom: <?= $user["prenom"] ?><span class="font-bold text-blue-500"></span></p>
            <p>Email: <?= $user["email"] ?><span class="font-bold text-blue-500"></span></p>
            <p>Demande de Newsletter:: <?= $user["created_at"] ?><span class="font-bold text-blue-500"></span></p>
        </div>
    <div class="pt-10">
        <!-- update btn bouton modifier -->
        <a href="modifierUser.php?id=<?= $user["id"] ?>&name=<?=$user["nom"] ?>" class="btn btn-success text-white">Modifier</a>
       <!-- delete -->
        <?php include("partials/_modalUser.php") ?>
        
    </div>
</main>
<!-- end main content -->

<!-- footer -->
<?php 
    include('partials/_footer.php') //include footer
?> 