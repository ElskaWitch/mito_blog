<?php
// email
if (!empty($email)) {
  if (
    strlen($email) <= 2
  ) {
    $error["email"] = "<span class=text-red-500>*3 caractères minimum</span>";
  } elseif (strlen($email) > 30) {
    $error["email"] = "<span class=text-red-500>*100 caractères maximum</span>";
  }
} else {
  $error["email"] = $errorMessage;
};