<div class="container">
    <h4>Clientes</h4>
    <?php
        if(!empty($datos)){
            echo "<p class='error-mensaje pink accent-3 pink-text text-lighten-5'>".$datos['mensaje']."</p>";
            
        }
    ?>


    <nav class="white">
        <div class="nav-wrapper">
        <form>
            <div class="input-field">
            <input id="search" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
            <i class="material-icons">close</i>
            </div>
        </form>
        </div>
    </nav>

    <div class="btn-container">
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons left">add</i>Agregar</a>
        <a class="waves-effect waves-light btn"><i class="material-icons left">find_in_page</i>Filtrar</a>
        <a class="waves-effect waves-light btn"><i class="material-icons left">print</i>Imprimir</a>
    </div>

      <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Agregar un cliente</h4>
            <p>Rellenar todos los campos</p>
            <div class="row">
                <form action="<?php echo RUTA_URL?>/clientes/agregar" method="POST" class="col s12">
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
                    <button class="btn waves-effect waves-light" type="submit" name="action">Agregar</button>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light" type="submit" name="action">Agregar</button>
            <button class="btn waves-effect waves-light modal-close red">Cancelar</button>
        </div>
    </div>
          
        
    <table class="white highlight card-panel tabla-clientes responsive-table">
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
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
            <td>2285-7854</td>
            <td><a class="waves-effect waves-light btn blue"><i class="material-icons">edit</i></a></td>
            <td><a class="waves-effect waves-light btn red"><i class="material-icons">delete</i></a></td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
            <td>2260-4563</td>
            <td><a class="waves-effect waves-light btn blue"><i class="material-icons">edit</i></a></td>
            <td><a class="waves-effect waves-light btn red"><i class="material-icons">delete</i></a></td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
            <td>2290-1064</td>
            <td><a class="waves-effect waves-light btn blue"><i class="material-icons">edit</i></a></td>
            <td><a class="waves-effect waves-light btn red"><i class="material-icons">delete</i></a></td>
          </tr>
        </tbody>
    </table>

    <div class="paginacion">
        <a class="waves-effect waves-light btn"><i class="material-icons">arrow_back</i></a>
        <a class="waves-effect waves-light btn"><i class="material-icons">arrow_forward</i></a>
    </div>

</div>