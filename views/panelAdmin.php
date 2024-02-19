<head>
    <title>Mcfi restaurante - panel admin</title>
    <?php include_once "views/meta.php"?>

</head>
<body>
<div class="container-pagina">
    <h2 class="title-ltr">Bienvenido <?=$_SESSION['admin']->getNombre()?></h2>
    <div class="container-dtbuttons d-flex">
        <div class="row container-dtusuario">
            <div class="col-sm-6 justify-content-center d-flex">
                <a class="fill-button-dt" href="?controller=admin&action=listProductos">Productos</a>
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