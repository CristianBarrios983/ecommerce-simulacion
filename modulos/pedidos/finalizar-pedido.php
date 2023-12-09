<?php 
    session_start();
    
    if(isset($_SESSION['email'])){
        
        if(isset($_SESSION['carrito']) && !(empty($_SESSION['carrito']))){

            if(isset($_POST['empresa'])){
                $id=$_POST['id'];
                $empresa=$_POST['empresa'];
                $tiempo_entrega=$_POST['tiempo_entrega'];
                $precio_envio=$_POST['precio_envio'];
                $imagen=$_POST['imagen'];

                // Almacena los datos en la sesión
                $_SESSION['transporte'] = array(
                    "id" => $id,
                    "empresa" => $empresa,
                    "tiempo_entrega" => $tiempo_entrega,
                    "precio_envio" => $precio_envio,
                    "imagen" => $imagen
                );

                $transporte = $_SESSION['transporte'];
            
?>
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

    <div class="container my-5 bg-light">
        <div class="row">
            <div class="product-table">
                <h3 class="text-center my-4">Importe del pedido</h3>
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
                            <td>
                                <img src="<?php echo $mi_carrito[$i]['imagen']; ?>" alt="" style="width: 70px;">
                            </td>
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
                        <tr>
                            <th class="table-dark text-center" colspan="7">Transporte</th>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-center">
                                <img src="<?php echo $transporte['imagen']; ?>" alt="" style="max-height: 100px;">
                            </td>
                            <td colspan="2"><?php echo $transporte['empresa']; ?></td>
                            <td><?php echo $transporte['tiempo_entrega']; ?></td>
                            <td>$<?php echo $transporte['precio_envio']; ?></td>
                        </tr>
                        <tr class="table-last-row">
                            <th colspan="7" class="text-start">Total:
                            <?php
                                // Verifica si existe la session y si no esta vacia
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
                        <tr class="table-last-row">
                            <th colspan="7" class="text-start">I.V.A:
                            <?php
                                $iva=$total/1.21;
                                $totaliva=$total-$iva;
                                echo "$".number_format($totaliva, 0, '', '');
                            ?>
                            </th>
                        </tr>
                        <tr class="table-last-row">
                            <th colspan="7" class="text-start">Total + I.V.A:
                            <?php
                                $total_iva=$total+$totaliva;
                                echo "$".number_format($total_iva, 0, '', '');
                            ?>
                            </th>
                        </tr>
                        <tr class="table-last-row">
                            <th colspan="7" class="text-start">Total + envio:
                            <?php
                                $totalfinal=$total_iva+$transporte['precio_envio'];
                                echo "$".number_format($totalfinal, 0, '', '');
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
                <form class="mt-5 mb-5 needs-validation" action="hacer-pedido.php" method="post" style="width:40rem" novalidate>
                    <input type="hidden" value="<?php echo number_format($totalfinal, 0, '', ''); ?>" name="total" id="total">
                    <div class="mb-3 d-flex gap-2">
                        <div class="col-lg-6">
                            <input type="text" class="form-control rounded-0" id="nombre" name="nombre" placeholder="Nombre" required>
                            <div class="invalid-feedback">
                                Campo obligatorio
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control rounded-0" id="apellido" name="apellido" placeholder="Apellido" required>
                            <div class="invalid-feedback">
                                Campo obligatorio
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 d-flex gap-2">
                        <div class="col-lg-6">
                            <select class="form-select rounded-0" name="pais" id="pais" required>
                                <option value="" disabled selected>Seleccione un pais</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Estados Unidos">Estados Unidos</option>
                                <option value="Mexico">Mexico</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione el pais
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control rounded-0" id="direccion" name="direccion" placeholder="Apartamento, suite, unidad, edificio, piso, etc." required>
                            <div class="invalid-feedback">
                                Campo obligatorio
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 d-flex gap-2">
                        <div class="col-lg-6">
                            <input type="text" class="form-control rounded-0" id="ciudad" name="ciudad" placeholder="Ciudad" required>
                            <div class="invalid-feedback">
                                Campo obligatorio
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control rounded-0" id="ubicacion" name="ubicacion" placeholder="Estado/Provincia/Region" required>
                            <div class="invalid-feedback">
                                Campo obligatorio
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 d-flex gap-2">
                        <div class="col-lg-6">
                            <input type="number" class="form-control rounded-0" id="c_postal" name="c_postal" placeholder="Codigo postal" required>
                            <div class="invalid-feedback">
                                Campo obligatorio
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <input type="number" class="form-control rounded-0" id="telefono" name="telefono" placeholder="Telefono" required>
                            <div class="invalid-feedback">
                                Campo obligatorio
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success rounded-0 w-100">Hacer pedido</button>
                </form>
            </div>
        </div>
    </div>

    <?php
        include('../../includes/footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="../../validation-bootstrap.js"></script>
</body>
</html>
<?php
            }else{
                header("Location: index.php");
            }
        }else{
            header("Location: ../../index.php");
        }
    }else{
        header("Location: ../../login.php");
    }
?>