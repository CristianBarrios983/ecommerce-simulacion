<?php
    session_start();

    if (isset($_SESSION['admin'])) {

        if(isset($_GET['id'])){

            require('../../includes/conexion.php');

            // ID del usuario que deseamos eliminar
            $id = $_GET['id'];

            // Consulta para eliminar al usuario y sus comentarios relacionados
            $query = "DELETE FROM productos WHERE id = $id";

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

        }else{
            header("Location: /pagina-productos/panel-admin.php");
            exit();
        }

    }else{
        // El usuario admin no ha iniciado sesión, redirigir a una página de inicio de sesión
        header("Location: /pagina-productos/login-admin.php");
        exit();
    }
?>