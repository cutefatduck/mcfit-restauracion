<head>
    <title>Mcfi restaurante - editar</title>
    <?php include_once "views/meta.php"?>

</head>
<body>
    <div class='container-login'>
        <div class="login">
            <h2 class="title-ltr text-center">Editar Producto</h2>
                <form action="?controller=admin&action=productodoupdate" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="hidden" name="imagenDefault" value="<?=$imagen?>">
                    <input class="input-login" type="text" value="<?=$nombre?>" name="nombre" id="nombre">
                    <input class="input-login" type="number" value='<?=$precio?>' name="precio" id="precio">
                    <input class="input-login" type="file" id="imagen" name="imagen" accept="image/*">
                    <input class="input-login" type="number" value='<?=$calorias?>' name="calorias" id="calorias">
                    <input class="input-login" type="number" value='<?=$proteinas?>' name="proteinas" id="proteinas">
                    <button class="action-button" type='submit' name='submit' value=''> Edit </button>
                </form>
        </div>
    </div>
</body>