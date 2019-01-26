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
    </div>

    <!-- MODAL AGREGAR PRODUCTO -->
    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Agregar un producto</h4>
            <p>Rellenar el campo</p>
            <div class="row">
                <form action="<?php echo RUTA_URL?>/productos/agregar" method="POST" class="col s12" name="addCategoria">
                    
                    <div class="input-field col s12 m6">
                        <input id="producto" type="text" class="validate" name="producto">
                        <label for="producto">Producto</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="categoria">
                            <option value="" disabled selected>Elije una opción</option>
                            <?php foreach($datos['categorias'] as $categoria): ?>
                            <option value="<?php echo $categoria->id;?>"><?php echo $categoria->categoria;?></option>
                            <?php endforeach;?>
                        </select>
                        <label>Categoría</label>
                    </div>

                    <div class="input-field col s12 m12">
                        <input id="descripcion" type="text" class="validate" name="descripcion">
                        <label for="descripcion">Descripcion</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="precio" type="text" class="validate" name="precio">
                        <label for="precio">Precio</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input id="cantidad" type="text" class="validate" name="cantidad">
                        <label for="cantidad">Cantidad</label>
                    </div>

                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light" name="action" onclick="addCategoria.submit()">Agregar</button>
            <button class="btn waves-effect waves-light modal-close red">Cancelar</button>
        </div>
    </div>

    <!-- TABLA DE PRODUCTOS -->
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
                <td>$<?php echo $producto->precio; ?></td>
                <td><?php echo $producto->cantidad; ?></td>
                <td class="hide"><?php echo $producto->id; ?></td>
                <td class="col-edit"><a class="waves-effect waves-light btn blue  modal-trigger btn-editar-producto" href="#modal2"><i class="material-icons">edit</i></a></td>
                <td class="col-borrar"><a class="waves-effect waves-light btn red modal-trigger btn-borrar-producto" href="#modal3"><i class="material-icons">delete</i></a></td>
            </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr>
                <td colspan="7">No hay productos registrados</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- PAGINACIÓN -->
    <div class="paginacion-container">
        <ul class="pagination">
            <?php if($datos['pagina'] == 1): ?>
                <li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>
            <?php else:?>
                <li class=""><a href="<?php echo RUTA_URL?>/productos/pagina/<?php echo $datos['pagina'] - 1; ?>"><i class="material-icons">chevron_left</i></a></li>
            <?php endif;?>

                <?php for($i = 1; $i <= $datos['total_paginas']; $i++){?>
                    <?php if($datos['pagina'] == $i):?>
                        <li class='waves-effect active teal lighten-1'><a href="<?php echo RUTA_URL?>/clientes/pagina/<?php echo $i; ?>"><?php echo $i?></a></li>
                    <?php else:?>
                            <li class='waves-effect'><a href="<?php echo RUTA_URL?>/productos/pagina/<?php echo $i; ?>"><?php echo $i?></a></li>
                    <?php endif; ?>
                <?php };?>

            <?php if($datos['pagina'] == $datos['total_paginas']): ?>
                <li class="waves-effect disabled"><a><i class="material-icons">chevron_right</i></a></li>
            <?php else:?>
                <li class="waves-effect"><a href="<?php echo RUTA_URL?>/productos/pagina/<?php echo $datos['pagina'] + 1; ?>"><i class="material-icons">chevron_right</i></a></li>
            <?php endif;?>
        </ul>
    </div>

</div>