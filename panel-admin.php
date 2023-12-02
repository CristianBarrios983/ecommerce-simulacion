<?php
    // Inicia sesión para acceder a la variable $_SESSION
    session_start();

    // Verificar si el usuario ha iniciado sesión como admin
    if (isset($_SESSION['admin'])) {
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  </head>
  <body>
    <?php include('includes/menu-admin.php') ?>

    <div class="container">
        <h2>Panel admin</h2>

        <div class="row">
            <div class="col-md-3">
                <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Usuarios</div>
                <div class="card-body">
                    <h5 class="card-title">Usuarios registrados</h5>
                    <?php 
                            require('includes/conexion.php');

                            //Se realiza la consulta para contar el numero de usuarios
                            $query = "SELECT COUNT(*) AS totalUsuarios FROM usuarios";
                            $result = mysqli_query($conn, $query);

                            //Obtener el resultado de la consulta
                            $row = mysqli_fetch_assoc($result);
                            $totalUsuarios = $row['totalUsuarios'];
                        ?>
                    <p class="card-text"><?php echo $totalUsuarios; ?></p>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Productos</div>
                <div class="card-body">
                    <h5 class="card-title">Productos registrados</h5>
                    <?php 
                            require('includes/conexion.php');

                            //Se realiza la consulta para contar el numero de usuarios
                            $query = "SELECT COUNT(*) AS totalProductos FROM productos";
                            $result = mysqli_query($conn, $query);

                            //Obtener el resultado de la consulta
                            $row = mysqli_fetch_assoc($result);
                            $totalProductos = $row['totalProductos'];
                        ?>
                    <p class="card-text"><?php echo $totalProductos ?></p>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Pedidos</div>
                <div class="card-body">
                    <h5 class="card-title">Pedidos realizados</h5>
                    <p class="card-text">0</p>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Ganancias</div>
                <div class="card-body">
                    <h5 class="card-title">Ganancias</h5>
                    <p class="card-text">$0</p>
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <h2>Productos mas vendidos</h2>
            <div class="col-md-6">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Vendidos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
    }else{
        // El usuario admin no ha iniciado sesión, redirigir a una página de inicio de sesión
        header("Location: login-admin.php");
        exit();
    }
?>