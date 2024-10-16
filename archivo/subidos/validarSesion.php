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
    echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    // Captura cualquier error de conexión y lo muestra
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["nombre_archivo"] == "" && !isset($_POST["nombre_archivo"])) {
        // ERROR AL LEVANTAR EL ARCHIVO Redireccionamiento de pagina
        echo "Error de archivo";
    }
    $usuario = $_SESSION["id"];
    if (isset($_FILES["archivo"]["name"])) {
        $archivo = $_FILES["archivo"]["name"];
        $path = pathinfo($archivo);
        $nombreArchivo = "cliente_";
        $ext = $path["extension"];
        $temp_name = $_FILES["foto"]["tmp_name"];
        $nombre_nuevo = "clienteimg_" . time() . "." . $ext;
        $path_nuevo = CARPETA_IMAGENES . "/" . $nombre_nuevo;
        move_uploaded_file($temp_name, $path_nuevo);
        $datos["foto"] = $path_nuevo;
    }

    $consultas->query(
        "INSERT INTO archivos (usuario_id,nombre_archivo,nombre_mostrar,fecha_subida) VALUES ('{$usuario}','{$nombre_nuevo}','{$_POST["nombre_archivo"]}',TIMESTAMP"
    );

    // REDIRECCIONAR A LA PAGINA DE SUBIDO CORRECTAMENTE
}
