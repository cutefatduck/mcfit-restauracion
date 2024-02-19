<head>
    <title>Mcfi restaurante - confirmacion</title>
    <?php include_once "views/meta.php"?>

</head>
<body>
    <h2 class="title-ltr text-center">Estas seguro que quieres eliminar el producto?</h2>
    <form action="?controller=admin&action=eliminarProducto" method="post">
        <div class="text-center">
            <button class="fill-button-ad2 button-can button-confirm" name="con"value=0 type="submit">Eliminar</button>
            <input type="hidden" name="id" value="<?=$_POST['id']?>">
            <button class="fill-button-ad button-can button-confirm" name="con" value=1 type="submit">No eliminar</button>
        </div>

    </form>
    
</body>