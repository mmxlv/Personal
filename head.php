<?php
  require_once 'funciones.php';
  $uid = 0;
  if (isset($_SESSION['logged'])) {
    $uid = $_SESSION['id'];
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/master.css">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Synapze</title>
  </head>
    <body>
      <div class="logo">
        <a href="home.php"><img src="img/black_logo.png" alt=""></a>
      </div>
      <div class="head_container">
        <div class="links">
          <ul>
            <a href="home.php?products">Products</a>
            <a href="home.php?faq">Quienes Somos</a>
            <?php if (isset($_SESSION['logged'])): ?>
              <a href="home.php?id=<?=$uid?>">Panel de usuario</a>
              <form class="logout-btn" action="home.php" method="post">
                <input type="submit" name="logout" value="Log Out">
              </form>
            <?php else: ?>
              <a href="home.php?login">Login</a>
              <span class="span-sep">Or</span>
              <a href="home.php?register">Register</a>
            <?php endif; ?>
          </ul>
        </div>
      </div>
