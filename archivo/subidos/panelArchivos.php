<!DOCTYPE html>
<?php session_start(); ?>
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
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col col-md-8">
                </div>
                <div class="col col-md-4">
                    <input class="btn btn-primary" type="button" value="Cargar Archivos" data-bs-toggle="modal" data-bs-target="#exampleModal">
                </div>
            </div>
        </div>
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
    <!-- MODAL PARA CARGA DE ARCHIVOS -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Nuevo Archivo - Asorco</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form id="cargarArchivos">
                <div class="input-group mb-3">
                    <span class="input-group-text" >Archivo</span>
                    <input class="form-control" type="file" id="formFile" name="doc" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Nombre Archivo</span>
                    <input class="form-control" type="text" name="nombreArchivo" placeholder="Ej: doc-20241109.pdf">
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="subirArchivos()">Guardar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="subir.js"></script>
</body>
</html>
