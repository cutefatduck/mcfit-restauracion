
<body>
<div class="container-pagina">
    <div class="margin-title">
        <h2 class="title-ltr">Bienvenido <?=$_SESSION['user']->getNombre()?></h2>
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


    <?php 
        if(isset($_COOKIE['pedido'])){
            include_once 'panelPedidos.php';
        }
        
    ?>

    </div>
</div>



</body>