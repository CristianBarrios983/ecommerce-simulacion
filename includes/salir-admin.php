<?php
    session_start();

    //Destruye la session de admin
    unset($_SESSION['admin']);

    header("Location: ../login-admin.php");
    exit();
?>