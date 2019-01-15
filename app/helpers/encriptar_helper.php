<?php
    //Encriptar
    function encriptar( $password ){
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }

    function verificar_hash( $password1,$password2 ){
        return password_verify( $password1,$password2 );
    }