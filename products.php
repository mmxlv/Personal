<div class="products_container">
  <?php $listado = [
                    0 => 'Producto 1',
                    1 => 'Producto 2',
                    2 => 'Producto 3',
                  ];
     ?>
  <section>
    <article class="main_products">
      <img class="feactured-p" src="img/RazerBanner.jpg" alt="">
    </article>
    <article class="sub_products">
      <?php foreach ($listado as $key => $value): ?>
        <div class="p1">
          <img class="psize" src="img/product_<?=$key?>.png" alt="">
          <a class="productinfo" href="product.php?P=<?=$key?>">+INFO</a>
        </div>
      <?php endforeach; ?>
    </article>
  </section>
</div>
