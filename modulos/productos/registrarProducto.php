<?php
    session_start();
    
    if(isset($_SESSION['admin'])){

        if(isset($_POST['nombre-producto']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['categoria']) && isset($_FILES['imagen'])){
            
            require("../../includes/conexion.php");

            $producto = $_POST['nombre-producto'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];

            $rutaImagen="";

            //Transformar imagen
            // $imagen=addslashes(file_get_contents($imagen['tmp_name']));

            $queryCheckProduct = "SELECT * FROM productos WHERE nombre = '$producto'";
            $resultCheckProduct = mysqli_query($conn, $queryCheckProduct);

            if(mysqli_num_rows($resultCheckProduct) > 0){
                //El email ya existe en la base de datos, se muestra el mensaje de error
                $_SESSION['mensaje'] = "El producto ya existe";
                header("Location: registrarProductoForm.php");
                exit();
            }else{

                if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                    // Obtiene el nombre de la imagen
                    $nombreImagen = $_FILES['imagen']['name'];
                    // Obtiene la direccion temporal de la imagen
                    // $rutaTemporal = $_FILES['imagen']['tmp_name'];
                
                    // Ruta donde se guardará la imagen (ajusta la ruta según tu configuración)
                    $directorioDestino = '/pagina-productos/images/';
                    $rutaDestino = $directorioDestino . $nombreImagen;
                
                    // Mover la imagen al directorio de destino
                    // move_uploaded_file($rutaTemporal, $rutaDestino);
                
                    // Almacenar la ruta en la base de datos
                    $rutaImagen = $rutaDestino;
                }

                $query="INSERT INTO productos(nombre,descripcion,precio,imagen,categoria) VALUES ('$producto','$descripcion',$precio,'$rutaImagen',$categoria)";

                        if (mysqli_query($conn,$query)) {
                            $_SESSION['mensaje'] = "Registrado exitosamente";
                            header("Location: index.php");
                            exit();
                        }else{
                            $_SESSION['mensaje'] = "No se pudo registrar";
                            header("Location: registrarProductoForm.php");
                            exit();
                            //echo 'Se produjo un error'. mysqli_error();
                        }
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