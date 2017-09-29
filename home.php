<?php require_once 'head.php';
if (isset($_POST['logout'])) {
  session_destroy();
  unset($_COOKIE);
  header('location:home.php');
  exit;
}
if (isset($_POST['register'])) {
  $validacion = validarInformacion($_POST);
  if (count($validacion == 0)) {
    require_once 'dbregister.php';;
  }
}

if (isset($_POST['login'])) {
  require_once 'dblogin.php';
}

if (isset($_GET['products'])) {
  require_once 'products.php';
}


if (isset($_GET['faq'])) {
  require_once 'faqs.php';
}

if (isset($_GET['id'])) {
  require_once 'user.php';
}

if (isset($_GET['recovery'])) {
  require_once 'passrecovery.php';
}

if (isset($_GET['login'])) {
  require_once 'login.php';
}

if (isset($_GET['register'])) {
  require_once 'register.php';
}

if (empty($_GET)): ?>

  <div class="home" style="margin-top:30px;margin-bottom:30px;text-align:center">
    <span>soy Home!</span>
  </div>

<?php endif;

require_once 'foot.php'; ?>
