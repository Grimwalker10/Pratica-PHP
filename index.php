<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        echo "<center>";
        echo "<h1>Diego Jose Lutin Miranda, Carnet: 5190-20-16218</h1>";
        echo "</center>";

        echo "<p>";
        echo "<strong>Archivo:</strong> {$_SERVER['PHP_SELF']}<br>";
        echo "<strong>Servidor:</strong> {$_SERVER['SERVER_NAME']}<br>";
        echo "<strong>Cliente IP:</strong> {$_SERVER['REMOTE_ADDR']}<br>";

        if (isset($_SERVER['REMOTE_HOST'])) {
            echo "<strong>Cliente Nombre:</strong> {$_SERVER['REMOTE_HOST']}<br>";
        } else {
            echo "<strong>Cliente Nombre:</strong> No disponible<br>";
        }

        echo "<strong>User Agent:</strong> {$_SERVER['HTTP_USER_AGENT']}<br>";
        echo "</p>";
        echo "<hr>"
    ?>
    <div class="container">
        <h1 class="mt-5">Ejemplo de uso de bases de datos con PHP y MySQL</h1>
        <form action="insertar_db.php" class="mt-4">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="text" name="edad" id="edad" class="form-control" required>
            </div>
            <button type="submit" name="accion" value="Grabar" class="btn btn-primary">Grabar</button>
        </form>
        <hr>
        <?php
            include("libreria_db.php");
            $stmt = $pdo->query("SELECT nombre, edad, id FROM persona");
        ?>
        <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>{$row['nombre']}</td>";
                        echo "<td>{$row['edad']}</td>";
                        echo "<td><a href=\"borrar_db.php?id={$row['id']}\" class=\"btn btn-danger\"><i class=\"fas fa-trash-alt\"></i> Eliminar</a> <a href=\"editar.php?id={$row['id']}\" class=\"btn btn-warning\"><i class=\"fas fa-edit\"></i> Editar</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script async src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
</body>
</html>
