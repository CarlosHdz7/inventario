<div class="container">
    <div class="row form-entrar">
        <form action="<?php echo RUTA_URL?>/paginaweb/login_usuario" method="POST" class="col s6 m6 offset-m3 card">
            <div class="row card-content">
                <span class="card-title">Login</span>
                <div class="input-field col s12">
                    <input id="usuario" type="text" class="validate" name="usuario">
                    <label for="usuario">Usuario</label>
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
                    echo "<p class='exito-mensaje teal lighten-2 teal-text text-lighten-5'>".$datos['exito']."</p>";
                }
            ?>
        </form>
    </div>
</div>