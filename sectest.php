<?php
function adminLevel($dato){
  //terminar de armar funcion
  //falta adml en mysql
  $sql = "SELECT * FROM usuario WHERE LIKE :usuario";
  $sql->bindValue(":usuario", $dato["usuario"]);
  $return = fetch_assoc("algo que no recuerdo");
  $_SESSION["adml"] = $return["adml"];
}
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
