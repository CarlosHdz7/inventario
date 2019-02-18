<div class="container">
    <h3>Perfil</h3>
    <div class="row card-panel profile-info-container">
        <div class="col s12 m2">
            <img src="<?php echo RUTA_URL?>/public/img/profile.png" alt="" class="circle responsive-img profile-img"> <!-- notice the "circle" class -->
        </div>
        <div class="col s12 m10">
            <p class="profile-info-username"><?php echo $datos['usuario'];?></p>
            <p class="profile-info-rol">Rol:</p><p class="badge-rol">Admin</p>
        </div>
    </div>

    <div class="row card-panel">
        <div class="col s12">
            <p>Datos</p>
        </div>
    </div>
</div>