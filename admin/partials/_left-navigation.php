<div class="nav-left p-8 bg-gray-800 w-[16%] h-screen fixed sticky top-0 ">
    <div>
    <a class="font-bold text-[40px] bg-gray-100 rounded p-2" href="index.php">Mit<span class="text-red-500">o</span>Bl<span class="text-red-500">o</span>g</a>
  </div>
    <ul class="text-gray-400 mt-10 leading-loose">
        <li><a class="hover:font-bold hover:text-gray-100 <?php echo (basename($_SERVER['PHP_SELF'])=='indexSport.php')?"active font-bold text-red-500":"" ?>" href="indexSport.php">Articles Sport</a></li>
        <li><a class="hover:font-bold hover:text-gray-100 <?php echo (basename($_SERVER['PHP_SELF'])=='indexPolitique.php')?"active font-bold text-red-500":"" ?>" href="indexPolitique.php">Articles Politique</a></li>
        <li><a class="hover:font-bold hover:text-gray-100 <?php echo (basename($_SERVER['PHP_SELF'])=='indexDevweb.php')?"active font-bold text-red-500":"" ?>" href="indexDevweb.php">Articles Dev Web</a></li>
        <li><a class="hover:font-bold hover:text-gray-100 <?php echo (basename($_SERVER['PHP_SELF'])=='indexUser.php')?"active font-bold text-red-500":"" ?>" href="indexUser.php">Suscribers</a></li>
    </ul>
    <div class="mt-20">
        <a href="addBlog.php" class="btn bg-blue-500" >Add Article</a>
    </div>
    
    <div class="mt-40">
        <a href="../index.php" class="btn ">Retour au Blog</a>
    </div>
</div>

