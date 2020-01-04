<?php

//Incluyo mi archivo de clases
include "clase.php";

$correo=$_POST["correo"];
$password=$_POST["password"];
$pass=sha1($password);
$ruta="archivo.csv";
$funciones_datos=new login();
$existe_usuario=$funciones_datos->validarCred($correo,$pass,$ruta);

//si el valor retornado (nombre) es vacío significa que no encontró el usuario
if($existe_usuario==""){
     $msj1="EL USUARIO NO EXISTE";
}
else {
    $msj1="CREDENCIALES CORRECTAS";
}
//Mensaje USUARIO NO EXISTE
$msj= <<<EOT
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="estilos.css"> 
        <title>Login</title>
    </head>
    <body class="l">
        <div class="rec3">
            <div class="center"><label class="msj">$msj1</label>
            <div class="center"><label class="msj">$existe_usuario</label>

            <br><br><br>
            <a href="index.php">Regresar</a>
        </div>
    </body>
</html>
EOT;
        
echo $msj;
       
?>