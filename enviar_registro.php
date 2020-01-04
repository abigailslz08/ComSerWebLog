<?php
//Incluyo mi archivo de clases
include "clase.php";
//Obtengo los valores del formulario por POST
$pNombre=$_POST["nombre"];
$pApPat=$_POST["appat"];
$pApMat=$_POST["apmat"];
$pCorreo=$_POST["correo"];
$pPass1=$_POST["password"];
$pPass2=$_POST["password2"];

$ruta="archivo.csv";
//Mensaje USUARIO AGREGADO
$msj1= <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css"> 
    <title>Registro</title>
</head>
<body  class="r">
    <div class="rec3">
    <div class="center"><label class="msj">USUARIO AGREGADO</label>
    <br><br><br>
    <a href="index.php">Inicia sesión!</a>
    </div>
</body>
</html>
EOT;

//Mensaje CORREO EXISTENTE
$msj2= <<<MCE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css"> 
    <title>Registro</title>
</head>
<body  class="r">
    <div class="rec3">
    <div class="center"><label class="msj">CORREO EXISTENTE</label>
    <br><br><br>
    <a href="registro.php">Regístrate</a>
    </div>
</body>
</html>
MCE;

//Mensaje CLAVE NO COINCIDE
$msj3= <<<MCE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css"> 
    <title>Registro</title>
</head>
<body class="r">
    <div class="rec3">
    <div class="center"><label class="msj">LAS CONTRASEÑAS NO COINCIDEN</label>
    <br><br><br>
    <a href="registro.php">Regístrate</a>
    </div>
    </body>
</html>
MCE;

$funciones_datos = new registro();
$generar=$funciones_datos->generarCSV($ruta,';', '"',$pPass1,$pPass2,$pNombre,$pApPat,$pApMat,$pCorreo,$msj1,$msj2,$msj3);

?>