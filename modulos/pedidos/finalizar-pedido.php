<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-primary-subtle">
    <?php
        include('../../includes/menu.php');
    ?>

    <div class="container my-5 bg-light">
        <div class="row">
            <div class="product-table">
                <h3 class="text-center">Importe del pedido</h3>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <?php
                        if(isset($_SESSION['carrito'])){
                        $mi_carrito=$_SESSION['carrito'];
                         $total=0;
                            for($i=0;$i<=count($mi_carrito)-1;$i++){
                            if(isset($mi_carrito[$i])){
                            if($mi_carrito[$i]!=NULL){
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td>...</td>
                            <td><?php echo $mi_carrito[$i]['producto']; ?></td>
                            <td><?php echo $mi_carrito[$i]['descripcion']; ?></td>
                            <td>$<?php echo $mi_carrito[$i]['precio']; ?></td>
                            <td><?php echo $mi_carrito[$i]['cantidad']; ?></td>
                            <td>$<?php echo $mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']; ?></td>
                        </tr>
                        <?php
                            $total=$total + ($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']);
                            }
                            }
                            }
                            }
                        ?>
                        <tr class="table-last-row">
                            <th colspan="7">Total($ARS):
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
                                echo $total;
                            ?>
                            </th>
                        </tr>
                        <tr class="table-last-row">
                            <th colspan="7">I.V.A($ARS):
                            <?php
                                $iva=$total/1.21;
                                $totaliva=$total-$iva;
                                echo number_format($totaliva, 0, '', '');
                            ?>
                            </th>
                        </tr>
                        <tr class="table-last-row">
                            <th colspan="7">Total + I.V.A($ARS):
                            <?php
                                $totalfinal=$total+$totaliva;
                                echo number_format($totalfinal, 0, '', '');
                            ?>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <h3 class="text-center">Datos de envio</h3>
            <div class="form-datos-envio d-flex justify-content-center">
                <form class="mt-5 mb-5" style="width:40rem">
                    <div class="mb-3 d-flex gap-2">
                        <div class="col-lg-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control rounded-0" id="nombre" name="nombre">
                        </div>
                        <div class="col-lg-6">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control rounded-0" id="apellido" name="nombre">
                        </div>
                    </div>
                    <div class="mb-3 d-flex gap-2">
                        <div class="col-lg-6">
                            <label for="localidad" class="form-label">Localidad</label>
                            <input type="text" class="form-control rounded-0" id="localidad" name="localidad">
                        </div>
                        <div class="col-lg-6">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control rounded-0" id="telefono" name="telefono">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success rounded-0 w-100">Pagar y finalizar</button>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>