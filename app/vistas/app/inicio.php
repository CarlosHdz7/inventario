<div class="container">
    <h4>Resumen</h4>
    <div class="row box-contenedor">
        <div class="box card-panel">
            <div class="teal accent-4 box-icon">
                <i class="medium material-icons">attach_money</i>
                <p>Ventas</p>
            </div>
            <div class="box-icon">
                <p>$235.00</p>
            </div>
        </div>
        <div class="box card-panel">
            <div class="teal accent-4 box-icon">
                <i class="medium material-icons">event_note</i>
                <p>Categorias</p>
            </div>
            <div class="box-icon">
                <p><?php echo $datos['categorias'];?></p>
            </div>
        </div>
        <div class="box card-panel">
            <div class="teal accent-4 box-icon">
                <i class="medium material-icons">group</i>
                <p>Clientes</p>
            </div>
            <div class="box-icon">
                <p><?php echo $datos['clientes'];?></p>
            </div>
        </div>
        <div class="box card-panel">
            <div class="teal accent-4 box-icon">
                <i class="medium material-icons">local_grocery_store</i>
                <p>Productos</p>
            </div>
            <div class="box-icon">
                <p><?php echo $datos['productos'];?></p>
            </div>
        </div>
    </div>
</div>

