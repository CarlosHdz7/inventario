<div class="container">
    <h4>Productos</h4>
    <?php
        if(!empty($mensaje)){
            echo "<p class='error-mensaje pink accent-3 pink-text text-lighten-5'>".$mensaje['mensaje']."</p>";
        }
    ?>

    <!-- BOTONES PRINCIPALES -->
    <div class="btn-container">
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons left">add</i>Agregar</a>
        <a class="waves-effect waves-light btn"><i class="material-icons left">find_in_page</i>Filtrar</a>
        <a class="waves-effect waves-light btn"><i class="material-icons left">print</i>Imprimir</a>
    </div>

    <!-- TABLA DE CLIENTES -->
    <table class="white striped card-panel tabla-clientes responsive-table z-depth-3">
        <thead>
          <tr>
              <th>Producto</th>
              <th>Descripción</th>
              <th>Categoria</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Editar</th>
              <th>Borrar</th>
          </tr>
        </thead>

        <tbody>
        <?php if(!empty($datos['productos'])): ?>
            <?php foreach($datos['productos'] as $producto): ?>
            <tr>
                <td><?php echo $producto->producto; ?></td>
                <td><?php echo $producto->descripcion; ?></td>
                <td><?php echo $producto->categoria; ?></td>
                <td><?php echo $producto->precio; ?></td>
                <td><?php echo $producto->cantidad; ?></td>
                <td class="hide"><?php echo $producto->id; ?></td>
                <td class="col-edit"><a class="waves-effect waves-light btn blue  modal-trigger btn-editar-producto" href="#modal2"><i class="material-icons">edit</i></a></td>
                <td class="col-borrar"><a class="waves-effect waves-light btn red modal-trigger btn-borrar-producto" href="#modal3"><i class="material-icons">delete</i></a></td>
            </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr>
                <td>No hay productos registrados</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

</div>