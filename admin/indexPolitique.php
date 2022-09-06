<!-- header -->
<?php
    $title= "Admin Dashboard";
    include ("partials/_header.php");
?>


<!-- content -->
<div class="parent flex">
  <?php  
    include("partials/_left-navigation.php")?>
    <div class="content-right p-8">
        <?php include("partials/_tablePolitique.php") ?>
    </div>
</div>  