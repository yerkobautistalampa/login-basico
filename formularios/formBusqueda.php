<?php require_once "../verificaLog.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Bienvenido/a <?php echo $_SESSION['Nombre'];?> </h1>
    <div>
        <form method="POST">
            <h1>BUSQUEDA</h1>
            <input type="text"  name="txtBuscarUsurio" >
            <button type="submit"  name="btnBuscar">Buscar Usuario</button>
            <a href="formMenu.php">Volver</a>
        </form>    
    </div>
    <?php
            if(isset($_POST['btnBuscar']))
            {
                require_once("../class_usuario.php");
                $buscar = new usuario();
                echo  $buscar->buscar_usuario();
            }
            else
            {
                require_once("../class_usuario.php");
                $mostar = new usuario();
                echo $mostar->mostar_usuario();
            }
    ?>
</body>
</html>