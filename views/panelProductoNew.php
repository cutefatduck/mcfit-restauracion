<body>
    <div class='container-login'>
        <div class="login">
            <h2 class="title-ltr text-center">Nuevo Producto</h2>
                <form action="?controller=admin&action=productonuevoInsert" method="post" enctype="multipart/form-data">
                    <input class="input-login" type="text" placeholder="Nombre" name="nombre" id="nombre" required>
                    <input class="input-login" type="number" placeholder="Precio" name="precio" id="precio" required>
                    <input class="input-login" type="file" id="imagen" name="imagen" accept="image/*" required>
                    <input class="input-login" type="number" placeholder="Calorias" name="calorias" id="calorias" required>
                    <input class="input-login" type="number" placeholder="Proteinas" name="proteinas" id="proteinas" required>
                    <input class="input-login" type="number" placeholder="Stock" name="stock" id="stock" required>
                    <input class="input-login" type="number" placeholder="Categoria ID" name="categoria_id" id="categoria_id" required>
                    <button class="action-button" type='submit' name='submit'> Crear </button>
                </form>
        </div>
    </div>
</body>