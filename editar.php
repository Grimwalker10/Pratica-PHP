<?php
require_once "libreria_db.php";
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT id, nombre, edad FROM persona WHERE id = :id ;');

$stmt->bindParam(':id', $id);
$stmt -> execute();

$row = $stmt -> fetch(PDO::FETCH_ASSOC);

$vnombre = $row['nombre'];
$vid = $row['id'];
$vedad = $row['edad'];

?>

<title>Editar Ejemplo PHP</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ejemplo PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Ejemplo de uso de bases de datos con PHP y MYSQL <br>Editar</h1>
        <form action="editar_db.php" method="POST" class="mt-4">
            <table class="table table-bordered">
                <tr>
                    <td>Nombre: </td>
                    <td>
                        <input type="text" name="nombre" value="<?php echo $vnombre; ?>" class="form-control">
                    </td>
                    <td>Edad: </td>
                    <td>
                        <input type="number" name="edad" value="<?php echo $vedad; ?>" class="form-control">
                    </td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php echo $vid; ?>"/>
            <button type="submit" name="accion" value="Grabar" class="btn btn-primary">Grabar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
        <hr>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>