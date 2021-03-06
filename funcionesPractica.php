<?php
error_reporting(E_ALL); ini_set('display_errors', 'On'); 
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
    
    $usuarioJSON = json_encode($nuevoUsuario);
    file_put_contents('repositorioUsuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND);
}

function traerNuevoId(){
    
    if (!file_exists("repositorioUsuarios.json"))
		{
			return 1;
		}

		$usuarios = file_get_contents("repositorioUsuarios.json");

		$usuariosArray = explode(PHP_EOL, $usuarios);
		$ultimoUsuario = $usuariosArray[count($usuariosArray) - 2 ];
		$ultimoUsuarioArray = json_decode($ultimoUsuario, true);

		return $ultimoUsuarioArray["id"] + 1;
    
}

function enviarPaginaHome(){
    header('Location:paginaBienvenida.php');
    exit();
}

?>
