<div class="container">
    <h4>Categorias</h4>
    <?php
        if(!empty($mensaje)){
            echo "<p class='error-mensaje pink accent-3 pink-text text-lighten-5'>".$mensaje['mensaje']."</p>";
        }
    ?>
        <!-- BOTONES PRINCIPALES -->
        <div class="btn-container">
            <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons left">add</i>Agregar</a>
        </div>

        <!-- MODAL AGREGAR CATEGORIA -->
        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Agregar una categoria</h4>
                <p>Rellenar el campo</p>
                <div class="row">
                    <form action="<?php echo RUTA_URL?>/categorias/agregar" method="POST" class="col s12" name="addCategoria">
                        <div class="input-field col s12 m6">
                            <input id="categoria" type="text" class="validate" name="categoria">
                            <label for="categoria">Categoria</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" name="action" onclick="addCategoria.submit()">Agregar</button>
                <button class="btn waves-effect waves-light modal-close red">Cancelar</button>
            </div>
        </div>

        <!-- MODAL EDITAR CATEGORIA -->
        <div id="modal2" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Editar un Categoria</h4>
                <div class="row">
                    <form action="<?php echo RUTA_URL?>/categorias/editar" method="POST" class="col s12" name="editCategoria">
                        <div class="input-field col s12 m6">
                            <input id="categoria" placeholder="categoria" type="text" class="validate edit-categoria" name="categoria">
                            <label for="categoria">Cliente</label>
                        </div>
                        <input class="validate edit-id" type="hidden" name="id">
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" name="action" onclick="editCategoria.submit()">Editar</button>
                <button class="btn waves-effect waves-light modal-close red">Cancelar</button>
            </div>
        </div>

        <!-- MODAL BORRAR CATEGORIA -->
        <div id="modal3" class="modal">
            <div class="modal-content">
            <h4>¿Desea eliminar el siguiente categoria?</h4>
            <p class="nombre-categoria">Cliente</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo RUTA_URL?>/categorias/borrar/" class="btn modal-close waves-effect waves-light btn-aceptar-borrar">Aceptar</a>
                <a class="btn modal-close waves-effect waves-light  red">Cancelar</a>
            </div>
        </div> 

        <!-- TABLA DE CATEGORIA -->
        <table class="white striped card-panel tabla-categorias responsive-table z-depth-3">
            <thead>
            <tr>
                <th>categoria</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
            </thead>

            <tbody>
            <?php if(!empty($datos['categorias'])): ?>
                <?php foreach($datos['categorias'] as $categoria): ?>
                <tr>
                    <td><?php echo $categoria->categoria; ?></td>
                    <td class="hide"><?php echo $categoria->id; ?></td>
                    <td class="col-edit"><a class="waves-effect waves-light btn blue  modal-trigger btn-editar-categoria" href="#modal2"><i class="material-icons">edit</i></a></td>
                    <td class="col-borrar"><a class="waves-effect waves-light btn red modal-trigger btn-borrar-categoria" href="#modal3"><i class="material-icons">delete</i></a></td>
                </tr>
                <?php endforeach;?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No hay categorias registradas</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

    <?php if(!empty($datos['categorias'])): ?>

        <!-- PAGINACIÓN -->
        <div class="paginacion-container">
            <ul class="pagination">
                <?php if($datos['pagina'] == 1): ?>
                    <li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>
                <?php else:?>
                    <li class=""><a href="<?php echo RUTA_URL?>/categorias/pagina/<?php echo $datos['pagina'] - 1; ?>"><i class="material-icons">chevron_left</i></a></li>
                <?php endif;?>

                    <?php for($i = 1; $i <= $datos['total_paginas']; $i++){?>
                        <?php if($datos['pagina'] == $i):?>
                            <li class='waves-effect active teal lighten-1'><a href="<?php echo RUTA_URL?>/caregorias/pagina/<?php echo $i; ?>"><?php echo $i?></a></li>
                        <?php else:?>
                                <li class='waves-effect'><a href="<?php echo RUTA_URL?>/categorias/pagina/<?php echo $i; ?>"><?php echo $i?></a></li>
                        <?php endif; ?>
                    <?php };?>

                <?php if($datos['pagina'] == $datos['total_paginas']): ?>
                    <li class="waves-effect disabled"><a><i class="material-icons">chevron_right</i></a></li>
                <?php else:?>
                    <li class="waves-effect"><a href="<?php echo RUTA_URL?>/categorias/pagina/<?php echo $datos['pagina'] + 1; ?>"><i class="material-icons">chevron_right</i></a></li>
                <?php endif;?>
            </ul>
        </div>

    <?php endif; ?>
</div>