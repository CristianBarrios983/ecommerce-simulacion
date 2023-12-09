<?php
session_start();

if(isset($_SESSION['admin'])){

    if(isset($_POST['id']) && isset($_POST['nombre-producto']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['categoria']) && isset($_FILES['imagen'])){

        require('../../includes/conexion.php');

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

    }else{
        header("Location: /pagina-productos/panel-admin.php");
        exit();
    }

}else{
    header("Location: /pagina-productos/login-admin.php");
    exit();
}
?>
