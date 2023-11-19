<?php
    require("../../includes/conexion.php");

    session_start();

    $email=$_POST["correo"];
    $pass=$_POST["pass"];

    $query = "SELECT * FROM usuarios WHERE correo = '$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $hash = $row['pass'];
        $user = $row['id_rol'];

        if(password_verify($pass, $hash)){
            $_SESSION['email'] = $email;
            $_SESSION['rol'] = $user;
            header("Location: ../../index.php");
            exit();
        }else{
            //Contraseña incorrecta
            $_SESSION['mensaje'] = "Contraseña incorrecta. Intentelo de nuevo";
            header("Location: ../../login.php");
            exit();
        }
    }else{
        //Usuario no encontrado
        $_SESSION['mensaje'] = "Usuario no encontrado";
        header("Location: ../../login.php");
        exit();
    }

    //Cerrar la conexion
    mysqli_close($conn);    
   
?>