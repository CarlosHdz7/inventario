<div class="container">
    <h3>Perfil</h3>
    <div class="row card-panel profile-info-container">
        <div class="col s12 m2">
            <img src="<?php echo RUTA_URL?>/public/img/profile.png" alt="" class="circle responsive-img profile-img"> <!-- notice the "circle" class -->
        </div>
        <div class="col s12 m10">
            <p class="profile-info-username"><?php echo $datos['info']['usuario'];?></p>

            <?php if($datos['info']['rol'] == "Admin"):?>
                <p class="profile-info-rol">Rol:</p><p class="badge-rol red white-text"><?php echo $datos['info']['rol'];?></p>
            <?php else:?>
                <p class="profile-info-rol">Rol:</p><p class="badge-rol blue white-text"><?php echo $datos['info']['rol'];?></p>
            <?php endif;?>
        </div>
    </div>

    <div class="row card-panel profile-datos">
        <div class="col s12">
            <p class="bold">Datos</p>
            <p>Nombre: <span><?php echo $datos['info']['nombre'];?></span></p>
            <p>Apellido: <span><?php echo $datos['info']['apellido'];?></span></p>
            <p>Correo Electronico: <span><?php echo $datos['info']['email'];?></span></p>
        </div>
    </div>

    <div class="row estadisticas-datos card-panel">
        <div class="col s12 m6">
            <p class="bold">Estadisticas</p>
            <p>Ventas realizadas: 251</p>
            <p>Total vendido: $1235.25</p>
        </div>

        <div class="col s12 m6">
            <p class="bold">Contraseña</p>
            <a href="#" class="waves-effect waves-light btn" disabled>Cambiar</a>
        </div>
    </div>


</div>