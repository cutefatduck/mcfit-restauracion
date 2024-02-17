<?php 
session_start();

?>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
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
                <?php $nombre_producto[] = $carrito_product->getNombre()?>
            <?php } ?>
            </div>
            <div class="col-md-4">
                <div class="card-carrito-total">
                    <div class="propinas-container">
                        <h3 class="comentario-nombre">Propinas</h3>
                        <hr>
                            <input type="radio" id="nada-propina" name="propina" value="0">
                            <label for="nada-propina">Nada</label>

                            <input type="radio" id="3-propina" name="propina" value="0.03" checked>
                            <label for="3-propina">3%</label>
   
                            <input type="radio" id="6-propina" name="propina" value="0.06">
                            <label for="6-propina">6%</label>
             
                            <input type="radio" id="10-propina" name="propina" value="0.1">
                            <label for="10-propina">10%</label>
                   
                            <input type="radio" id="20-propina" name="propina" value="0.2">
                            <label for="20-propina">20%</label>
                 
                            <input type="radio" id="40-propina" name="propina" value="0.4">
                            <label for="40-propina">40%</label>
                        </p>
                    </div>
                    <div class="propinas-container">
                        <h3 class="comentario-nombre">Puntos de fidelidad</h3>
                        <hr>
                        <p class="text-puntos-title">Inserta una cantidad: </p>
                        <div class="d-flex">
                            <input type="number" class="input-puntos" value="0"id="input-puntos">
                            <p class = "text-puntos">disp.  <span class="color-puntos" id="puntos">0</span> puntos </p>
                            
                            <button type="submit" id="enviar-puntos" class="puntos-button">Aplicar puntos</button>
                        </div>
                    </div>

                    <div class="carrito-recuento">
                    <?php $total_carrito = []; ?>
                        <?php for($i=0;$i<count($precio_carrito);$i++) { ?>
                            <p class="text-recuento"><?=$nombre_producto[$i]?>(<?=$cantidad_carrito[$i]?>) <?=$total_carrito[$i]=$precio_carrito[$i]*$cantidad_carrito[$i]?> € </p>
                        <?php } ?>
                            <p id="propina"></p>
                            <p id="descuento"></p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <input type="number" id="total-carrito" hidden value="<?=array_sum($total_carrito)?>">

                        

                        <p class="text-title-precio">Total</p>
                        <p class="text-title-precio" id="precio-total"></p>

                        <?php $_SESSION['cantidad']['total']=array_sum($total_carrito)?>
                    </div>
                    <form action="?controller=pedido&action=trampedido" method="post">
                        <button class="action-button" id="tramitar-pedido" type="submit">Tramitar pedido</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="margin-title">
    <form action="?controller=carrito&action=vaciarcarrito" method="post">
        <button class="boton-eliminar d-flex" type='submit' name='submit' value=''>Vaciar carrito</button>
    </form>
    <?php } ?>

</div>
</div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.1/axios.min.js"></script>
<script src="https://unpkg.com/notie"></script>
<script src="assets/js/propina.js"></script>
