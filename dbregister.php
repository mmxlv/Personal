<?php

$dsn = 'mysql:host=localhost;dbname=ecommerce;charset=utf8mb4;port=3306';
$db_user = 'root';
$db_pass = '';

//password hashing
$passhash = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
$username = $_REQUEST['userName'];
$email = $_REQUEST['email'];
$password = $passhash;

try {
  $db = new PDO($dsn, $db_user, $db_pass);
  $query = $db->prepare('INSERT INTO usuarios (username, email, password) VALUES (:username, :email, :password)');
  $query->bindParam(':username', $username);
  $query->bindParam(':email', $email);
  $query->bindParam(':password', $password);
  $query->execute();
} catch (PDOException $e) {
  echo $e->getMessage();
}

$db = NULL;

exit;
?>
