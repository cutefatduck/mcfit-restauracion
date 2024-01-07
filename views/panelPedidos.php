

    <div class="pedido-cookie">
    <h3 class="pedido-titulo">Ultimo Pedido</h3>
    <?php 

        for ($i=0; $i < count($productshow); $i++) { 
            $nombreProducto = $productshow[$i][0]->getNombre();
            $precioProducto = $productshow[$i][0]->getPrecio();
            $imgProducto = $productshow[$i][0]->getImagen();
            $cantidad = $productshow[$i][1];

            
            ?>
            <img class="pedido-img" src="assets/img/productos/<?=$imgProducto?>" alt="imagen de <?=$nombreProducto?>">
            <p class="pedido-nombre"><?=$nombreProducto?></p>
            <p class="pedido-nombre"><?=$precioProducto?>€</p>
            <p class="pedido-nombre">Cantidad: <?=$cantidad?></p>

    <?php }?>
        <div class="pedido-precioyfecha">
            <div class="right">
                <p class="pedido-nombre">TOTAL: <?=$precioTotal?>€</p>
            </div>
                <p class="pedido-nombre"> <?=$formattedDate?></p>
            
        </div>
    </div>
