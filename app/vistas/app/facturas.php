<div class="container">
    <h4>Facturas</h4>

    <!-- TABLA DE FACTURAS -->
    <table class="white striped card-panel tabla-clientes responsive-table z-depth-3">
        <thead>
          <tr>
              <th>Folio</th>
              <th>Cliente</th>
              <th>Productos</th>
              <th>Total</th>
              <th>Fecha</th>
              <th>Factura</th>
          </tr>
        </thead>

        <tbody>
        <?php if(!empty($datos['facturas'])): ?>
            <?php foreach($datos['facturas'] as $factura): ?>
                <tr>
                    <td><?php echo $factura->id; ?></td>
                    <td><?php echo $factura->cliente; ?></td>
                    <td><?php echo str_replace('-',' ',$factura->productos_vendidos); ?></td>
                    <td><?php echo $factura->total_vendido; ?></td>
                    <td><?php echo $factura->fecha_registro; ?></td>
                    <td><a class="waves-effect waves-light btn red  modal-trigger btn-editar-cliente" href="#modal2" disabled>Imprimir<i class="material-icons right">print</i></a></td>
                </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr>
                <td colspan="6">No hay facturas registradas</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <?php if(!empty($datos['facturas'])): ?>
        <!-- PAGINACIÓN -->
        <div class="paginacion-container">
            <ul class="pagination">
                <?php if($datos['pagina'] == 1): ?>
                    <li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>
                <?php else:?>
                    <li class=""><a href="<?php echo RUTA_URL?>/facturas/pagina/<?php echo $datos['pagina'] - 1; ?>"><i class="material-icons">chevron_left</i></a></li>
                <?php endif;?>

                    <?php for($i = 1; $i <= $datos['total_paginas']; $i++){?>
                        <?php if($datos['pagina'] == $i):?>
                            <li class='waves-effect active teal lighten-1'><a href="<?php echo RUTA_URL?>/facturas/pagina/<?php echo $i; ?>"><?php echo $i?></a></li>
                        <?php else:?>
                                <li class='waves-effect'><a href="<?php echo RUTA_URL?>/facturas/pagina/<?php echo $i; ?>"><?php echo $i?></a></li>
                        <?php endif; ?>
                    <?php };?>

                <?php if($datos['pagina'] == $datos['total_paginas']): ?>
                    <li class="waves-effect disabled"><a><i class="material-icons">chevron_right</i></a></li>
                <?php else:?>
                    <li class="waves-effect"><a href="<?php echo RUTA_URL?>/facturas/pagina/<?php echo $datos['pagina'] + 1; ?>"><i class="material-icons">chevron_right</i></a></li>
                <?php endif;?>
            </ul>
        </div>
    <?php endif; ?>
</div>