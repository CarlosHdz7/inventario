<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/styles2.css">
    
    <title><?php echo NOMBRE_SITIO; ?></title>
    <title>Document</title>
</head>
<body>
    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#!"><i class="material-icons left">beach_access</i>Articulos</a></li>
        <li><a href="#!"><i class="material-icons left">dashboard</i>Categorias </a></li>
    </ul>

    <!-- Dropdown Structure -->
    <ul id="dropdown2" class="dropdown-content">
        <li><a href="#!"><i class="material-icons left">beach_access</i>Articulos</a></li>
        <li><a href="#!"><i class="material-icons left">dashboard</i>Categorias </a></li>
    </ul>
    <!-- Navbar -->
    <nav class="blue-grey darken-4">
        <div class="nav-wrapper container">
        <a href="#!" class="brand-logo">Logo</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#"><i class="material-icons left">home</i>Inicio</a></li>
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Administrar<i class="material-icons right">arrow_drop_down</i></a></li> 
                <li><a href="#"><i class="material-icons left">people</i>Clientes</a></li>
                <li><a href="#"><i class="material-icons left">attach_money</i>Vender</a></li>
                <li><a href="#"><i class="material-icons left">exit_to_app</i>Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="#"><i class="material-icons left">home</i>Inicio</a></li>
        <!-- Dropdown Trigger -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons">home</i>Administrar<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="#"><i class="material-icons left">people</i>Clientes</a></li>
        <li><a href="#"><i class="material-icons left">attach_money</i>Vender</a></li>
        <li><a href="#"><i class="material-icons left">exit_to_app</i>Cerrar sesión</a></li>
    </ul>

    <div class="container">
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
                    <i class="medium material-icons">business_center</i>
                    <p>Total</p>
                </div>
                <div class="box-icon">
                    <p>$235.00</p>
                </div>
            </div>
            <div class="box card-panel">
                <div class="teal accent-4 box-icon">
                    <i class="medium material-icons">group</i>
                    <p>Clientes</p>
                </div>
                <div class="box-icon">
                    <p>1435</p>
                </div>
            </div>
            <div class="box card-panel">
                <div class="teal accent-4 box-icon">
                    <i class="medium material-icons">local_grocery_store</i>
                    <p>Productos</p>
                </div>
                <div class="box-icon">
                    <p>125</p>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons blue-grey darken-4">add</i>
        </a>
        <ul>
            <li><a class="btn-floating teal accent-4"><i class="material-icons">insert_chart</i></a></li>
            <li><a class="btn-floating teal accent-4"><i class="material-icons">format_quote</i></a></li>
            <li><a class="btn-floating teal accent-4"><i class="material-icons">publish</i></a></li>
            <li><a class="btn-floating teal accent-4"><i class="material-icons">attach_file</i></a></li>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="<?php echo RUTA_URL?>/js/main.js"></script>
</body>
</html>