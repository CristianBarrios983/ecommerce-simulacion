<?php
session_start();

if(isset($_SESSION['admin'])){

    if(isset($_POST['id']) && isset($_POST['nombre-producto']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['categoria']) && isset($_FILES['imagen'])){

        require('../../includes/conexion.php');

        $id = $_POST['id'];
        $producto = $_POST['nombre-producto'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $imagen = $_FILES['imagen']; 
        $categoria = $_POST['categoria'];

        // if ($imagen['size'] == 0) {
        //     // No se envió una nueva imagen, actualizar sin imagen
        //     $query = "UPDATE productos SET nombre = '$producto', descripcion = '$descripcion', precio = $precio, categoria = $categoria WHERE id = $id";
        // } else {
        //     // Se envió una nueva imagen, actualizar con la nueva imagen
        //     $imagen_actualizada = addslashes(file_get_contents($imagen['tmp_name']));
        //     $query = "UPDATE productos SET nombre = '$producto', descripcion = '$descripcion', precio = $precio, imagen = '$imagen_actualizada', categoria = $categoria WHERE id = $id";
        // }

        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            // Obtiene el nombre de la imagen
            $nombreImagen = $_FILES['imagen']['name'];

            // Ruta donde se guardará la imagen (ajusta la ruta según tu configuración)
            $directorioDestino = '/pagina-productos/images/';
            $rutaDestino = $directorioDestino . $nombreImagen;

            // Almacenar la ruta en la base de datos
            $rutaImagen = $rutaDestino;

            $query = "UPDATE productos SET nombre = '$producto', descripcion = '$descripcion', precio = $precio, imagen = '$rutaImagen', categoria = $categoria WHERE id = $id";

        }else{
            $query = "UPDATE productos SET nombre = '$producto', descripcion = '$descripcion', precio = $precio, categoria = $categoria WHERE id = $id";

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
