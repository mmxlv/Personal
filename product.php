<?php require_once 'head.php';
 $listado = [
  0 => 'Producto 1',
  1 => 'Producto 2',
  2 => 'Producto 3',
 ];

?>

<div class="content_product">
  <img class="content-img-p" src="img/product_<?=$_GET['P']?>.png" alt="">
  <button type="button" name="button">Comprar</button>
  <?php echo $listado[$_GET['P']]; ?>
</div>



<?php require_once 'foot.php'; ?>
