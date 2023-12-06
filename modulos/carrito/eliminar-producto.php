<?php
session_start();
    // Eliminar producto
    if(isset($_POST['id'])){
        $mi_carrito=$_SESSION['carrito'];
        $id = $_POST['id']; 

    // Verificar si el índice existe antes de intentar eliminarlo
    if(isset($mi_carrito[$id])){
        unset($mi_carrito[$id]);
    }
}
$_SESSION['carrito'] = $mi_carrito;

header("Location: " . $_SERVER['HTTP_REFERER']);

?>