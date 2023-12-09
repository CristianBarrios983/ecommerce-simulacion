<?php 
    session_start(); 

    // Verificar si el usuario ha iniciado sesión como admin
    if (isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../../styles.css">
</head>
<body class="bg-primary-subtle">
    
    <?php
        include("../../includes/menu.php");
        include("../carrito/modal-cart.php");
    ?>

<div class="container mt-4">
        <h1>Detalles</h1>

        <?php
            //Conexion a la base de datos
            require('../../includes/conexion.php');

            $id_pedido = $_GET['id'];

            //Consulta para obtener los datos de las personas
            $query = "SELECT productos.nombre, productos.imagen, detalles.cantidad, detalles.total FROM detalles
            INNER JOIN productos ON detalles.producto = productos.id
            INNER JOIN pedidos ON detalles.pedido = pedidos.id
            WHERE detalles.pedido = $id_pedido";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) > 0){
        ?>

        <!-- Tabla centrada -->
        <div class="row justify-content-center my-3">
            <div class="col-md-6">
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)):
                            $i++;
                    ?>

                        <tr>
                            <td><?php echo $i;  ?></td>
                            <td>
                                <img src="<?php echo $row['imagen']; ?>" alt="" style="width: 100px;">
                            </td>
                            <td><?php echo $row['nombre'];  ?></td>
                            <td><?php echo $row['cantidad'];  ?></td>
                            <td>$<?php echo $row['total'];  ?></td>
                        </tr>
                    </tbody>
                    <?php endwhile; ?>
                </table>
                <a href="mis-pedidos.php" class="btn btn-danger rounded-0 mt-3">Volver a pedidos</a>
                <?php
            }

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
        ?>
            </div>
        </div>
    </div>

    <?php
        include('../../includes/footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
<?php 
    }else{
        // El usuario admin no ha iniciado sesión, redirigir a una página de inicio de sesión
        header("Location: /pagina-productos/login.php");
        exit();
    }
?>