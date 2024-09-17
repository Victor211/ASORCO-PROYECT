<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Archivos</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Gestión de Archivos</h1>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Usuario ID</th>
                    <th>Nombre Archivo</th>
                    <th>Nombre Mostrar</th>
                    <th>Fecha Subida</th>
                </tr>
            </thead>
            <tbody>
                <?php
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

                    // Consulta SQL
                    $sql =
                        "SELECT usuario_id, nombre_archivo, nombre_archivo AS nombre_mostrar, fecha_subida FROM archivos";
                    $stmt = $pdo->query($sql);

                    // Verificar si hay resultados
                    if ($stmt->rowCount() > 0) {
                        // Recorrer los resultados
                        while ($row = $stmt->fetch()) {
                            echo "<tr>";
                            echo "<td>" .
                                htmlspecialchars($row["usuario_id"]) .
                                "</td>";
                            echo "<td>" .
                                htmlspecialchars($row["nombre_archivo"]) .
                                "</td>";
                            echo "<td>" .
                                htmlspecialchars($row["nombre_mostrar"]) .
                                "</td>";
                            echo "<td>" .
                                htmlspecialchars($row["fecha_subida"]) .
                                "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>No se encontraron archivos.</td></tr>";
                    }
                } catch (PDOException $e) {
                    echo "Error al conectar con la base de datos: " .
                        $e->getMessage();
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
