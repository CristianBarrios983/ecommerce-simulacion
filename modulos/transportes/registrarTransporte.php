<?php
    session_start();

    if(isset($_SESSION['admin'])){

        if(isset($_POST['empresa']) && isset($_POST['tiempo-entrega']) && isset($_POST['precio-envio']) && isset($_FILES['imagen'])){

            require("../../includes/conexion.php");

            $empresa = $_POST['empresa'];
            $tiempo_entrega = $_POST['tiempo-entrega'];
            $precio_envio = $_POST['precio-envio'];

            $rutaImagen="";

            //Transformar imagen
            // $imagen=addslashes(file_get_contents($imagen['tmp_name']));

            $queryCheckTransporte = "SELECT * FROM transportes WHERE empresa = '$empresa'";
            $resultCheckTransporte = mysqli_query($conn, $queryCheckTransporte);

            if(mysqli_num_rows($resultCheckTransporte) > 0){
                //El email ya existe en la base de datos, se muestra el mensaje de error
                $_SESSION['mensaje'] = "El transporte ya existe";
                header("Location: registrarTransporteForm.php");
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

                $query="INSERT INTO transportes(empresa,tiempo_entrega,precio_envio,imagen) VALUES ('$empresa','$tiempo_entrega',$precio_envio,'$rutaImagen')";

                        if (mysqli_query($conn,$query)) {
                            $_SESSION['mensaje'] = "Registrado exitosamente";
                            header("Location: index.php");
                            exit();
                        }else{
                            $_SESSION['mensaje'] = "No se pudo registrar";
                            header("Location: registrarTransporteForm.php");
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