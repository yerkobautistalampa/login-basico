<?php require_once "../verificaLog.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
<h1 >Bienvenido/a <?php echo $_SESSION['Nombre'];?> </h1>
        <?php
            $id =$_GET['enviarId'];
            $nombre =$_GET['enviarNombre'];
            $paterno =$_GET['enviarPaterno'];
            $materno =$_GET['enviarMaterno'];
            $ci =$_GET['enviarCi'];
            $fechanac =$_GET['enviarFecha'];
            $fecha=date("d/m/Y", strtotime($fechanac));
            $contra =$_GET['enviarPassword'];
        ?>
        <div>
            <form method="POST">
                <h1>EDITAR</h1>
                    <label>id</label>
                    <input type="text" name="txtId" value="<?=$id?>" readonly="readonly"><br>

                    <label>Nombre</label>
                    <input type="text" name="txtNombre" value="<?=$nombre?>"><br>

                    <label>Paterno</label>
                    <input type="text" name="txtPaterno" value="<?=$paterno?>"><br>

                    <label>Materno</label>
                    <input type="text" name="txtMaterno" value="<?=$materno?>"><br>

                    <label>Carnet de identidad</label>
                    <input type="text" name="txtCi" value="<?=$ci?>"><br>

                    <label >Fecha de nacimiento</label>
                    <input type="date" name="txtFecha" value="<?=$fechanac?>"><br>

                    <label >Contraseña</label>
                    <input type="text" name="txtPasword" value="<?=$contra?>"><br>
                   
                    <button type="submit" name="btnActializar">Actualizar</button><br><br>
                    <button type="submit" name="btnEliminar">Eliminar</button><br><br>
                    <a href="formBusqueda.php">Volver</a>
            </form>    
        </div>
        <?php
            require_once("../class_usuario.php");
            $eliminar= new usuario();
		    echo  $eliminar->elimiminar_usuario();
            $actualizar = new usuario();
		    echo $actualizar->actualizar_usuario();
        ?>
</body>
</html>