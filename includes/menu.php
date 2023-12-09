<?php
    // Iniciar carrito
    if (isset($_SESSION['carrito'])) {
        $mi_carrito = $_SESSION['carrito'];
    }

    // Contabilizamos productos únicos en nuestro carrito
    $total_productos_unicos = 0;
    if (isset($mi_carrito) && is_array($mi_carrito)) {
        $productos_unicos = array_unique(array_column($mi_carrito, 'producto'));
        $total_productos_unicos = count($productos_unicos);
}

?>

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
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#categorias">Categorias</a>
                </li> -->

                <?php
                    //Conexion a la base de datos
                    require('conexion.php');

                    //Consulta para obtener los datos de los productos
                    $query = "SELECT * FROM categorias";
                    $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) > 0){
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                            while($row = mysqli_fetch_assoc($result)):
                        ?>
                        <li><a class="dropdown-item" href="/pagina-productos/modulos/busqueda/productos-por-categoria.php?categoria=<?php echo $row['id']; ?>""><?php echo $row['categoria']; ?></a></li>

                        <?php endwhile; ?>

                <?php

                    } else {
                        // No hay registros, mostrar el mensaje
                        echo '<li><a class="dropdown-item">No hay categorias</a></li>';
                    }
                
                    // Cerrar la conexión a la base de datos
                    mysqli_close($conn);
                ?>
                    </ul>
                </li>
                <?php
                    if(isset($_SESSION['email'])){
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-person-circle fs-5" style="color: antiquewhite;"></i>
                    </a>
                    <ul class="dropdown-menu rounded-0">
                        <li><a class="dropdown-item" href="#">Cuenta: <span class="badge text-bg-info"><?php echo $_SESSION['email']; ?></span></a></li>
                        <li><a class="dropdown-item" href="/pagina-productos/modulos/usuarios/mis-pedidos.php">Mis pedidos</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/pagina-productos/includes/salir.php">Salir</a></li>
                    </ul>
                <?php 
                    }else{
                ?>
                    <ul class="d-flex gap-2 list-unstyled">
                        <li><a href="/pagina-productos/login.php" class="btn btn-danger rounded-0">Ingrese</a></li>
                        <li><a href="/pagina-productos/register.php" class="btn btn-primary rounded-0">Registrese</a></li>
                    </ul>
                <?php
                    }
                ?>
                </li>
            </ul>
            <form class="d-flex me-3 needs-validation position-relative" action="/pagina-productos/modulos/busqueda/busqueda-producto.php" method="get" role="search" novalidate>
                <input class="form-control rounded-0" name="busqueda" id="busqueda" type="search" placeholder="Buscar..." aria-label="Search" required>
                <div class="invalid-tooltip rounded-0">
                    Campo vacio
                </div>
                <button class="btn btn-outline-success rounded-0" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#cartModal" class="text-decoration-none text-white"><i class="bi bi-bag fs-5 me-1" style="color: antiquewhite;"></i><?php echo $total_productos_unicos; ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
