<div class="container">
    <h4>Clientes</h4>
    <?php
        if(!empty($mensaje)){
            echo "<p class='error-mensaje pink accent-3 pink-text text-lighten-5'>".$mensaje['mensaje']."</p>";
        }
    ?>

<!--     <nav class="white">
        <div class="nav-wrapper">
        <form>
            <div class="input-field">
            <input id="search" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
            <i class="material-icons">close</i>
            </div>
        </form>
        </div>
    </nav> -->

    <!-- BOTONES PRINCIPALES -->
    <div class="btn-container">
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons left">add</i>Agregar</a>
        <a class="waves-effect waves-light btn"><i class="material-icons left">find_in_page</i>Filtrar</a>
        <a class="waves-effect waves-light btn"><i class="material-icons left">print</i>Imprimir</a>
    </div>

    <!-- MODAL AGREGAR CLIENTE -->
    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Agregar un cliente</h4>
            <p>Rellenar todos los campos</p>
            <div class="row">
                <form action="<?php echo RUTA_URL?>/clientes/agregar" method="POST" class="col s12" name="addClientes">
                    <div class="input-field col s12 m6">
                        <input id="cliente" type="text" class="validate" name="cliente">
                        <label for="cliente">Cliente</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="email" type="email" class="validate" name="email">
                        <label for="email">email</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="direccion" type="text" class="validate" name="direccion">
                        <label for="direccion">Direccion</label>
                    </div>                    
                    <div class="input-field col s12 m6">
                        <input id="telefono" type="text" class="validate" name="telefono">
                        <label for="telefono">Telefono</label>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light" name="action" onclick="addClientes.submit()">Agregar</button>
            <button class="btn waves-effect waves-light modal-close red">Cancelar</button>
        </div>
    </div>

    <!-- MODAL EDITAR CLIENTE -->
    <div id="modal2" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Editar un cliente</h4>
            <div class="row">
                <form action="<?php echo RUTA_URL?>/clientes/editar" method="POST" class="col s12" name="editClientes">
                    <div class="input-field col s12 m6">
                        <input id="cliente" placeholder="Cliente" type="text" class="validate edit-cliente" name="cliente">
                        <label for="cliente">Cliente</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="email" placeholder="Email" type="email" class="validate edit-email" name="email">
                        <label for="email">email</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="direccion" placeholder="Dirección" type="text" class="validate edit-direccion" name="direccion">
                        <label for="direccion">Direccion</label>
                    </div>                    
                    <div class="input-field col s12 m6">
                        <input id="telefono" placeholder="Teléfono" type="text" class="validate edit-telefono" name="telefono">
                        <label for="telefono">Telefono</label>
                    </div>
                    <input class="validate edit-id" type="hidden" name="id">
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light" name="action" onclick="editClientes.submit()">Editar</button>
            <button class="btn waves-effect waves-light modal-close red">Cancelar</button>
        </div>
    </div>

    <!-- MODAL BORRAR CLIENTE -->
    <div id="modal3" class="modal">
        <div class="modal-content">
        <h4>¿Desea eliminar el siguiente cliente?</h4>
        <p class="nombre-cliente">Cliente</p>
        </div>
        <div class="modal-footer">
            <a href="<?php echo RUTA_URL?>/clientes/borrar/" class="btn modal-close waves-effect waves-light btn-aceptar-borrar">Aceptar</a>
            <a class="btn modal-close waves-effect waves-light  red">Cancelar</a>
        </div>
    </div>      
        
    <!-- TABLA DE CLIENTES -->
    <table class="white striped card-panel tabla-clientes responsive-table">
        <thead>
          <tr>
              <th>Cliente</th>
              <th>Dirección</th>
              <th>Telefono</th>
              <th>email</th>
              <th>Editar</th>
              <th>Borrar</th>
          </tr>
        </thead>

        <tbody>
        <?php if(!empty($datos['clientes'])): ?>
            <?php foreach($datos['clientes'] as $cliente): ?>
            <tr>
                <td><?php echo $cliente->cliente; ?></td>
                <td><?php echo $cliente->direccion; ?></td>
                <td><?php echo $cliente->telefono; ?></td>
                <td><?php echo $cliente->email; ?></td>
                <td class="hide"><?php echo $cliente->id; ?></td>
                <td><a class="waves-effect waves-light btn blue  modal-trigger btn-editar-cliente" href="#modal2"><i class="material-icons">edit</i></a></td>
                <td><a class="waves-effect waves-light btn red modal-trigger btn-borrar-cliente" href="#modal3"><i class="material-icons">delete</i></a></td>
            </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr>
                <td>No hay clientes registrados</td>
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
                <li class=""><a href="<?php echo RUTA_URL?>/clientes/pagina/<?php echo $datos['pagina'] - 1; ?>"><i class="material-icons">chevron_left</i></a></li>
            <?php endif;?>

                <?php for($i = 1; $i <= $datos['total_paginas']; $i++){?>
                    <?php if($datos['pagina'] == $i):?>
                        <li class='waves-effect active teal lighten-1'><a href="<?php echo RUTA_URL?>/clientes/pagina/<?php echo $i; ?>"><?php echo $i?></a></li>
                    <?php else:?>
                            <li class='waves-effect'><a href="<?php echo RUTA_URL?>/clientes/pagina/<?php echo $i; ?>"><?php echo $i?></a></li>
                    <?php endif; ?>
                <?php };?>

            <?php if($datos['pagina'] == $datos['total_paginas']): ?>
                <li class="waves-effect disabled"><a><i class="material-icons">chevron_right</i></a></li>
            <?php else:?>
                <li class="waves-effect"><a href="<?php echo RUTA_URL?>/clientes/pagina/<?php echo $datos['pagina'] + 1; ?>"><i class="material-icons">chevron_right</i></a></li>
            <?php endif;?>
        </ul>
    </div>

</div>