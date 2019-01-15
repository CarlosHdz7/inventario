<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/styles.css"></link>

    
    <title><?php echo NOMBRE_SITIO; ?></title>
</head>
<body>
    
    <nav class="blue-grey darken-4">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo">Logo</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?php echo RUTA_URL?>/paginaweb/inicio" class="btn-inicio">Inicio</a></li>
                <li><a href="<?php echo RUTA_URL?>/paginaweb/registrar" class="btn-registrar">Registrar</a></li>
                <li><a href="<?php echo RUTA_URL?>/paginaweb/entrar" class="btn-entrar">Entrar</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="#" class="btn-inicio">Inicio</a></li>
        <li><a href="#" class="btn-registrar">Registrar</a></li>
        <li><a href="#" class="btn-entrar">Entrar</a></li>
    </ul>




