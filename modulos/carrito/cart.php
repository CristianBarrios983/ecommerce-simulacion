<?php
    session_start();

    // Empieza el carrito
    if(isset($_POST['producto'])){
        $producto = $_POST['producto'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];

        if(isset($_SESSION['carrito'])){
            $mi_carrito = $_SESSION['carrito'];

            // Buscar si el producto ya está en el carrito
            $producto_existente = array_filter($mi_carrito, function($item) use ($producto) {
                return $item['producto'] == $producto;
            });

            if(!empty($producto_existente)){
                // Producto ya en el carrito, actualizar cantidad
                $mi_carrito[key($producto_existente)]['cantidad'] += $cantidad;
            } else {
                // Producto no en el carrito, agregarlo
                $mi_carrito[] = array("producto" => $producto, "descripcion" => $descripcion, "precio" => $precio, "cantidad" => $cantidad);
            }
        } else {
            // No hay carrito, crear uno nuevo
            $mi_carrito[] = array("producto" => $producto, "descripcion" => $descripcion, "precio" => $precio, "cantidad" => $cantidad);
        }

        $_SESSION['carrito'] = $mi_carrito;
    }

    // Redireccionar de vuelta a la página anterior
    header("Location: " . $_SERVER['HTTP_REFERER']);


?>