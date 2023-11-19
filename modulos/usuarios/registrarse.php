<?php
    session_start();
    require("../../includes/conexion.php");

    $name = $_POST['nombre-completo'];
    $user = $_POST['usuario'];
    $email = $_POST['correo'];
    $pass = $_POST['pass'];
    $rol = 2;

    $queryCheckEmail = "SELECT * FROM usuarios WHERE correo = '$email'";
    $resultCheckEmail = mysqli_query($conn, $queryCheckEmail);

    if(mysqli_num_rows($resultCheckEmail) > 0){
        //El email ya existe en la base de datos, se muestra el mensaje de error
        $_SESSION['mensaje'] = "El email ingresado ya está en uso";
        header("Location: ../../registro-admin.php");
        exit();
    }else{
        //Si el email no se encuentra en la base de datos, se procede con el registro
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $query="INSERT INTO usuarios(nombre,usuario,correo,pass,rol) VALUES ('$name','$user','$email','$hash',$rol)";

        if(mysqli_query($conn,$query)){
            $_SESSION['mensaje'] = "Registrado exitosamente";
            header("Location: ../../login.php");
            exit();
        }else{
            $_SESSION['mensaje'] = "No se pudo registrar";
            header("Location: ../../register.php");
            exit();
            //echo 'Se produjo un error'. mysqli_error();
        }
    }

    mysqli_close($conn);

?>