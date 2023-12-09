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

    <!-- CSS -->
    <link rel="stylesheet" href="styles.css">

  </head>
  <body>
    <?php include('includes/menu-admin.php') ?>

    <div class="container my-4">
        <h2 class="mb-3">Panel admin</h2>

        <div class="row">
            <div class="col-md-3">
                <div class="card text-bg-primary mb-3 rounded-0" style="max-width: 18rem;">
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
                <div class="card text-bg-warning mb-3 rounded-0" style="max-width: 18rem;">
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
                <div class="card text-bg-danger mb-3 rounded-0" style="max-width: 18rem;">
                <div class="card-header">Categorias</div>
                <div class="card-body">
                    <h5 class="card-title">Categorias registradas</h5>
                    <?php 
                            require('includes/conexion.php');

                            //Se realiza la consulta para contar el numero de usuarios
                            $query = "SELECT COUNT(*) AS totalCategorias FROM categorias";
                            $result = mysqli_query($conn, $query);

                            //Obtener el resultado de la consulta
                            $row = mysqli_fetch_assoc($result);
                            $totalCategorias = $row['totalCategorias'];
                    ?>
                    <p class="card-text"><?php echo $totalCategorias; ?></p>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-bg-success mb-3 rounded-0" style="max-width: 18rem;">
                <div class="card-header">Pedidos</div>
                <div class="card-body">
                    <h5 class="card-title">Pedidos realizados</h5>
                    <?php 
                            require('includes/conexion.php');

                            //Se realiza la consulta para contar el numero de usuarios
                            $query = "SELECT COUNT(*) AS totalPedidos FROM pedidos";
                            $result = mysqli_query($conn, $query);

                            //Obtener el resultado de la consulta
                            $row = mysqli_fetch_assoc($result);
                            $totalPedidos = $row['totalPedidos'];
                    ?>
                    <p class="card-text"><?php echo $totalPedidos; ?></p>
                </div>
                </div>
            </div>

        </div>

        <div class="row">
            <h2 class="mb-3">Productos mas solicitados</h2>
            <div class="col-md-6">
                <table class="table text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col"></th>
                            <th scope="col">cantidad</th>
                        </tr>
                    </thead>
                    <?php
                        require("includes/conexion.php");

                        $query="SELECT productos.nombre, productos.imagen, SUM(detalles.cantidad) AS total_cantidad
                        FROM detalles
                        JOIN productos ON detalles.producto = productos.id
                        GROUP BY productos.nombre
                        ORDER BY total_cantidad DESC
                        LIMIT 5;
                        ";
                        $result=mysqli_query($conn,$query);

                        if(mysqli_num_rows($result) > 0){
                    ?>

                    <?php
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)):
                            $i++;
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $row['nombre']; ?></td>
                            <td>
                                <img src="<?php echo $row['imagen']; ?>" alt="" style="width: 100px;">
                            </td>
                            <td><?php echo $row['total_cantidad']; ?></td>
                        </tr>
                    </tbody>
                    <?php endwhile; ?>

                    <?php
                        }else{
                            echo '<td class="text-center" colspan="4">Aun no hay pedidos</td>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <?php
        include('includes/footer.php');
    ?>

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