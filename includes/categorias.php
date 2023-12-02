<div class="categorias">
    <div class="container">
        <div class="row d-flex justify-content-center mb-5 gap-3">
        <?php
            //Conexion a la base de datos
            require('includes/conexion.php');

            //Consulta para obtener los datos de las personas
            $query = "SELECT * FROM categorias";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) > 0){
        ?>

        <?php
            while($row = mysqli_fetch_assoc($result)):
        ?>
            <a href="/pagina-productos/modulos/busqueda/productos-por-categoria.php?categoria=<?php echo $row['id']; ?>" class="col-2 d-flex justify-content-center align-items-center text-decoration-none border bg-secondary-subtle category">
                <div class="text-center p-3 rounded-0 border-0">
                    <p class="fs-5 fw-semibold m-0"><?php echo $row['categoria']; ?></p>
                </div>
            </a>'

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
    </div>
</div> 