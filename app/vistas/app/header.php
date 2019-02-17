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
    
    <title><?php echo $datos['titulo'];?></title>
</head>
<body>
    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="<?php echo RUTA_URL?>/productos/pagina/1"><i class="material-icons left">local_grocery_store</i>Productos</a></li>
        <li><a href="<?php echo RUTA_URL?>/categorias/pagina/1"><i class="material-icons left">dashboard</i>Categorias </a></li>
        <li><a href="<?php echo RUTA_URL?>/facturas/pagina/1"><i class="material-icons left">format_list_bulleted</i>Facturas </a></li>
    </ul>

    <!-- Dropdown Structure 2-->
    <ul id="dropdown2" class="dropdown-content">
        <li><a href="<?php echo RUTA_URL?>/productos/pagina/1"><i class="material-icons left">local_grocery_store</i>Productos</a></li>
        <li><a href="<?php echo RUTA_URL?>/categorias/pagina/1"><i class="material-icons left">dashboard</i>Categorias </a></li>
        <li><a href="<?php echo RUTA_URL?>/facturas/pagina/1"><i class="material-icons left">format_list_bulleted</i>Facturas </a></li>
    </ul>

    <!-- Dropdown Structure 3 -->
    <ul id="dropdown3" class="dropdown-content">
        <li><a href="<?php echo RUTA_URL?>/inicio/cerrar_sesion"><i class="material-icons left">exit_to_app</i>Salir</a></li>
    </ul>

    <!-- Navbar -->
    <div class="navbar-fixed">
        <nav class="blue-grey darken-4">
            <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Inventario</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="btn-inicio-nav" href="<?php echo RUTA_URL?>/app/inicio"><i class="material-icons left">home</i>Inicio</a></li>
                    <li><a class="btn-administrar-nav dropdown-trigger" href="#!" data-target="dropdown2">Administrar<i class="material-icons right">arrow_drop_down</i></a></li> 
                    <li><a class="btn-clientes-nav" href="<?php echo RUTA_URL?>/clientes/pagina/1"><i class="material-icons left">people</i>Clientes</a></li>
                    <li><a class="btn-vender-nav" href="<?php echo RUTA_URL?>/vender"><i class="material-icons left">attach_money</i>Vender</a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown3">Cerrar sesión<i class="material-icons right">arrow_drop_down</i></a></li> 
                </ul>
            </div>
        </nav>
    </div>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="<?php echo RUTA_URL?>/app/inicio"><i class="material-icons left">home</i>Inicio</a></li>
        <!-- Dropdown Trigger -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons">view_column</i>Administrar<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="<?php echo RUTA_URL?>/clientes/pagina/1"><i class="material-icons left">people</i>Clientes</a></li>
        <li><a href="<?php echo RUTA_URL?>/vender"><i class="material-icons left">attach_money</i>Vender</a></li>
        <li><a href="<?php echo RUTA_URL?>/inicio/cerrar_sesion"><i class="material-icons left">exit_to_app</i>Cerrar sesión</a></li>
    </ul>