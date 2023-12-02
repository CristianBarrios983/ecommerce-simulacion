<?php
    session_start();

    //Destruye la sesion
    unset($_SESSION['email']);

    header("Location: ../login.php");
    exit();
?>