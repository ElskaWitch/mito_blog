<!-- The button to open modal -->
<label for="<?= $sport["id"] ?>" class="btn btn-error text-white modal-button">Supprimer</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="<?= $sport["id"] ?>" class="modal-toggle" />
<div class="modal">
  <div class="modal-box">
    <h3 class="font-bold text-lg text-gray-900">Voulez vous vraiment supprimer cet article?</h3>
    <div class="flex justify-center space-x-5 pt-5">
    <div class="modal-action">
      <label for="<?= $sport["id"] ?>" class="btn">Non</label>
    </div>
    <div class="modal-action">
      <label for="<?= $sport["id"] ?>" class="btn btn-primary">
        <a href="deleteSport.php?id=<?= $sport["id"] ?>&name=<?=$sport["titre"] ?>" >Oui</a>
    </label>
      
    </div>
    </div>
  </div>
</div>