<?php 
session_start();

?>
<div class="container-pagina">
<div class="margin-title"><h2 class="title-ltr">Carrito</h2>
    <?php if(empty($_SESSION['sel'])){?>
        <div class="carrito-vacio">
            <p class="p-custom-carrito">El carrito esta vacio</p>
            <img class="img-carrito-vacio"src="assets/img/carro-vacio.svg" alt="carrito vacio">
        </div>
    <?php }else{ $precio_carrito = []; $cantidad_carrito = [];?>
        <div class="row">
            <div class="col-md-8">
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
                        <h3 class="carrito-titulo">Precio</h3>
                        <p class="carrito-precio"><?=$carrito_product->getPrecio()?> €</p>
                        <div class="carrito-add-button d-flex justify-content-around">
                            <form action="?controller=carrito&action=addcantidad" method="post">
                                <button class="button-can" type="submit" value=<?=$carrito_product->getProductoId()?> name="add"><p class="text-button-can">+</p></button>
                            </form>
                            <p class="text-button-can"><?= $_SESSION['cantidad'][$carrito_product->getProductoId()];?></p>
                            <form action="?controller=carrito&action=delcantidad" method="post">
                                <button class="button-can" type="submit" value=<?=$carrito_product->getProductoId()?> name="del"><p class="text-button-can">-</p></button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php $precio_carrito[] = $carrito_product->getPrecio() ?>
                <?php $cantidad_carrito[] = $_SESSION['cantidad'][$carrito_product->getProductoId()] ?>
            <?php } ?>
            </div>
            <div class="col-md-4">
                <div class="card-carrito-total">
                    <div class="carrito-recuento">
                    <?php $total_carrito = []; ?>
                        <?php for($i=0;$i<count($precio_carrito);$i++) { ?>
                            <p class="text-recuento"><?=$precio_carrito[$i]?> * <?=$cantidad_carrito[$i]?> = <?=$total_carrito[$i]=$precio_carrito[$i]*$cantidad_carrito[$i]?> € </p>
                        <?php } ?>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-title-precio">Total</p>
                        <p class="text-title-precio"><?=array_sum($total_carrito)?> €</p>
                        <?php $_SESSION['cantidad']['total']=array_sum($total_carrito)?>
                    </div>
                    <form action="?controller=pedido&action=trampedido" method="post">
                        <button class="action-button" type="submit">Tramitar pedido</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="margin-title">
    <form action="?controller=carrito&action=vaciarcarrito" method="post">
        <button class="boton-eliminar d-flex" type='submit' name='submit' value=''>Vaciar carrito</button>
    </form>
</div>
</div>
