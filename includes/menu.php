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
        <a class="navbar-brand" href="#">Tienda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/pagina-productos/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Productos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                    </ul>
                </li>
                <?php
                    if(isset($_SESSION['email'])){
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-person-circle fs-5" style="color: antiquewhite;"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Usuario: <span class="badge text-bg-info"><?php echo $_SESSION['email']; ?></span></a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/pagina-productos/includes/salir.php">Salir</a></li>
                    </ul>
                <?php 
                    }else{
                ?>
                    <ul>
                        <li><a href="/pagina-productos/login.php" class="btn btn-danger rounded-0">Ingrese</a></li>
                    </ul>
                    <ul>
                        <li><a href="/pagina-productos/register.php" class="btn btn-primary rounded-0">Registrese</a></li>
                    </ul>
                <?php
                    }
                ?>
                </li>
            </ul>
            <form class="d-flex me-3" role="search">
                <input class="form-control rounded-0" type="search" placeholder="Buscar..." aria-label="Search">
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
