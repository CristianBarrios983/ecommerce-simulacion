
<!-- Modal -->
<div class="modal fade " id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Mi carrito</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Cuerpo del modal -->
      <div class="modal-body">
        <div>
          <div class="p-2">
            <ul class="list-group mb-3 rounded-0">

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
                  <div class="col-6 p-0"><h6 class="my-0"><?php echo $mi_carrito[$i]['producto']; ?> | Cantidad: <?php echo $mi_carrito[$i]['cantidad']; ?></h6></div>
                  <span class="text-muted" style="text-align: right;">$ <?php echo $mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']; ?></span>

                </div>
              </li>
              <?php
                $total=$total + ($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']);
                }
                }
                }
                }else{
                  echo '<p class="text-center text-muted">No hay productos</p>';
                }
              ?>

              <?php
                if(!empty($_SESSION['carrito'])){
              ?>
              <div class="list-group-item d-flex justify-content-between">
                <span class="fw-bold">Total:</span>
                <span class="fw-bold">$
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
                </span>
              </div>
              <?php
                }
              ?>

            </ul>
          </div>
        </div>  
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger rounded-0" data-bs-dismiss="modal">Cerrar</button>
        <?php
            if(!empty($_SESSION['carrito'])){
        ?>
        <a type="button" href="/pagina-productos/modulos/carrito/vaciarCarrito.php" class="btn btn-primary rounded-0">Vaciar</a>
        <a type="button" href="/pagina-productos/modulos/pedidos/index.php" class="btn btn-success rounded-0">Continuar pedido</a>
        <?php
            }
        ?>
      </div>
    </div>
  </div>
</div>