<?php

function validarUsuario($datosUsuario){
    
    $errores = [];
    
    if(trim($datosUsuario['nombre']) == ""){
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

function crearUsuario($datosUsuario){
    $usuario = [
        'nombre' => $datosUsuario['nombre'],
        'apellido' => $datosUsuario['apellido'],
        'mail' => $datosUsuario['mail'],
        'password' => password_hash($datosUsuario['pass'], PASSWORD_DEFAULT),
        'id' => traerNuevoId()
    ];
    return $usuario;
}

function guardarUsuario($nuevoUsuario){  
    $usuarioJSON = json_decode($nuevoUsuario);
    file_put_contents('repositorioUsuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND);
}

function traerNuevoId(){
    
    if(!file_exists('repositorioUsuarios.json')){
        return 1;
    }else{
        $usuariosJSON = file_get_contents('repositorioUsuarios.json');
        $arrayUsuariosJSON = explode(PHP_EOL, $usuariosJSON);
        $arrayLength = count($arrayUsuariosJSON);        
        $ultimoUsuarioEnArray = $arrayUsuariosJSON[$arrayLength - 2];
        $arrayUltimoUsuario = json_decode($ultimoUsuarioEnArray, true);
        
        $nuevoID = $arrayUltimoUsuario['id'] + 1;
        
        return $nuevoID;  
    }
    
}