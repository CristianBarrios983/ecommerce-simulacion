<?php
    require("../../includes/conexion.php");

    session_start();

    $email=$_POST["correo"];
    $pass=$_POST["pass"];

    $query = "SELECT * FROM usuarios WHERE correo = '$email' AND rol = 1";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $hash = $row['pass'];
        $user = $row['id_rol'];

        if(password_verify($pass, $hash)){
            $_SESSION['admin'] = $email;
            $_SESSION['rol'] = $user;
            header("Location: ../../panel-admin.php");
            exit();
        }else{
            //Contraseña incorrecta
            $_SESSION['mensaje'] = "Contraseña incorrecta. Intentelo de nuevo";
            header("Location: ../../login-admin.php");
            exit();
        }
    }else{
        //Usuario no encontrado
        $_SESSION['mensaje'] = "Usuario no encontrado";
        header("Location: ../../login-admin.php");
        exit();
    }

    //Cerrar la conexion
    mysqli_close($conn);    
   
?>