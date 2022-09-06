<?php
// name
if (!empty($titre)) {
  if (
    strlen($titre) <= 2
  ) {
    $error["titre"] = "<span class=text-red-500>*3 caractères minimum</span>";
  } elseif (strlen($titre) > 100) {
    $error["titre"] = "<span class=text-red-500>*100 caractères maximum</span>";
  }
} else {
  $error["titre"] = $errorMessage;
};