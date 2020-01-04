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

    <div class="titulo">Login</div>
    <div class="rec2">
        <form action="enviar_credenciales.php" method="POST">
           <strong><div class="titulo2">Iniciar sesión</div></strong>
            <input required type="email" name="correo" placeholder="Escribe el correo..">
            <input required type="password" name="password" placeholder="Escribe la contraseña..">
            <input class="r" type="submit" value="Ingresar" >
            <div class="center"><label class="msj">¿No tienes una cuenta? <a href="registro.php">Registrate!</a></label>
        </form>
    </div>
</body>
</html>