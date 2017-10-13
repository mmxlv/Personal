<?php
if ($_SESSION["adml"] > 10) {
  require_once 'file.php';
}else(
  echo "No deverias estar aca!";
  echo "<a href="home.php">Run!</a>";
  exit;
  )
if (empty($_SESSION["adml"])) {
  header("location:home.php")
  exit;
}
?>
