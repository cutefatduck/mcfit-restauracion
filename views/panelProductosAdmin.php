<head>
    <title>Mcfi restaurante - productos admin</title>
    <?php include_once "views/meta.php"?>

</head>
<div class="container-pagina">
<div class="margin-title">
    <h2 class="title-ltr">Lista de productos</h2>
    <a class="fill-button-dt" href="?controller=admin&action=productonuevo">Nuevo Producto</a>
</div>
<div class="row container-productos justify-content-center1">
        <?php foreach ($allProducts as $product) { ?>
            <div class="col-md-3">
                <div class="card-products">
                    <div class="container-img-product">
                        <img class="img-products" src="assets/img/productos/<?=$product->getImagen()?>" alt="imagen de <?=$product->getNombre()?>">
                        <div class="text-img">
                            <div class="row">
                                <div class="col-8">
                                    <h3 class="title-card"><?=$product->getNombre()?></h3>
                                    <span class=text-product> 
                                        <?=$product->getCalorias()?> kcal
                                        <?=$product->getProteinas()?> g
                                    </span>
                                </div>
                            
                                <div class="col-4 d-flex justify-content-end">
                                    <span class="precio-product align-self-center"><?=$product->getPrecio()?>€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex">
                        <form class="width-100" action="?controller=admin&action=editarConProducto" method="post">
                            <button class="fill-button-ad button-can" name="id" value='<?=$product->getProductoId();?>'>editar</button>
                        </form>
                        <form class="width-100" action="?controller=admin&action=eliminarConProducto" method="post">
                            <button class="fill-button-ad2 button-can" name="id" value='<?=$product->getProductoId();?>'>eliminar</button>
                        </form>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>