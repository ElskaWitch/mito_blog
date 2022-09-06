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
<!-- <section class="section-products__cards container mt-20  ">
    
    <div>
        <?php 
            $cards=[
                [
                    "src"=>"home_sport.jpg",
                    "alt"=>"rubrique sport",
                    "titlecard"=>"Sport",
                    "description"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis sit aliquid minus itaque obcaecati voluptates nobis officiis, deserunt ducimus similique.", 
                    "href"=>"index-sports.php"
                ],
                [
                    "src"=>"home_politique.jpg",
                    "alt"=>"rubrique politique'",
                    "titlecard"=>"Politique",
                    "description"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis sit , deserunt ducimus similique. Ratione cupiditate alias totam fugit?",
                    "href"=>"index-politique.php"
                ],
                [
                    "src"=>"home_dev-web.jpg",
                    "alt"=>"rubrique développement Web",
                    "titlecard"=>"Dev Web",
                    "description"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis sit aliquid minus itaque obcaecati voluptates nobis officiis, deserunt ducimus similique. ",
                    "href"=>""
                ],
            ]?>
        
        <?php foreach ($cards as $card) {?>
        <div class="my-10 md:mx-40 md:flex md:items-center md:space-x-10 bg-gray-100">
            <img class="w-[400px]" src="img/<?= $card['src']?>" alt=<?= $card['alt']?>>
            <div>
                <h3 class="mt-2 font-extrabold text-3xl mb-3 "><?= $card['titlecard']?></h3>
                <p><?=$card['description'] ?></p>
                <div class="mt-10">
                  <a class="bg-red-500  p-2 rounded text-gray-100 hover:bg-red-700" href=<?= $card['href']?>>Consultez tous nos articles  <span class=" font-bold uppercase underline"> <?= $card['titlecard']?></span></a>

                </div>
            </div>
        </div>
        <?php } ?>
        </div>
      </section> 
        <section>
        <h2 class="text-5xl font-semibold text-center uppercase text-white p-10">Newsletter</h2>
        <form class=""action="" method="get">
        <div class="mb-6 grid justify-items-center ">
       <input
            type="email"
            id="email"
            class="bg-gray-50 border-2 border-l-gray-900 border-t-gray-900 border-r-gray-400 border-b-gray-400 text-gray-900 text-sm rounded-lg focus:ring-bluegeneraleinformation focus:border-blue-500 block w-full p-2.5  md:w-[400px]   "
            placeholder="Entrez votre mail pour recevoir notre Newsletter"
            required
          />
       
        <button
        type="submit"
        class="my-5 bg-red-500 font-medium  text-sm  sm:w-auto px-20 py-4 text-center rounded-full text-gray-100 hover:bg-red-700"
      >
        SUBMIT
      </button>
    </div>  
  </form>


</section> -->

<!-- section sport -->
<section  class="flex text-blue-500">
  <?php
  foreach ($sports as $sport) { ?>
   <a href="showBlog.php?id=<?=$sport['id'] ?>&name=<?= $sport['titre']?>&auteur=<?= $sport['auteur']?>">
    <div class="bg-gray-700 w-[150px] ">
      <h2><?= $sport['titre'] ?></h2>
      <p><?= $sport['auteur'] ?></p>
      <p><?= $sport['created_at'] ?></p>
      <div><img class="md:h-[75px]" src="<?= $sport["url_img"] ?>" alt="<?= $sport["titre"] ?>"></div>
   </div>
  </a>
 <?php } ?>
</section>

<!-- section politique -->
<section  class=" flex text-green-500">
  <?php
  foreach ($politiques as $politique) { ?>
   <div>
    <h2><?= $politique['titre'] ?></h2>
    <p><?= $politique['auteur'] ?></p>
   </div>
 <?php } ?>
</section>





<!-- footer -->
<?php 
    include('partials/_footer.php') //include footer
?> 