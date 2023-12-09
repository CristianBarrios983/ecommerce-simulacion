<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">  
    <div class="container-fluid">
      <a class="navbar-brand">Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/pagina-productos/panel-admin.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pagina-productos/modulos/productos/index.php">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pagina-productos/modulos/categorias/index.php">Categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pagina-productos/modulos/transportes/index.php">Transportes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pagina-productos/modulos/pedidos/pedidos.php">Pedidos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-5" style="color: antiquewhite;"></i>
            </a>
            <ul class="dropdown-menu rounded-0">
              <li><a class="dropdown-item">Cuenta: <span class="badge text-bg-warning"><?php echo $_SESSION['admin']; ?></span></a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/pagina-productos/includes/salir-admin.php">Salir</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>