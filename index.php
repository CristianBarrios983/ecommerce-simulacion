<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="styles.css">
</head>
<body>

  <?php 
    session_start();
    include('includes/menu.php'); 
    include('modulos/carrito/modal-cart.php');
    include('includes/carousel.php');
  ?>

   <main class="container">
    <h2 class="text-center mb-5 mt-5">Mejores productos</h2>
      <div class="row justify-content-center gap-3 mb-5">

      <?php
            //Conexion a la base de datos
            require('includes/conexion.php');

            //Consulta para obtener los datos de las personas
            $query = "SELECT * FROM productos";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) > 0){
        ?>
        
        <?php
            while($row = mysqli_fetch_assoc($result)):
        ?>
        <form id="formulario" action="modulos/carrito//cart.php" method="post" style="width: 18rem;">
          <!-- Datos que se envian en forma oculta -->
          <input type="hidden" value="<?php echo $row['nombre']; ?>"  name="producto">
          <input type="hidden" value="<?php echo $row['descripcion']; ?>" name="descripcion">
          <input type="hidden" value="<?php echo $row['precio']; ?>" name="precio">
          <input type="hidden" value="1" name="cantidad">
          <div class="card rounded-0">
            <div class="img-hover">
              <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" class="card-img-top rounded-0" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
              <p class="card-text card-description"><?php echo $row['descripcion']; ?></p>
              <p class="card-text text-success fw-semibold fs-3"><?php echo "$".$row['precio']; ?></p>
              <input type="submit" class="btn btn-primary d-block rounded-0 w-100" value="Añadir">
            </div>
          </div>
        </form>

        <?php endwhile; ?>

        <?php
            } else {
                // No hay registros, mostrar el mensaje
                echo '<p class="text-center fs-4">No hay registros.</p>';
            }
        
        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
        ?>

      </div>
   </main>

   <?php
      include('includes/categorias.php');
   ?>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
</body>
</html>