<?php
require('../../includes/conexion.php');
session_start();

$id = $_POST['id'];
$categoria = $_POST['categoria'];

$query = "UPDATE categorias SET categoria = '$categoria' WHERE id = $id";
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
