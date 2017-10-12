<?php
$dsn = 'mysql:host=localhost;dbname=ecommerce;charset=utf8mb4;port=3306';
$db_user = "root";
$db_pass = "";

try {
  $db = new PDO($dsn, $db_user, $db_pass);
  $cat = $db->prepare('SELECT * FROM categorias');
  $marc = $db->prepare('SELECT * FROM marcas');
  $cat->execute();
  $marc->execute();
  $categoria = $cat->fetchAll(PDO::FETCH_ASSOC);
  $marca = $marc->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo $e->getMessage();
}
function addproduct($array){
  foreach ($array as $key => $value) {
    // $key nombre del producto
    // $array[$key]["marca"]
    // $array[$key]["categoria"]
    try {
      GLOBAL $db;
      $sql = 'INSERT INTO (nombre, id_categoria, id_marca) VALUES (:producto, :categoria, :marca)';
      $query = $db->prepare($sql);
      $query->beginTransaction();
      $query->bindValue(':producto', $key);
      $query->bindValue(':marca', $array[$key]["marca"]);
      $query->bindValue(':categoria', $array[$key]["categoria"]);
      $query->exec();
      $query->rollBack();
    } catch (PDOException $e) {
      $query->rollBack();
      echo $e->getMessage();
    }
  }
}
$suaveRubia = $categoria[0]['id'];
$suaveRoja = $categoria[1]['id'];
$ipaSuave = $categoria[2]['id'];
$negraStout = $categoria[3]['id'];
$negraTostada = $categoria[4]['id'];
$trigo = $categoria[5]['id'];
$rubiaFuerte = $categoria[6]['id'];
$rojaFuerte = $categoria[7]['id'];
$frutadas = $categoria[8]['id'];

$murrayana = $marca[0]['id'];
$rupestre = $marca[1]['id'];
$la40 = $marca[2]['id'];
$esquel = $marca[3]['id'];
$chaura = $marca[4]['id'];
$pestrebola = $marca[5]['id'];
$prosit = $marca[6]['id'];
$cerroNegro = $marca[7]['id'];
$laBurra = $marca[8]['id'];
$laPecadora = $marca[9]['id'];
$epulafquen = $marca[10]['id'];

$producto = [
  "Murra Rubia" => ['marca' => $murrayana, 'categoria' => $suaveRubia],
  "Rupe Rubia" => ['marca' => $rupestre, 'categoria' => $suaveRubia],
  "Pilsen" => ['marca' => $la40, 'categoria' => $suaveRubia],
  "Golden Ale" => ['marca' => $esquel, 'categoria' => $suaveRubia],
  "Murra Scotis" => ['marca' => $murrayana, 'categoria' => $suaveRoja],
  "Esquel Red" => ['marca' => $esquel, 'categoria' => $suaveRoja],
  "Chaura Roja" => ['marca' => $chaura, 'categoria' => $suaveRoja],
  'Pestre IPA' => ['marca' => $pestrebola, 'categoria' => $ipaSuave],
  'Chaura IPA' => ['marca' => $chaura, 'categoria' => $ipaSuave],
  'Oktoberfest' => ['marca' => $la40, 'categoria' => $ipaSuave],
  'Rupes IPA' => ['marca' => $rupestre, 'categoria' => $ipaSuave],
  'Cerro Stout' => ['marca' => $cerroNegro, 'categoria' => $negraStout],
  'Esquel Stout' => ['marca' => $esquel, 'categoria' => $negraStout],
  'Epu Stout' => ['marca' => $epulafquen, 'categoria' => $negraStout],
  'Pestre Porter' => ['marca' => $pestrebola, 'categoria' => $negraTostada],
  'Negra tipo porter' => ['marca' => $prosit, 'categoria' => $negraTostada],
  'Dopplebock' => ['marca' => $la40, 'categoria' => $negraTostada],
  'Rupes Trigo' => ['marca' => $rupestre, 'categoria' => $trigo],
  'Cerro Trigo' => ['marca' => $cerroNegro, 'categoria' => $trigo],
  'Trigo Negra' => ['marca' => $cerroNegro, 'categoria' => $trigo],
  'Blanca' => ['marca' => $laBurra, 'categoria' => $trigo],
  'Prosit Rubia' => ['marca' => $prosit, 'categoria' => $rubiaFuerte],
  'Rupes Roja' => ['marca' => $rupestre, 'categoria' => $rojaFuerte],
  'Irish Red' => ['marca' => $cerroNegro, 'categoria' => $rojaFuerte],
  'Murra Frambuesa' => ['marca' => $murrayana, 'categoria' => $frutadas],
  'Chaura Frambuesa' => ['marca' => $chaura, 'categoria' => $frutadas],
  'Arándanos' => ['marca' => $chaura, 'categoria' => $frutadas],
  'Enebro' => ['marca' => $rupestre, 'categoria' => $frutadas],
  'Ciruela' => ['marca' => $laPecadora, 'categoria' => $frutadas],
  'Durazno' => ['marca' => $laPecadora, 'categoria' => $frutadas],
  'Algarroba' => ['marca' => $laPecadora, 'categoria' => $frutadas],
];

addproduct($producto);




?>
