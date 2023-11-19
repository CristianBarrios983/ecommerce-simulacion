<?php
require('../../includes/conexion.php');
session_start();

$id = $_POST['id'];
$producto = $_POST['nombre-producto'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$imagen = $_FILES['imagen']; 
$categoria = $_POST['categoria'];

if ($imagen['size'] == 0) {
    // No se envió una nueva imagen, actualizar sin imagen
    $query = "UPDATE productos SET nombre = '$producto', descripcion = '$descripcion', precio = $precio, categoria = $categoria WHERE id = $id";
} else {
    // Se envió una nueva imagen, actualizar con la nueva imagen
    $imagen_actualizada = addslashes(file_get_contents($imagen['tmp_name']));
    $query = "UPDATE productos SET nombre = '$producto', descripcion = '$descripcion', precio = $precio, imagen = '$imagen_actualizada', categoria = $categoria WHERE id = $id";
}

$result = mysqli_query($conn, $query);

if ($result) {
    $_SESSION['mensaje'] = "Datos actualizados correctamente";
    header("Location: index.php");
    exit();
} else {
    $_SESSION['mensaje'] = "No se pudo actualizar";
    header("Location: index.php");
    exit();
}

mysqli_close($conn);
?>
