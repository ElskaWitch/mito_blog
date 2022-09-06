<!-- header -->
<?php
    $title= "Ajouter un blog";
    include ("partials/_header.php");
?>


<!-- content -->
<div class="parent flex">
  <?php  
    include("partials/_left-navigation.php")?>
    <div class="content-right p-8">
        <?php include("partials/_addBlog.php") ?>
    </div>
</div>    