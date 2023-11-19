<?php
    session_start();
    require("../../includes/conexion.php");

    $producto = $_POST['nombre-producto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_FILES['imagen'];
    $categoria = $_POST['categoria'];

    //Transformar imagen
    $imagen=addslashes(file_get_contents($imagen['tmp_name']));

    $queryCheckProduct = "SELECT * FROM productos WHERE nombre = '$producto'";
    $resultCheckProduct = mysqli_query($conn, $queryCheckProduct);

    if(mysqli_num_rows($resultCheckProduct) > 0){
        //El email ya existe en la base de datos, se muestra el mensaje de error
        $_SESSION['mensaje'] = "El producto ya existe";
        header("Location: registrarProductoForm.php");
        exit();
    }else{

        $query="INSERT INTO productos(nombre,descripcion,precio,imagen,categoria) VALUES ('$producto','$descripcion',$precio,'$imagen',$categoria)";

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

?>