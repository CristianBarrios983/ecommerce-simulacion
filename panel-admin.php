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
                    <p class="card-text">0</p>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Productos</div>
                <div class="card-body">
                    <h5 class="card-title">Productos registrados</h5>
                    <p class="card-text">0</p>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Ventas</div>
                <div class="card-body">
                    <h5 class="card-title">Ventas realizadas</h5>
                    <p class="card-text">0</p>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Ganancias</div>
                <div class="card-body">
                    <h5 class="card-title">Dinero recaudado</h5>
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