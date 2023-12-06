<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-primary-subtle">

    <main class="container bg-light mb-5 mt-5">
        <h2 class="text-center mb-4">Transportes</h2>
        <p class="text-center fs-4">Seleccione el transporte</p>
        <div class="row justify-content-center gap-3 mb-5">

            <form id="formulario" action="../carrito/cart.php" method="post" style="width: 18rem;">
            <!-- Datos que se envian en forma oculta -->
            <input type="hidden" value="ref"  name="transporte">
            <input type="hidden" value="Transporte de envio: Empresa 01" name="empresa">
            <input type="hidden" value="15000" name="precio">
            <input type="hidden" value="1" name="cantidad">
            <div class="card rounded-0">
                <div class="img-hover">
                <img src="../../images/transporte.webp" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="card-body">
                <h5 class="card-title">Empresa 01</h5>
                <p class="card-text card-description text-center">24hs</p>
                <p class="card-text text-success fw-semibold fs-3">$15000</p>
                <input type="submit" class="btn btn-primary d-block rounded-0 w-100" value="Seleccionar transporte">
                </div>
            </div>
            </form>

            <form id="formulario" action="../carrito/cart.php" method="post" style="width: 18rem;">
            <!-- Datos que se envian en forma oculta -->
            <input type="hidden" value="ref"  name="transporte">
            <input type="hidden" value="Transporte de envio: Empresa 02" name="empresa">
            <input type="hidden" value="10000" name="precio">
            <input type="hidden" value="1" name="cantidad">
            <div class="card rounded-0">
                <div class="img-hover">
                <img src="../../images/transporte.webp" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="card-body">
                <h5 class="card-title">Empresa 02</h5>
                <p class="card-text card-description text-center">48hs</p>
                <p class="card-text text-success fw-semibold fs-3">$10000</p>
                <input type="submit" class="btn btn-primary d-block rounded-0 w-100" value="Seleccionar transporte">
                </div>
            </div>
            </form>

            <form id="formulario" action="../carrito/cart.php" method="post" style="width: 18rem;">
            <!-- Datos que se envian en forma oculta -->
            <input type="hidden" value="ref"  name="transporte">
            <input type="hidden" value="Transporte de envio: Empresa 03" name="empresa">
            <input type="hidden" value="5000" name="precio">
            <input type="hidden" value="1" name="cantidad">
            <div class="card rounded-0">
                <div class="img-hover">
                <img src="../../images/transporte.webp" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="card-body">
                <h5 class="card-title">Empresa 03</h5>
                <p class="card-text card-description text-center">72hs</p>
                <p class="card-text text-success fw-semibold fs-3">$5000</p>
                <input type="submit" class="btn btn-primary d-block rounded-0 w-100" value="Seleccionar transporte">
                </div>
            </div>
            </form>
    
        </div>
        <a href="index.php" class="btn btn-danger rounded-0 mb-5">Volver atras</a>
        <a href="finalizar-pedido.php" class="btn btn-success rounded-0 mb-5">Siguiente</a>
   </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
</body>
</html>