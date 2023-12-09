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
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="../../styles.css">
  </head>
  <body class="bg-secondary-subtle">
    <div class="container d-flex justify-content-center align-items-center my-5" style="height: 100vh;">
        <form action="registrarProducto.php" method="post" class="border p-3 bg-white" style="width: 18rem;" enctype="multipart/form-data">
            <h3>Registrar producto</h3>
            <?php
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
            <div class="mb-3">
                <label for="nombre-producto" class="form-label">Nombre producto</label>
                <input type="text" class="form-control" name="nombre-producto" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio $</label>
                <input type="number" class="form-control" name="precio" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <?php 
                    require('../../includes/conexion.php');

                    $query = "SELECT id, categoria FROM categorias";
                    $result = mysqli_query($conn,$query);
                ?>
                <select class="form-select" aria-label="Default select example" name="categoria">
                    <option selected>Seleccione una categoria</option>
                    <?php
                         while($row = mysqli_fetch_assoc($result)):
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['categoria']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary d-block w-100 rounded-0">Registrar</button>
            <a href="index.php" class="btn btn-danger d-block w-100 rounded-0 mt-1">Volver</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
    }else{
        // El usuario admin no ha iniciado sesión, redirigir a una página de inicio de sesión
        header("Location: /pagina-productos/login-admin.php");
        exit();
    }
?>