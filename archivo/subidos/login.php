<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Acceso</title>
    <link rel="stylesheet" href="./CSS/master.css">
    <script src="https://kit.fontawesome.com/e5f994b411.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="login-box">
        <div class="flip-container">
            <div class="flipper">
                <div class="front">
                    <div class="logo-container">
                        <img src="./img/logorincon.png" class="avatar" alt="Viejo Rincón Piribebuy Logo">
                    </div>
                    <form method="post" action="iniciarSesion.php" id="loginform">
                        <div class="input-container">
                            <input type="text" name="usuario" placeholder="Usuario" autocomplete="off">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="input-container">
                            <input type="password" name="password" placeholder="Contraseña">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input class="btnInicio" type="submit" value="Iniciar Sesión">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
