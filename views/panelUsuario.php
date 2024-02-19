<head>
    <title>Mcfi restaurante - usuario</title>
    <?php include_once "views/meta.php"?>

</head>
<body>
<div class="container-pagina">
    <div class="margin-title">
        <h2 class="title-ltr text-center">Bienvenido <?=$_SESSION['user']->getNombre()?></h2>
        <?php  if(isset($_COOKIE['pedido'])){ ?>
            <div class="ver-pedido d-flex">
                <p class="carrito-text ultimo-pedido-text"> Ultimo pedido:</p><p class="ultimo-pedido-text"><?=$precioTotal?>€<p class="ultimo-pedido-text"><?=$formattedDate?></p>
            </div>
        <?php } ?>
    </div>

    <div class="container-dtbuttons d-flex">
        <div class="row container-dtusuario">
            <div class="col-sm-6 justify-content-center d-flex">
                <form action="#" method="post">
                    <button class="fill-button-dt button-can-dt" type="submit">Pedidos</button>
                </form>
            </div>
            <div class="col-sm-6 justify-content-center d-flex">
                <form action="#" method="post">
                        <button class="fill-button-dt button-can-dt" type="submit">Modificar Usuario</button>
                </form>
            </div>
            <div class="col-sm-6 justify-content-center d-flex">
                <form action="?controller=user&action=logout" method="post">
                        <button class="fill-button-dt button-can-dt" type="submit">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>