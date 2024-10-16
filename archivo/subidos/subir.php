<?php
session_start();
if (isset($_FILES["doc"]["name"])) {
    $archivo = $_FILES["doc"]["name"];
    $path = pathinfo($archivo);
    $nombreArchivo = "asorco_";
    $ext = $path["extension"];
    $temp_name = $_FILES["doc"]["tmp_name"];
    $nombre_nuevo = $nombreArchivo . time() . "." . $ext;
    $path_nuevo = CARPETA_IMAGENES . "/" . $nombre_nuevo;
    move_uploaded_file($temp_name, $path_nuevo);
    $datos["doc"] = $path_nuevo;
    $usuario = $
}

// Conexión a la base de datos
$host = "localhost";
$dbname = "asorco-archivos";
$user = "root";
$pass = "";

try {
    // Crear una nueva instancia de PDO
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
