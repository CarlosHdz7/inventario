<div class="container">
    <div class="row form-registrar">
        <form action="<?php echo RUTA_URL?>/paginaweb/registrar_usuario" method="POST" class="col s6 m6 offset-m3 card">
            <div class="row card-content">
                <span class="card-title">Registrarse</span>
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
                    <input id="email" type="email"  class="validate" name="email">
                    <label for="email">Email</label>
                </div>

                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="pass">
                    <label for="password">Contraseña</label>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <?php
                if(!empty($datos)){
                    echo "<p class='error-mensaje pink accent-3 pink-text text-lighten-5'>".$datos['error']."</p>";
                }
            ?>
        </form>
    </div>
</div>