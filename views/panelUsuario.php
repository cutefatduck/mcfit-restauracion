
<body>
<div class="container-pagina">
    <h2 class="title-ltr">Bienvenido <?=$_SESSION['user']->getUsuario()?></h2>
    <div class="container-dtbuttons d-flex">
        <div class="row container-dtusuario">
            <div class="col-sm-6">
                <form action="#" method="post">
                    <button class="fill-button button-can-dt" type="submit">Pedidos</button>
                </form>
            </div>
            <div class="col-sm-6">
                <form action="#" method="post">
                        <button class="fill-button button-can-dt" type="submit">Modificar Usuario</button>
                </form>
            </div>
            <div class="col-sm-6">
                <form action="?controller=user&action=logout" method="post">
                        <button class="fill-button button-can-dt" type="submit">Log Out</button>
                </form>
            </div>
        </div>
    </div>

    <?php 
        if(isset($_COOKIE['pedido'])){
            include_once 'panelPedidos.php';
        }
        
    ?>
</div>



</body>