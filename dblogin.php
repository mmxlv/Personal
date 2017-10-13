<?php
$dsn = 'mysql:host=localhost;dbname=ecommerce;charset=utf8mb4;port=3306';
$db_user = 'root';
$db_pass = '';

$db = new PDO($dsn, $db_user, $db_pass);

try {
  $db->beginTransaction();
  $query = $db->prepare('SELECT * FROM usuarios WHERE username LIKE :userLogin');
  $query->bindValue(':userLogin', $_POST['username']);
  $query->execute();
  $db->commit();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  $db->rollBack();
  echo $e->getMessage();
}
if (count($result) == 0) {
  echo "el usuario no existe";
}else {
  $_SESSION = $result[0];
  $_SESSION['adml'] = (int) $_SESSION['adml'];
  $validError = validarLogin($_POST);
  $db = NULL;
  if (count($validError)>0) {
    foreach ($validError as $key => $value) {
      echo "$value";
    }
  } else {
    $_SESSION['password'] = NULL;
    loginUser($_SESSION);
    header('location:home.php');
    exit;
  }
}



?>
