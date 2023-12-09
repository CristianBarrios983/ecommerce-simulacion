<?php
    session_start();

    //Destruye la sesion
    unset($_SESSION['email']);
    unset($_SESSION['carrito']);

    header("Location: ../login.php");
    exit();
?>