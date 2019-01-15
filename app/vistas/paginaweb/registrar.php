<div class="container">

<?php

    if(!empty($datos)){
        foreach($datos as $dato){
            echo '<p>'.$dato.'</p>';
        }
    }
?>
    <div class="row form-registrar">
        <form action="<?php echo RUTA_URL?>/paginaweb/registrar_usuario" method="POST" class="col s6 m6 offset-m3 card">
            <div class="row card-content">

                <div class="input-field col s6">
                    <input id="nombre" type="text" class="validate" name="nombre">
                    <label for="nombre">Nombre</label>
                </div>

                <div class="input-field col s6">
                    <input id="apellido" type="text" class="validate" name="apellido">
                    <label for="apellido">Apellido</label>
                </div>

                <div class="input-field col s12">
                    <input id="usuario" type="text" class="validate" name="usuario">
                    <label for="usuario">Usuario</label>
                </div>

                <div class="input-field col s12">
                    <input id="email" type="text"  name="email">
                    <label for="email">Email</label>
                </div>

                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="pass">
                    <label for="password">Contraseña</label>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
</div>