<div class="container-pagina">
    <div class="margin-title"><h2 class="title-ltr">Carta</h2>
    <select id="orden">
            <option value="0">Todos</option>

            <?php foreach($allCategories as $categoria ){?>
                <option value="<?=$categoria->getCategoriaId()?>"><?=$categoria->getNombre()?></option>
            
            <?php }; ?>
        </select>
    </div>
    <div class="row container-productos justify-content-evenly">
        <?php foreach ($allProducts as $product) { ?>
            <div class="col-md-3 productos <?=$product->getCategoriaId()?>">
                <div class="card-products">
                    <div class="container-img-product">
                        <img class="img-products " src="assets/img/productos/<?=$product->getImagen()?>" alt="imagen de <?=$product->getNombre()?>">
                        <div class="text-img">
                            <div class="row">
                                <div class="col-8">
                                    <h3 class="title-card"><?=$product->getNombre()?></h3>
                                    <span class=text-product> 
                                        <?=$product->getCalorias()?> kcal
                                        <?=$product->getProteinas()?> P
                                    </span>
                                </div>
                            
                                <div class="col-4 d-flex justify-content-end">
                                    <span class="precio-product align-self-center"><?=$product->getPrecio()?>€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <form action="<?=url.'?controller=producto&action=sel'?>" method='post'>
                        <button class="fill-button-carrito" type='submit' name='id' value='<?=$product->getProductoId();?>'> Añadir al carrito </button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script src="assets/js/gestionarproductos.js"></script>
