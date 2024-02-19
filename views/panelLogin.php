<head>
    <title>Mcfi restaurante - login</title>
    <?php include_once "views/meta.php"?>

</head>
<body>
    <div class='container-login'>
        <div class="login">
            <h2 class="title-ltr text-center">Iniciar Sesión</h2>
                <form action="?controller=user&action=dologin" method="post">
                    <input class="input-login" type="text" placeholder="Usuario" name="user" id="user">
                    <input class="input-login" type="password" placeholder="Contraseña" name="pass" id="pass">
                    <button class="action-button" type='submit' name='submit' value=''> Login </button>
                </form>
            <a class="a-login" href="?controller=user&action=register">No tienes cuenta, registrate</a>
            <p><a class="a-login" href="?controller=user&action=loginadmin">Portal de empleado</a></p>
        </div>
    </div>
</body>