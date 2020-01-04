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

    <div class="titulo">Registro</div>
    <div class="rec">
        <form action="enviar_registro.php" method="POST">
            <strong><div class="titulo2">Crear cuenta</div></strong>
            <input required type="text" name="nombre" placeholder="Escribe el nombre..">
            <input required type="text" name="appat" placeholder="Escribe el apellido paterno..">
            <input required type="text" name="apmat" placeholder="Escribe el apellido materno..">
            <input required type="email" name="correo" placeholder="Escribe el correo..">
            <input required type="password" name="password" placeholder="Escribe la contraseña..">
            <input required type="password" name="password2" placeholder="Confirmar la contraseña..">
            <input class="l" required type="submit" value="Ingresar" >
            <div class="center"><label class="msj">¿Ya tienes una cuenta? <a href="index.php">Inicia sesión!</a></label>
        </form>
    </div>
</body>
</html>