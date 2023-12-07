
<!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Mi carrito</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Cuerpo del modal -->
      <div class="modal-body">
        <div>
          <div class="p-2">
            <ul class="list-group mb-3">

            <?php
              if(isset($_SESSION['carrito']) && !(empty($_SESSION['carrito']))){
                $total=0;
                for($i=0;$i<=count($mi_carrito)-1;$i++){
                  if(isset($mi_carrito[$i])){
                  if($mi_carrito[$i]!=NULL){
            ?>

              <li class="list-group-item d-flex justify-content-between">
                <div class="row col-12">

                  <div class="col-lg-6">
                    <img src="<?php echo $mi_carrito[$i]['imagen']; ?>" alt="" style="max-width: 100px;">
                  </div>
                  <div class="col-6 p-0"><h6 class="my-0">Cantidad: <?php echo $mi_carrito[$i]['cantidad'] ?> : <?php echo $mi_carrito[$i]['producto']; ?> </h6></div>
                  <div class="col-5 p-0" style="text-align: right; color:#000000"></div>
                  <span class="text-muted" style="text-align: right; color:#000000">$ <?php echo $mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']; ?></span>

                </div>
              </li>
              <?php
                $total=$total + ($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']);
                }
                }
                }
                }else{
                  echo '<p class="text-center">No hay productos</p>';
                }
              ?>

              <?php
                if(!empty($_SESSION['carrito'])){
              ?>
              <div class="list-group-item d-flex justify-content-between">
                <span style="text-align: left; color:#000000;">Total (ARS)</span>
                <strong style="text-align: left; color:#000000;" >$
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
                </strong>
              </div>
              <?php
                }
              ?>

            </ul>
          </div>
        </div>  
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <?php
            if(!empty($_SESSION['carrito'])){
        ?>
        <a type="button" href="/pagina-productos/modulos/carrito/vaciarCarrito.php" class="btn btn-primary">Vaciar</a>
        <a type="button" href="/pagina-productos/modulos/pedidos/index.php" class="btn btn-success">Continuar pedido</a>
        <?php
            }
        ?>
      </div>
    </div>
  </div>
</div>