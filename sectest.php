<?php
require_once 'funciones.php';
if ($_SESSION["adml"] > 10) {
  // require_once 'file.php';
  echo "adml 10";
}else{
  echo "No deverias estar aca!";
  echo '<a href=home.php>Run!</a>';
  exit;
  }
?>
