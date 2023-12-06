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
    <title>Lista transportes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body>
    <?php include('../../includes/menu-admin.php'); ?>
    <div class="container mt-4">
        <h1>Lista transportes</h1>
         <!-- Botón de registro -->
         <div class="d-flex justify-content-start mb-3">
            <a href="registrarTransporteForm.php" class="btn btn-primary rounded-0">Registrar transporte</a>
        </div>

        <?php
            //Conexion a la base de datos
            require('../../includes/conexion.php');

            //Consulta para obtener los datos de las personas
            $query = "SELECT * FROM transportes";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) > 0){
        ?>

        <!-- Tabla centrada -->
        <div class="row justify-content-center">
        <?php
            // En el formulario de inicio de sesión (index.php)

            // Verificar si hay un mensaje almacenado en la variable de sesión
            if (isset($_SESSION['mensaje'])) {
                $mensaje = $_SESSION['mensaje'];
                // Eliminar el mensaje de la variable de sesión para que no se muestre nuevamente
                unset($_SESSION['mensaje']);
            }
            ?>
            <?php if (isset($mensaje)) : ?>
                <div class="alert alert-dark" role="alert">
                    <?php echo $mensaje; ?>
                </div>
            <?php endif; ?>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Transporte</th>
                            <th>Tiempo entrega</th>
                            <th>Precio envio</th>
                            <th colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($result)):
                    ?>

                        <tr>
                            <td><?php echo $row['id'];  ?></td>
                            <td><img style="max-height: 50px" src="<?php echo $row['imagen']; ?>"></td>
                            <td><?php echo $row['empresa'];  ?></td>
                            <td><?php echo $row['tiempo_entrega'];  ?></td>
                            <td><?php echo $row['precio_envio'];  ?></td>
                            <td><a href="editarTransporteForm.php?id=<?php echo $row['id']; ?>" class="btn btn-warning rounded-0"><i class="bi bi-pencil-square"></i></a></td>
                            <td><a href="eliminarTransporte.php?id=<?php echo $row['id']; ?>" class="btn btn-danger rounded-0"><i class="bi bi-trash3"></i></a></td>
                        </tr>
                    </tbody>
                    <?php endwhile; ?>
                </table>
                <?php
            } else {
                // No hay registros, mostrar el mensaje
                echo "<p>No hay registros.</p>";
            }

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
        ?>
            </div>
        </div>
    </div>


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