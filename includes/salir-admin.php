<?php
    session_start();

    //Destruye la sesion
    session_destroy();

    header("Location: ../login-admin.php");
    exit();
?>