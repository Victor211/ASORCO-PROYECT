<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Acceso</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/e5f994b411.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container-fluid">
        <div class="row py-5">
            <div class="col col-md-8">

            </div>
            <div class="col col-md-3 p-5 border border-secondary rounded">
                <h3> ASORCO - DOCS </h3>
                <hr/>
                <form method="post" action="iniciarSesion.php" id="loginform">
                    <div class="input-group mb-3">
                       <span class="input-group-text" ><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" name="usuario" placeholder="Usuario" autocomplete="off">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input class="form-control" type="password" name="password" placeholder="Contraseña">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Iniciar Sesión">
                </form>
            </div>
            <div class="col col-md-1"></div>
        </div>
    </div>

</body>
</html>
