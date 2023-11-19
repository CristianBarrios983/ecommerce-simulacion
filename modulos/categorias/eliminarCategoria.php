<?php
    require('../../includes/conexion.php');

    session_start();

    // ID del usuario que deseamos eliminar
    $id = $_GET['id'];

    // Consulta para eliminar al usuario y sus comentarios relacionados
    $query = "DELETE FROM categorias WHERE id = $id";

    // Ejecutar la consulta
    if (mysqli_query($conn, $query)) {
        $_SESSION['mensaje'] = "Se ha eliminado satisfactoriamente";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['mensaje'] = "Error al eliminar";
        header("Location: index.php");
        exit();
    }

    // Cerrar la conexión
    mysqli_close($conn);
?>