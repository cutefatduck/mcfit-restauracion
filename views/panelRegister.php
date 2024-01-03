<body>
    <div class='container-login'>
        <div class="login">
            <h2 class="title-ltr text-center">Register</h2>
            <form action="?controller=user&action=doregister" method="post">
                <input class="input-login" type="text" placeholder="Usuario" name="user" id="user">
                <input class="input-login" type="text" placeholder="Nombre" name="nombre" id="nombre">
                <input class="input-login" type="text" placeholder="Apellidos" name="apellidos" id="apellidos">
                <input class="input-login" type="email" placeholder="Email" name="email" id="email">
                <input class="input-login" type="password" placeholder="Contraseña" name="passw" id="passw">
                <input class="input-login" type="password" placeholder="Repetir Contraseña" name="rpass" id="rpass">
                <input class="input-login" type="text" placeholder="Direccion" name="direccion" id="direccion">
                <input class="input-login" type="number" placeholder="Telefono" name="tel" id="tel">
                <button class="login-button" type='submit' name='submit' value=''> Login </button>
            </form>
            <a class="a-login" href="?controller=user&action=login">Ya tienes cuenta, inicia session</a>
        </div>
    </div>
</body>