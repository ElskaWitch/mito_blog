<!-- The button to open modal -->
<label for="<?= $blog["id"] ?>" class="btn btn-error text-white modal-button">Supprimer</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="<?= $blog["id"] ?>" class="modal-toggle" />
<div class="modal">
  <div class="modal-box">
    <h3 class="font-bold text-lg text-gray-900">Voulez vous vraiment supprimer cet article?</h3>
    <div class="flex justify-center space-x-5 pt-5">
    <div class="modal-action">
      <label for="<?= $blog["id"] ?>" class="btn">Non</label>
    </div>
    <div class="modal-action">
      <label for="<?= $blog["id"] ?>" class="btn btn-primary">
        <a href="deleteBlog.php?id=<?= $blog["id"] ?>&name=<?=$blog["titre"] ?>" >Oui</a>
    </label>
      
    </div>
    </div>
  </div>
</div>