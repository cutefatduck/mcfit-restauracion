<?php 
session_start();

?>
<?php if(empty($_SESSION['sel'])){?>
    <div class="carrito-vacio">
        <p class="p-custom-carrito">El carrito esta vacio</p>
        <img class="img-carrito-vacio"src="assets/img/carro-vacio.svg" alt="carrito vacio">
    </div>
<?php }else{ ?>
    <?php foreach ($_SESSION['sel'] as $carrito_product) { ?>
        <div class="col-md-3 justify-content-center">
            <div class="card-products">
                <img class="img-products" src="assets/img/productos/<?=$carrito_product->getImagen()?>" alt="imagen de <?=$carrito_product->getNombre()?>">
                <?=$carrito_product->getNombre()?>
                <?=$carrito_product->getCalorias()?>
                <?=$carrito_product->getProteinas()?>
            </div>
        </div>
    <?php } ?>
<?php } ?>

