<?php

$dsn = 'mysql:host=localhost;dbname=ecommerce;charset=utf8mb4;port=3306';
$db_user = 'root';
$db_pass = '';

if (validarExistencia($_POST) == true) {
  //password hashing
  $passhash = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
  $username = $_REQUEST['userName'];
  $email = $_REQUEST['email'];
  $password = $passhash;

  $db = new PDO($dsn, $db_user, $db_pass);

  try {
    $db->beginTransaction();
    $query = $db->prepare('INSERT INTO usuarios (username, email, password) VALUES (:username, :email, :password)');
    $query->bindValue(':username', $username);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);
    $query->execute();
    $db->commit();
    header("location:home.php");
  } catch (PDOException $e) {
    $db->rollBack();
    echo $e->getMessage();
  }

  $db = NULL;
}else {
  echo "El usuario ya existe!";
}


exit;
?>
