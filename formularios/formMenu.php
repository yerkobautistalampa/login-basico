<?php require_once "../verificaLog.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  
<h1 >Bienvenido/a <?php echo $_SESSION['Nombre'];?> </h1>
    <form method="POST">
        <a href="formRegistro.php">REGISTRO</a>
        <a href="formBusqueda.php">BUSCAR</a>
        <button type="submit" name="btnCerraSession">CERRAR SESION</button><br><br>
    </form>  
    
        <?php
            require_once("../class_usuario.php");
            $login = new usuario();
		    echo $login->cerrar_session();
        ?>  
</body>
</html>