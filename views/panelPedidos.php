<h3>Ultimo Pedido</h3>
<div class="pedido-cookie d-flex">
<?php 

    for ($i=0; $i < count($productshow); $i++) { 
        $nombreProducto = $productshow[$i][0]->getNombre();
        $precioProducto = $productshow[$i][0]->getPrecio();
        $imgProducto = $productshow[$i][0]->getImagen();
        $cantidad = $productshow[$i][1];

        
        ?>
        <div class="pedido-cont-img"><img class="pedido-img" src="assets/img/productos/<?=$imgProducto?>" alt="imagen de <?=$nombreProducto?>"></div>
        <p><?=$nombreProducto?></p>
        <p><?=$precioProducto?></p>
        <p><?=$cantidad?></p>

<?php }?>

</div>
    <p><?=$pedido[2]?></p>
    <p><?=$pedido[3]?></p>
