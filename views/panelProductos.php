
<div class="row">
    <?php foreach ($allProducts as $product) { ?>
        <div class="col-md-3 justify-content-center">
            <div class="card-products">
                <img class="img-products" src="assets/img/productos/<?=$product->getImagen()?>" alt="imagen de <?=$product->getNombre()?>">
                <h2><?=$product->getNombre()?></h2>
                <p><?=$product->getCalorias()?> <?=$product->getProteinas()?></p>
                <p><?=$product->getPrecio()?></p>

                <form action="<?=url.'?controller=producto&action=sel'?>" method='post'>
                    <button type='submit' name='id' value='<?=$product->getProductoId();?>'> Añadir al carrito </button>
                </form>
            </div>
        </div>
    <?php } ?>
</div>
