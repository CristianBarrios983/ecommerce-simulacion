<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="bg-secondary-subtle">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form action="registrarTransporte.php" method="post" class="border p-3 bg-white" style="width: 18rem;" enctype="multipart/form-data">
            <h3>Registrar transporte</h3>
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
            <div class="mb-3">
                <label for="empresa" class="form-label">Empresa</label>
                <input type="text" class="form-control" name="empresa" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="tiempo-entrega" class="form-label">Tiempo entrega</label>
                <input type="text" class="form-control" name="tiempo-entrega" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="precio-envio" class="form-label">Precio envio $</label>
                <input type="number" class="form-control" name="precio-envio" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary d-block w-100 rounded-0">Registrar</button>
            <a href="index.php" class="btn btn-danger d-block w-100 rounded-0 mt-1">Volver</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>