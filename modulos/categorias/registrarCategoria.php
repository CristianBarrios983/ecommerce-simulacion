<?php
    session_start();

    if(isset($_SESSION['admin'])){

        if(isset($_POST['categoria'])){

            require("../../includes/conexion.php");

            $categoria = $_POST['categoria'];

            $queryCheckCategoria = "SELECT * FROM categorias WHERE categoria = '$categoria'";
            $resultCheckCategoria = mysqli_query($conn, $queryCheckCategoria);

            if(mysqli_num_rows($resultCheckCategoria) > 0){
                //El email ya existe en la base de datos, se muestra el mensaje de error
                $_SESSION['mensaje'] = "La categoria ya esta registrado";
                header("Location: registrarCategoriaForm.php");
                exit();
            }else{

                $query="INSERT INTO categorias(categoria) VALUES ('$categoria')";

                        if (mysqli_query($conn,$query)) {
                            $_SESSION['mensaje'] = "Registrado exitosamente";
                            header("Location: index.php");
                            exit();
                        }else{
                            $_SESSION['mensaje'] = "No se pudo registrar";
                            header("Location: registrarCategoriaForm.php");
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