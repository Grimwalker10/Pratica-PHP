<?php
require_once "libreria_db.php";
$vnombre = $_POST['nombre'];
$vedad = $_POST['edad'];
$vid = $_POST['id'];

$stmt = $pdo->prepare('UPDATE persona SET nombre=:nom , edad =:edad WHERE id =:id;');

$stmt->bindParam(':id', $vid);
$stmt->bindParam(':nom', $vnombre);
$stmt->bindParam(':edad', $vedad);

if ($stmt->execute()) {
    header('Location:index.php', true, 301);
}else{
    echo "error en acutalizar a base de datos";
}
?>