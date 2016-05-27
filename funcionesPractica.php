<?php

function validarUsuario($datosUsuario){
    
    $errores = [];
    
    if(trim($datosUsuario['name']) == ""){
        $errores[] = "Ingresar nombre usuario";
    }
    if(trim($datosUsuario['apellido']) == ""){
        $errores[] = "Ingresar apellido";
    }
    if(trim($datosUsuario['mail']) == ""){
        $errores[] = "Ingresar mail";
    }
    if(trim($datosUsuario['pass']) == ""){
        $errores[] = "Ingresar contraseña";
    }
    if((trim($datosUsuario['cpass']) == "") || ($datosUsuario['pass'] !== $datosUsuario['cpass'])){
        $errores[] = "Revisar contraseña";
    }
    return $errores;
}

//function crearUsuario($datosUsuario){
//    $usuario = [
//        'nombre' => $datosUsuario['nombre'],
//        'apellido' => $datosUsuario['apellido'],
//        'mail' => $datosUsuario['mail'],
//        'password' => password_hash($datosUsuario['pass'], PASSWORD_DEFAULT),
//        'id' => traerNuevoId()
//    ];
//}