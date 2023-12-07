<?php
session_start();
require("../../includes/conexion.php");

if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['pais']) && !empty($_POST['direccion']) && !empty($_POST['ciudad']) && !empty($_POST['ubicacion']) && !empty($_POST['c_postal']) && !empty($_POST['telefono']) && !empty($_POST['total'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $pais = $_POST['pais'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $ubicacion = $_POST['ubicacion'];
    $codigo_postal = $_POST['c_postal'];
    $telefono = $_POST['telefono'];

    $fecha = date("Y-m-d");
    $total = $_POST['total'];

    // Inserción en la tabla datos_envios
    $query = "INSERT INTO datos_envios (nombre, apellido, pais, direccion, ciudad, ubicacion, codigo_postal, telefono) VALUES ('$nombre','$apellido','$pais','$direccion','$ciudad','$ubicacion','$codigo_postal',$telefono)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Obtener el ID del último registro insertado
        $id_datos_envios = mysqli_insert_id($conn);

        // Obtener el ID de usuario de la sesión
        $id_usuario = $_SESSION['id'];

        // Obtener el ID de transporte de la sesión
        $id_transporte = $_SESSION['transporte']['id'];

        // Inserción en la tabla pedidos
        $query = "INSERT INTO pedidos (fecha, usuario, total, datos_envio, transporte) VALUES ('$fecha', $id_usuario, $total, $id_datos_envios, $id_transporte)";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Obtener el ID del último registro insertado
            $id_pedido = mysqli_insert_id($conn);

            // Iterar sobre los productos en el carrito
            foreach ($_SESSION['carrito'] as $producto) {
                $id_producto = $producto['id'];
                $cantidad = $producto['cantidad'];
                $precio = $producto['precio'];
                $total = $precio * $cantidad;

                // Inserción en la tabla detalles
                $query = "INSERT INTO detalles (pedido, producto, cantidad, total) VALUES ($id_pedido, $id_producto, $cantidad, $total)";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "Error al registrar detalles del producto.";
                    exit;
                }
            }
            unset($_SESSION['carrito']);
            unset($_SESSION['transporte']);
            echo "Pedido realizado satisfactoriamente";
            echo '<a href="../../index.php">Ir a la pagina principal</a>';
        } else {
            echo "Error al registrar pedido: " . mysqli_error($conn);
        }
    } else {
        echo "Error al registrar datos de envío: " . mysqli_error($conn);
    }
} else {
    echo "Datos no recibidos correctamente";
}
?>
