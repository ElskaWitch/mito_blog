<?php
//prenom
if (!empty($prenom)) {
  if (
    strlen($prenom) <= 2
  ) {
    $error["titre"] = "<span class=text-red-500>*3 caractères minimum</span>";
  } elseif (strlen($prenom) > 30) {
    $error["prenom"] = "<span class=text-red-500>*100 caractères maximum</span>";
  }
} else {
  $error["prenom"] = $errorMessage;
};