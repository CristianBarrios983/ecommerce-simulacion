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
        <form class="border p-3 bg-white" style="width: 18rem;">
            <h3>Registrar producto</h3>
            <div class="mb-3">
                <label for="nombre-producto" class="form-label">Nombre producto</label>
                <input type="text" class="form-control" name="nombre-producto" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Agregar foto del producto</label>
                <input type="file" class="form-control" name="foto" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary d-block w-100 rounded-0">Registrar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>