<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../../styles.css">
</head>
<body class="bg-primary-subtle">

    <?php
        include('../../includes/menu.php');
        include('../carrito/modal-cart.php');
    ?>

    <div class="container my-5">
        <div class="title">
            <h1 class="text-center mb-4">Mi pedido</h1>
        </div>
        <div class="row">
            <div class="product-table">
                <table class="table text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <?php
                        if(isset($_SESSION['carrito']) && !(empty($_SESSION['carrito']))){
                        $mi_carrito=$_SESSION['carrito'];
                         $total=0;
                            for($i=0;$i<=count($mi_carrito)-1;$i++){
                            if(isset($mi_carrito[$i])){
                            if($mi_carrito[$i]!=NULL){
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td>
                                <img src="<?php echo $mi_carrito[$i]['imagen']; ?>" alt="" style="width: 70px;">
                            </td>
                            <td><?php echo $mi_carrito[$i]['producto']; ?></td>
                            <td><?php echo $mi_carrito[$i]['descripcion']; ?></td>
                            <td>$<?php echo $mi_carrito[$i]['precio']; ?></td>
                            <td>
                                <form action="../carrito/editar-cantidad.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $i ?>">
                                    <input type="number" id="cantidad" name="cantidad" value="<?php echo $mi_carrito[$i]['cantidad'] ?>" size="1" min="1">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-arrow-repeat"></i></button>
                                </form>
                            </td>
                            <td>$<?php echo $mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']; ?></td>
                            <td class="bg-white text-center">
                                <form action="../carrito/eliminar-producto.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $i ?>">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            $total=$total + ($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']);
                            }
                            }
                            }
                            }else{
                                header("Location: ../../index.php");
                            }
                        ?>
                        <tr class="table-last-row">
                            <th colspan="8" class="text-start">Total:
                            <?php
                                if(isset($_SESSION['carrito'])){
                                $total=0;
                                for($i=0;$i<=count($mi_carrito)-1;$i++){
                                    if(isset($mi_carrito)){
                                    if($mi_carrito[$i]!=NULL){
                                        $total=$total + ($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']);
                                    }
                                    }
                                }
                                }
                                if(!isset($total)){$total = '0';}else{$total = $total;}
                                echo "$".$total;
                            ?>
                            </th>
                        </tr>
                    </tbody>
            </table>
            <a href="index.php" class="btn btn-danger rounded-0 mb-5">Volver atras</a>
            </div>
        </div>
    </div>

    <?php
        include('../../includes/footer.php');
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>