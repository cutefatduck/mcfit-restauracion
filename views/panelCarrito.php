<?php 
session_start();

?>
<div class="container-pagina">
    <h2 class="title-ltr">Carrito</h2>
    <?php if(empty($_SESSION['sel'])){?>
        <div class="carrito-vacio">
            <p class="p-custom-carrito">El carrito esta vacio</p>
            <img class="img-carrito-vacio"src="assets/img/carro-vacio.svg" alt="carrito vacio">
        </div>
    <?php }else{ $precio_carrito = [];?>
        
        <form action="?controller=carrito&action=vaciarcarrito" method="post">
            <button class="boton-eliminar d-flex" type='submit' name='submit' value=''>Vaciar carrito</button>
        </form>
        <div class="row">
            <div class="col-md-7">
            <?php foreach ($_SESSION['sel'] as $carrito_product) { ?>
                <div class="row card-carrito">
                    <div class="col-4">
                        <img class="img-products" src="assets/img/productos/<?=$carrito_product->getImagen()?>" alt="imagen de <?=$carrito_product->getNombre()?>">
                    </div>
                    <div class="col-5 col-margin">
                        <h3 class="carrito-titulo"><?=$carrito_product->getNombre()?></h3>
                        <p class="carrito-text"><?=$carrito_product->getCalorias()?> kcal</p>
                        <p class="carrito-text"><?=$carrito_product->getProteinas()?> g</p>
                    </div>
                    <div class="col-3 col-margin">
                        <h3 class="carrito-titulo">Total</h3>
                        <p class="carrito-precio"><?=$carrito_product->getPrecio()?> €</p>
                        <div class="carrito-add-button"></div>
                    </div>
                </div>
                <?php $precio_carrito[] = $carrito_product->getPrecio() ?>
            <?php } ?>
            </div>
            <div class="col-md-5">
                <div class="row card-carrito-total">
                <?=$precio_carrito[0] ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
