<!--navigation -->
<nav class="p-10 flex justify-between items-center bg-black">
  <div>
    <a class="font-bold text-[40px] bg-gray-100 rounded p-2" href="index.php">Mit<span class="text-red-500">o</span>Bl<span class="text-red-500">o</span>g</a>
  </div>
  <div >
    <ul class="flex space-x-10 text-gray-100 font-light text-xl uppercase ">
      <li><a href="index-sports.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='index.php')?"active font-bold border-b-2 border-red-500 pb-4":"" ?>">Sport</a></li>
      <li><a href="index-politique.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=='index.php')?"active font-bold border-b-2 border-red-500 pb-4":"" ?>">Politique</a></li>
      <li><a href="" class="<?php echo (basename($_SERVER['PHP_SELF'])=='')?"active font-bold border-b-2 border-red-500 pb-4":"" ?>">Dev Web</a></li>
    </ul>
  </div>
  <div class="text-gray-100">
    <button class="border-solid border-2 border-gray-100 rounded p-2"> <a href=""><ion-icon class="text-[30px]" name="cog-outline"></ion-icon><p>BackOffice</p></a> </button>
  </div>
    
</nav>

