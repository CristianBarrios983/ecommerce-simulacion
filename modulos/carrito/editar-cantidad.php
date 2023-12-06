<?php
    session_start();
    // Editar cantidad
    if(isset($_POST['cantidad'])){
        $mi_carrito=$_SESSION['carrito'];
        $id = $_POST['id'];
        $cuantos = $_POST['cantidad'];

        if($cuantos < 1){
            unset($mi_carrito[$id]);
        } else {
            $mi_carrito[$id]['cantidad'] = $cuantos;
        }
    }
    $_SESSION['carrito'] = $mi_carrito;

    header("Location: " . $_SERVER['HTTP_REFERER']);
?>