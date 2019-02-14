<div class="container">
    <h3>DASHBOARD</h3>
    <h4>Bienvenido <span class="teal-text text-lighten-1"><?php echo $datos['usuario'];?></span></h4>
    <div class="row box-contenedor">
        <div class="box card-panel">
            <div class="teal accent-4 box-icon">
                <i class="medium material-icons">attach_money</i>
                <p>Ventas Mensuales</p>
            </div>
            <div class="box-icon">
                <p><?php echo round($datos['ventas'],2);?></p>
            </div>
        </div>
        <div class="box card-panel">
            <div class="teal accent-4 box-icon">
                <i class="medium material-icons">event_note</i>
                <p>Categorias</p>
            </div>
            <div class="box-icon">
                <p><?php echo $datos['categorias'];?></p>
            </div>
        </div>
        <div class="box card-panel">
            <div class="teal accent-4 box-icon">
                <i class="medium material-icons">group</i>
                <p>Clientes</p>
            </div>
            <div class="box-icon">
                <p><?php echo $datos['clientes'];?></p>
            </div>
        </div>
        <div class="box card-panel">
            <div class="teal accent-4 box-icon">
                <i class="medium material-icons">local_grocery_store</i>
                <p>Productos</p>
            </div>
            <div class="box-icon">
                <p><?php echo $datos['productos'];?></p>
            </div>
        </div>
    </div>
    <div class="avisos">
        <h4>Avisos</h4>
        <p>Productos por agotarse</p>
        
      <table class="white tabla-avisos z-depth-2">
        <thead>
          <tr>
              <th>Producto</th>
              <th>Categoria</th>
              <th>Cantidad</th>
          </tr>
        </thead>

        <tbody>
        <?php if(!empty($datos['agotados'])):?>
            <?php foreach($datos['agotados'] as $agotado):?>
            <tr>
                <td><?php echo $agotado->producto;?></td>
                <td><?php echo $agotado->categoria;?></td>
                <td>
                    <?php if($agotado->cantidad == 0 ){
                      echo "<span class='new badge red' data-badge-caption='Agotado'></span>";
                    } else {
                      echo $agotado->cantidad;
                    }
                    ?>
                </td>
            </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr>
                <td>
                    Sin productos
                </td>
            </tr>
        <?php endif;?>
        </tbody>
      </table>
    </div>
</div>

