<?php

session_start();

function validarInformacion($informacion){
  $arrayDeErrores = [];
   if (filter_var($informacion['email'], FILTER_VALIDATE_EMAIL) == FALSE) {
     $arrayDeErrores['email'] = 'Email Invalido';
   }
   if (strlen($informacion['userName']) < 3 || strlen($informacion['userName']) > 50) {
     $arrayDeErrores['userName'] = 'Nombre de Usuario Invalido';
   }
   if (strlen($informacion['password']) < 6) {
     $arrayDeErrores['password'] = 'La contraseña tiene que tener al menos 6 caracteres';
   }
  return $arrayDeErrores;
}

function validarLogin($datos){
  $errores = [];
  if (password_verify($datos['password'], $_SESSION['password']) == false) {
    $errores['password'] = 'Datos incorrectos';
  }
  if ($datos['username'] != $_SESSION['username']) {
    $errores['username'] = 'Datos Invalidos';
  }
return $errores;
}

function loginUser($datos){
  if (isset($_POST['remember'])) {
    $uname = $_SESSION['username'];
    setcookie('userloged', $uname, time() +60*60*24*3);
  }
  $_SESSION['logged'] = $datos['id'];
}

function validarExistencia($datos){
  $dsn = 'mysql:host=localhost;dbname=ecommerce;charset=utf8mb4;port=3306';
  $db_user = 'root';
  $db_pass = '';
  $db = new PDO($dsn, $db_user, $db_pass);

  try {
    $db->beginTransaction();
    $sql = 'SELECT username, email FROM usuarios WHERE username LIKE :username OR email LIKE :email';
    $query = $db->prepare($sql);
    $query->bindValue(':username', $datos['userName']);
    $query->bindValue(':email', $datos['email']);
    $query->execute();
    $db->commit();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      $db->rollBack();
      return $e->getMessage();
  }

  $db = NULL;
  $user = $result[0];
  if (count($user) == 0) {
    return true;
  }else {
    return false;
  }
}



?>
