<?php
    session_start();

    if(isset($_SESSION['email'])){
        if(isset($_SESSION['carrito']) && !(empty($_SESSION['carrito']))){
?>
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

    <!-- Menu -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">  
        <div class="container-fluid">
            <a class="navbar-brand">Tienda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/pagina-productos/index.php">Home</a>
                    </li>
                    <?php
                        if(isset($_SESSION['email'])){
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-5" style="color: antiquewhite;"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Cuenta: <span class="badge text-bg-info"><?php echo $_SESSION['email']; ?></span></a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/pagina-productos/includes/salir.php">Salir</a></li>
                        </ul>
                    <?php 
                        }
                    ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container bg-light mb-5 mt-5">
        <div class="row">
            <div class="texts mt-4">
                <h2 class="text-center mb-3">Transportes</h2>
                <p class="text-center fs-4">Seleccione el transporte</p>
            </div>
        </div>
        <div class="row justify-content-center gap-3 mb-5">

        <?php
            //Conexion a la base de datos
            require('../../includes/conexion.php');

            //Consulta para obtener los datos de los productos
            $query = "SELECT * FROM transportes";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) > 0){
        ?>
        
        <?php
            while($row = mysqli_fetch_assoc($result)):
        ?>
            <form id="formulario" action="finalizar-pedido.php" method="post" style="width: 18rem;">
            <!-- Datos que se envian en forma oculta -->
            <input type="hidden" value="<?php echo $row['id'] ?>"  name="id">
            <input type="hidden" value="Transporte de envio: <?php echo $row['empresa'] ?>" name="empresa">
            <input type="hidden" value="<?php echo $row['tiempo_entrega'] ?>" name="tiempo_entrega">
            <input type="hidden" value="<?php echo $row['precio_envio'] ?>" name="precio_envio">
            <input type="hidden" value="<?php echo $row['imagen'] ?>" name="imagen">
            <div class="card rounded-0">
                <div class="img-hover">
                <img src="<?php echo $row['imagen'] ?>" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="card-body">
                <h5 class="card-title"><?php echo $row['empresa'] ?></h5>
                <p class="card-text card-description text-center"><?php echo $row['tiempo_entrega'] ?></p>
                <p class="card-text text-success fw-semibold fs-3"><?php echo $row['precio_envio'] ?></p>
                <input type="submit" class="btn btn-primary d-block rounded-0 w-100" value="Seleccionar transporte">
                </div>
            </div>
            </form>
            <?php endwhile; ?>

            <?php
                } else {
                    // No hay registros, mostrar el mensaje
                    echo '<p class="text-center fs-4">No hay transportes por el momento</p>';
                }
            
            // Cerrar la conexión a la base de datos
            mysqli_close($conn);
            ?>
    
        </div>
        <a href="index.php" class="btn btn-danger rounded-0 mb-3">Volver atras</a>
   </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
</body>
</html>
<?php
        }else{
            header("Location: ../../index.php");
        }
    }else{
        header("Location: ../../index.php");
    }
?>