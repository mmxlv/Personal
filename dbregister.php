<?php

$link = mysqli_connect("localhost", "root", "", "ecommerce");

if($link === false){
    die("ERROR: No se pudo conectar. " . mysqli_connect_error());
}

//password hashing
$passhash = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);

$username = mysqli_real_escape_string($link, $_REQUEST['userName']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $passhash);


$sql = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$password')";
if(mysqli_query($link, $sql)){
    include_once ("head.php"); ?>

            <div style="text-align: center; margin: 10px" class="exito">
              <span>Exito al registrarse!</span>
            </div>

<?php    include_once("foot.php");
} else{
    echo "ERROR: No se pudo insertar los datos en la base de datos."/*$sql*/  . mysqli_error($link);
}
mysqli_close($link);
exit;
?>
