<div class="container">
    <h4>Vender</h4>
    <div class="row">
        <div class="col s12 m6">
            <form action="" class="row white tabla-agregar-producto z-depth-2">
                <div class="input-field col s12">
                    <select>
                    <option value="" disabled selected>Seleccione un cliente</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    </select>
                    <label>Cliente</label>
                </div>

                <div class="input-field col s12">
                    <select>
                    <option value="" disabled selected>Seleccione una categoria</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    </select>
                    <label>Categoria</label>
                </div>

                <div class="input-field col s12">
                    <select>
                    <option value="" disabled selected>Seleccione un producto</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    </select>
                    <label>Producto</label>
                </div>

                <div class="input-field col s12">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                    <label for="first_name">Cantidad</label>
                </div>

                <div class="col s12">
                    <a class="waves-effect waves-light btn">Agregar</a>
                    <a class="waves-effect waves-light btn red">Vaciar</a>
                </div>          
            </form>
        </div>
        <div class="col s12 m6">
            <p>Productos</p>
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
                <tr>
                    <td>Detergente</td>
                    <td>$10</td>
                    <td>2</td>
                    <td><a class="waves-effect waves-light btn red"><i class="material-icons">delete</i></a></td>
                </tr>
                <tr>
                    <td>Cuaderno</td>
                    <td>$8</td>
                    <td>$0.87</td>
                    <td><a class="waves-effect waves-light btn red"><i class="material-icons">delete</i></a></td>
                </tr>
                <tr>
                    <td>Coca cola</td>
                    <td>$12</td>
                    <td>$0.87</td>
                    <td><a class="waves-effect waves-light btn red"><i class="material-icons">delete</i></a></td>
                </tr>
                <tr>
                    <td colspan="3">
                        Total
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>