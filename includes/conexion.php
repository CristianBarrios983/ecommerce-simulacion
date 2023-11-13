<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "webproducts";


    //Estableciendo la conexion con la base de datos
    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }
?>