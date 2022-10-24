<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
</head>
<body>
    <form method="POST" autocomplete="off">
        <h1>INICIO DE SESIÓN</h1>
        <h3>Ingrese usuario y contraseña</h3>
        <label> Usuario</label><br>
        <input type="text" name="txtUsuario"><br>
        <label>Contraseña</label><br>
        <input type="password" name="txtPassword"><br><br>
        <button type="submit" name="btnIniciarSession">Iniciar session</button>
    </form> 
    <?php
        require_once("class_usuario.php");
        $ingresar = new usuario();
	    echo $ingresar->iniciar_session();
      ?>
</body>
</html>
