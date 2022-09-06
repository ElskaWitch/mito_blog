<!-- The button to open modal -->
<label for="<?= $user["id"] ?>" class="btn btn-error text-white modal-button">Supprimer</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="<?= $user["id"] ?>" class="modal-toggle" />
<div class="modal">
  <div class="modal-box">
    <h3 class="font-bold text-gray-700 text-lg">Voulez vous vraiment supprimer cet utilisateur?</h3>
    <div class="flex justify-center space-x-5 pt-5">
    <div class="modal-action">
      <label for="<?= $user["id"] ?>" class="btn">Non</label>
    </div>
    <div class="modal-action">
      <label for="<?= $user["id"] ?>" class="btn btn-primary">
        <a href="deleteUser.php?id=<?= $user["id"] ?>&name=<?=$user["nom"] ?>" >Oui</a>
    </label>
      
    </div>
    </div>
  </div>
</div>