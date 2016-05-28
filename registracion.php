<!--
      PRACTICA DE REPASO  - REGISTRACION Y LOGIN
-->
<?php
    require_once 'funcionesPractica.php';

    $pnombre = "";
    $papellido = "";
    $pmail = "";
    $psexo = ['masculino', 'femenino', 'otro'];
    
    if($_POST){
        $pnombre = $_POST['nombre'];
        $papellido = $_POST['apellido'];
        $pmail = $_POST['mail'];
        $errores = [];
        
        $errores = validarUsuario($_POST);

        if(empty($errores)){
            $usuario = crearUsuario($_POST); 
            guardarUsuario($usuario);
            //guardarImagen($usuario);
            loginUsuario();
        }
    }
?>

<html>     
    <head>
            <title>Registracion</title>
    </head>
    <body>
            <h1>Registrate!</h1>
                
            <form action="registracion.php" method="POST" enctype="multipart/form-data">
                <?php if(!empty($errores)){?>
                    
                    <div style="background-color: red; border: 1px solid blue; width:80%">
                        <ul>
                            <?php foreach($errores as $key=>$error){ ?>
                                <li><?php echo $error?></li>
                            <?php }?>    
                        </ul>                                
                    </div>
                <?php }?>
                    <div>
                            <label for="nombre">Nombre:</label>
                            <input id="nombre" type="text" name="nombre" value="<?php echo $pnombre?>"></input>
                    </div>
                    <div>
                            <label for="apellido">Apellido:</label>
                            <input id="apellido" type="text" name="apellido" value="<?php echo $papellido?>"></input>
                    </div>
                    <div>
                            <label for="mail">Mail:</label>
                            <input id="mail" type="text" name="mail" value="<?php echo $pmail?>"></input>
                    </div>
                    <div>
                            <label for="pass">Contrase&ntilde;a:</label>
                            <input id="pass" type="password" name="pass"></input>
                    </div>
                    <div>
                            <label for="cpass">Confirmar Contrase&ntilde;a:</label>
                            <input id="cpass" type="password" name="cpass"></input>
                    </div>
                    <div>
                            <label for="sexo">Sexo:</label>
                            <select name="sexo" id="sexo">
                                <?php foreach ($psexo as $key => $sex){?>
                                         <?php if(isset($_POST['sexo']) && $key == $_POST['sexo'] ){?>
                                           <option selected value="<?php echo $key?>"><?php echo $sex ?></option>
                                         <?php }else{?>
                                            <option value="<?php echo $key?>"><?php echo $sex ?></option>
                                         <?php }?>   
                                <?php }?>   
                            </select>
                    </div>
                    <div>
                            <label for="imagen">Avatar:</label>
                            <input id="imagen" name="imagen" type="file"/>
                    </div>
                    <div>
                            <input id="submit" type="submit" name="submit" value="Enviar"></input>
                    </div>                    
            </form>
    </body>
</html>
