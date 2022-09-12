<!-- header -->
<?php
// on démarre la session ici
session_start();
  $title = "Accueil"; // title for current page
  include('partials/_header.php'); //include header
  include('helpers/functions.php'); //include function
    // petit rappel: La combinaison en dessous permet de voir le lien parfait 
  //   echo $_SERVER['PHP_SELF']

    // inclure PDO (pdo.php) pour la connexion à la BDD dans mon script
    require_once("helpers/pdo.php");
    
    require_once("sql/selectAll-sql.php");

?>

<!-- Main content -->

<div class="">
  <?php $main_title = "Nos Articles";
    include("partials/_h1.php") ?>

  <p class="container font-bold text-gray-100 mt-20">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore illo temporibus sapiente aliquam eius tempora optio possimus voluptatibus quis odit quae eveniet velit placeat error quos ea facilis quisquamdolore similique aliquid, veniam esse minima laboriosam at hic ad quo. Hic consequatur explicabo at sit soluta?</p>
</div>

<!-- section sport -->
<div class="">
  <?php $main_title = "Sport";
    include("partials/_h2.php") ?>
</div>
<div class="carousel carousel-center max-w-[100%] p-4 space-x-4 bg-black-500 rounded-box">
  <div class="carousel-item">
    <section  class="mt-10 flex justify-center space-x-10 text-gray-100 ">
      <?php
      foreach ($sports as $sport) { ?>
      <a href="showBlog.php?id=<?=$sport['id'] ?>&name=<?= $sport['titre']?>&auteur=<?= $sport['auteur']?>">
        <div class="p-2 bg-gray-900 w-[200px] h-[300px] rounded grid justify-items-center text-center ">
          <div>
            <h2 class="font-bold mb-2 text-[20px]" ><?= $sport['titre'] ?></h2>
            <p class="mt-4 mb-5" >Auteur: <?= $sport['auteur'] ?></p>
            <p class="italic text-gray-400"><?= $sport['created_at'] ?></p>
          </div>
          <img class="mt-2 h-[110px]" src="admin/<?= $sport["url_img"] ?>" alt="<?= $sport["titre"] ?>">
      </div>
      </a>
    <?php } ?>
    </section> 
  </div>
</div>

<!-- section politique -->
<div class="">
  <?php $main_title = "Politique";
    include("partials/_h2.php") ?>
</div>
<div class="carousel carousel-center max-w-[100%] p-4 space-x-4 bg-black-500 rounded-box">
  <div class="carousel-item">
    <section  class="mt-10 flex justify-center space-x-10 text-gray-100 ">
      <?php
      foreach ($politiques as $politique) { ?>
      <a href="showBlog.php?id=<?=$politique['id'] ?>&name=<?= $politique['titre']?>&auteur=<?= $politique['auteur']?>">
        <div class="p-2 bg-gray-900 w-[200px] h-[300px] rounded grid justify-items-center text-center ">
          <div>
            <h2 class="font-bold mb-2 text-[20px]" ><?= $politique['titre'] ?></h2>
            <p class="mt-4 mb-5" >Auteur: <?= $politique['auteur'] ?></p>
            <p class="italic text-gray-400"><?= $politique['created_at'] ?></p>
          </div>
          <img class="mt-2 h-[110px]" src="admin/<?= $politique["url_img"] ?>" alt="<?= $politique["titre"] ?>">
      </div>
      </a>
    <?php } ?>
    </section>
  </div>
</div>

<!-- section Sev Web -->
<div class="">
  <?php $main_title = "Dev-Web";
    include("partials/_h2.php") ?>
</div>    
<div class="carousel carousel-center max-w-[100%] p-4 space-x-4 bg-black-500 rounded-box">
  <div class="carousel-item">    
    <section  class="mt-10 flex justify-center space-x-10 text-gray-100 ">
      <?php
      foreach ($dev_webs as $dev_web) { ?>
      <a href="showBlog.php?id=<?=$dev_web['id'] ?>&name=<?= $dev_web['titre']?>&auteur=<?= $dev_web['auteur']?>">
        <div class="p-2 bg-gray-900 w-[200px] h-[300px] rounded grid justify-items-center text-center ">
          <div>
            <h2 class="font-bold mb-2 text-[20px]" ><?= $dev_web['titre'] ?></h2>
            <p class="mt-4 mb-5" >Auteur: <?= $dev_web['auteur'] ?></p>
            <p class="italic text-gray-400"><?= $dev_web['created_at'] ?></p>
          </div>
          <img class="mt-2 h-[110px]" src="admin/<?= $dev_web["url_img"] ?>" alt="<?= $dev_web["titre"] ?>">
      </div>
      </a>
    <?php } ?>
    </section>
  </div>
</div>

<section>
  <h2 class="text-5xl font-semibold text-center uppercase text-white p-10 mt-20">Newsletter</h2>
  <div class="mb-6 grid justify-items-center placeholder=">
    <!-- <a class="text-white" href="addUser.php">coucou</a> -->
    <button class="my-5 bg-red-500 font-medium sm:w-auto px-20 py-4 text-center rounded-full text-white hover:bg-red-700"
        type="submit"
        class="my-5 bg-red-500 font-medium sm:w-auto px-20 py-4 text-center rounded-full text-white hover:bg-red-700"
      >
        <a class="text-white" href="addUser.php">SUBMIT</a> 
    </button>
  </div>
</section>



<!-- footer -->
<?php 
    include('partials/_footer.php') //include footer
?> 