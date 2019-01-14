<?php
    //Cargar todas las librerias
    require_once 'config/Configurar.php';
    require_once 'helpers/url_helper.php';
    //Autoload
    //Cargamos todas las clases dentro de la carpeta "librerias/"

    spl_autoload_register(function($nombreClase){
        require_once 'librerias/'. $nombreClase.'.php';
    });
    //NOTA: el nombre dentro de la clase debe conrresponder con el nombre del archivo