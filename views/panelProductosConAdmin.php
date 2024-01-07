<body>
    <h2 class="title-ltr">Estas seguro que quieres eliminar el producto</h2>
    <form action="?controller=admin&action=eliminarProducto" method="post">
        <button class="fill-button-ad button-can" name="con"value=0 type="submit">No</button>
        <input type="hidden" name="id" value="<?=$_POST['id']?>">
        <button class="fill-button-ad2 button-can" name="con" value=1 type="submit">Si</button>
    </form>
    
</body>