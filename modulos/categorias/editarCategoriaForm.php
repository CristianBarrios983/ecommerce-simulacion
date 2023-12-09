<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="../../styles.css">
  </head>
  <body class="bg-secondary-subtle">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <?php
            require("../../includes/conexion.php");
                
            $id = $_GET['id'];

            // Consulta para obtener los datos del registro a editar
            $query = "SELECT * FROM categorias WHERE id = $id;
            ";
            
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
            
        ?>
        <form action="actualizarCategoria.php" method="post" class="border p-3 bg-white" style="width: 18rem;">
            <h3>Actualizar categoria</h3>
            <?php
            // En el formulario de inicio de sesión (index.php)
            session_start();

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
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <div class="mb-3">
                <label for="categoria" class="form-label">Nombre categoria</label>
                <input type="text" class="form-control" name="categoria" aria-describedby="emailHelp" value="<?php echo $row['categoria'] ?>">
            </div>
            <button type="submit" class="btn btn-primary d-block w-100 rounded-0">Actualizar</button>
            <a href="index.php" class="btn btn-danger d-block w-100 rounded-0 mt-1">Volver</a>
        </form>
        <?php
            }else{
                echo "<p>Categoria no encontrada</p>";
            }

            mysqli_close($conn);
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>