<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$userLogin = $_POST['username'];
$sql = "SELECT * FROM usuarios WHERE username LIKE '%{$userLogin}%'";
$result = mysqli_query($conn, $sql);
$userInfo = array();

while($row = mysqli_fetch_assoc($result)) {
        $userInfo[] = $row;
}
$final = array();
foreach ($userInfo as $key1 => $value1) {
  if (is_array($value1)) {
    $final = $value1;
  }
}

$_SESSION = $final;

$validError = validarLogin($_POST);

mysqli_close($conn);

if (count($validError)>0) {
  foreach ($validError as $key => $value) {
    echo "$value";
  }
} else {
  loginUser($_SESSION);
  header('location:home.php');
  exit;
}

?>
