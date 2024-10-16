<?php

$consultas = null;
try {
    // Crear una nueva instancia de PDO para la conexión
    $dsn =
        "mysql:host=localhost;port=3306;dbname=asorco_archivos;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Manejar errores mediante excepciones
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Devolver resultados como un array asociativo
        PDO::ATTR_EMULATE_PREPARES => false, // Desactivar la emulación de sentencias preparadas
    ];
    $consultas = new PDO($dsn, "root", "", []);

    // Mensaje para verificar que la conexión fue exitosa
    // echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    // Captura cualquier error de conexión y lo muestra
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["usuario"]) && isset($_POST["password"])) {
        // $consulta = new Consultas();
        $nombre = $_POST["usuario"];
        $pass = $_POST["password"];
        $host = $_SERVER["HTTP_HOST"];
        $url = $_SERVER["REQUEST_URI"];
        $locacion_actual = "http://" . $host;

        $respuesta = $consultas->query(
            "SELECT id,usuario,cedula,pass FROM usuarios WHERE cedula ='" .
                $nombre .
                "'"
        );

        //Se verifica el pass
        if ($respuesta->rowCount() > 0) {
            $resultado = $respuesta->fetchAll();
            if (password_verify($pass, $resultado[0]["pass"])) {
                session_start();
                setcookie("PHPSESSID", session_id(), [
                    "expires" => time() + 300, // 1 hora de duración
                    "path" => "/",
                    "domain" => "albertopc.com",
                    "secure" => true, // debe ser true si usas HTTPS
                    "httponly" => true,
                    "samesite" => "None", // o 'Strict', según sea necesario
                ]);

                $_SESSION["usuario"] = $resultado[0]["usuario"];
                $_SESSION["id"] = $resultado[0]["id"];

                header("Location: panelArchivos.php");
                // echo json_encode([
                //     "cod" => "00",
                //     "msg" => "Inicio de sesión exitoso",
                //     "user" => $resultado[0]["usuario"],
                //     "usuario" => session_id(),
                // ]); // f854a950b6344895090e835d3a8e1c58 - 4a026f189e052a854bbfc5bed359fcfa
            } else {
                echo json_encode([
                    "cod" => "10",
                    "msg" => "Credenciales incorrectas",
                ]);
                header("Location: panelArchivos.php?");
            }
        } else {
            echo json_encode([
                "cod" => "10",
                "msg" => "Credenciales incorrectas",
            ]);
            header("Location: login.php?error=credenciales");
        }
    } else {
        echo json_encode([
            "cod" => "06",
            "msg" => "Faltan datos de inicio de sesión",
        ]);
        header("Location: login.php?error=datos");
    }
} else {
    echo json_encode(["cod" => "91", "msg" => "Método de solicitud no válido"]);
    header("Location: login.php?error=datos");
}
