<?php
session_start();

if(isset($_SESSION['admin'])){

    if(isset($_POST['id']) && isset($_POST['empresa']) && isset($_POST['tiempo-entrega']) && isset($_POST['precio-envio']) && isset($_FILES['imagen'])){

        require('../../includes/conexion.php');

        $id = $_POST['id'];
        $empresa = $_POST['empresa'];
        $tiempo_entrega = $_POST['tiempo-entrega'];
        $precio_envio = $_POST['precio-envio'];
        $imagen = $_FILES['imagen']; 


        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            // Obtiene el nombre de la imagen
            $nombreImagen = $_FILES['imagen']['name'];

            // Ruta donde se guardará la imagen (ajusta la ruta según tu configuración)
            $directorioDestino = '/pagina-productos/images/';
            $rutaDestino = $directorioDestino . $nombreImagen;

            // Almacenar la ruta en la base de datos
            $rutaImagen = $rutaDestino;

            $query = "UPDATE transportes SET empresa = '$empresa', tiempo_entrega = '$tiempo_entrega', precio_envio = $precio_envio, imagen = '$rutaImagen' WHERE id = $id";

        }else{
            $query = "UPDATE transportes SET empresa = '$empresa', tiempo_entrega = '$tiempo_entrega', precio_envio = $precio_envio WHERE id = $id";

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

    }else{
        header("Location: /pagina-productos/panel-admin.php");
        exit();
    }

}else{
    header("Location: /pagina-productos/login-admin.php");
    exit();
}
?>
