<?php 
    session_start(); 

    // Verificar si el usuario ha iniciado sesión como admin
    if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
    
    <?php
        include("../../includes/menu-admin.php");
    ?>

<div class="container my-4">
        <h1>Pedidos</h1>

        <?php
            //Conexion a la base de datos
            require('../../includes/conexion.php');

            //Consulta para obtener los datos de las personas
            $query = "SELECT pedidos.id, pedidos.fecha, pedidos.total FROM pedidos";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) > 0){
        ?>

        <!-- Tabla centrada -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Monto total</th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($result)):
                    ?>

                        <tr>
                            <td><?php echo $row['id'];  ?></td>
                            <td><?php echo $row['fecha'];  ?></td>
                            <td>$<?php echo $row['total'];  ?></td>
                            <td><a href="detalles-pedidos.php?id=<?php echo $row['id']; ?>" class="btn btn-primary rounded-0">Ver detalles<i class="bi bi-card-list ms-1"></i></a></td>
                        </tr>
                    </tbody>
                    <?php endwhile; ?>
                </table>
                <?php
            } else {
                // No hay pedidos, mostrar el mensaje
                echo '<p class="text-center fs-5">No hay pedidos realizados.</p>';
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
        header("Location: /pagina-productos/login-admin.php");
        exit();
    }
?>