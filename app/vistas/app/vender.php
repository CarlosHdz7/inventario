<div class="container">
    <h4>Agregar producto</h4>
    <div class="row">
        <div class="col s12 m6">
            <form id="form-agregar-producto" action="<?php echo RUTA_URL?>/productos/" class="row white tabla-agregar-producto z-depth-2">
                <div class="input-field col s12">
                    <select id="select-clientes">
                        <option value="" disabled selected>Seleccione un cliente</option>
                        <?php foreach($datos['clientes'] as $cliente): ?>
                            <option value="<?php echo $cliente->id?>"><?php echo $cliente->cliente; ?></option>
                        <?php endforeach;?>
                    </select>
                    <label>Cliente</label>
                </div>

                <div class="input-field col s12">
                    <select id="select-categorias" onchange="cargar_productos()">
                        <option value="" disabled selected>Seleccione una categoria</option>
                        <?php foreach($datos['categorias'] as $categoria): ?>
                            <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->categoria; ?></option>
                        <?php endforeach;?>                    
                    </select>
                    <label>Categoria</label>
                </div>

                <div class="input-field col s12">
                    <select id="select-productos" onchange="cargar_cantidad_range()">
                        <option value="" disabled selected>Seleccione un producto</option> 
                    </select>
                    <label>Producto</label>
                </div>

                <div class="input-field col s12">
                    <p>Cantidad</p>
                    <p class="range-field">
                        <input type="range" id="rango-cantidad" min="0" max="0" name="cantidad" value=""/>
                    </p>
                </div>

                <div class="col s12">
                    <a class="waves-effect waves-light btn agregar-venta">Agregar</a>
                    <a class="waves-effect waves-light btn red">Vaciar</a>
                </div>          
            </form>
        </div>

        <div class="col s12 m6">
            <h4>Carrito<i class="material-icons">shopping_cart</i></h4>
            <table class="card striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th class="col-borrar">Quitar</th>
                </tr>
                </thead>

                <tbody>
<!--                 <tr>
                    <td>Detergente</td>
                    <td>$10</td>
                    <td>2</td>
                    <td><a class="waves-effect waves-light btn red"><i class="material-icons">delete</i></a></td>
                </tr> -->
                <tr>
                    <td colspan="4">
                        Total
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>