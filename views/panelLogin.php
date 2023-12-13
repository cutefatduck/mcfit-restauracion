<body>
    <div class='container-login'>
        <div class="login">
            <h2 class="title-ltr text-center">Iniciar Sesión</h2>
                <form action="?controller=user&action=dologin" method="post">
                    <input class="input-login" type="text" placeholder="Usuario" name="user" id="user">
                    <input class="input-login" type="password" placeholder="Contraseña" name="pass" id="pass">
                    <button class="login-button" type='submit' name='submit' value=''> Login </button>
                </form>
            <a class="a-login" href="?controller=user&action=register">No tienes cuenta, registrate</a>
        </div>
    </div>
</body>