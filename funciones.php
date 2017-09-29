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


?>
