<?php require_once "../verificaLog.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Registro</title>
</head>
<body>
<h1>Bienvenido/a <?php echo $_SESSION['Nombre'];?> </h1>
        <div>
            <form method="POST" id="formulario" autocomplete="off">
                <h1>REGISTRO</h1>
                    <label>Nombre:</label>
                    <input type="text" name="txtNombre" required><br>
                    <label>Paterno:</label>
                    <input type="text" name="txtPaterno"><br>
                    <label>Materno:</label>
                    <input type="text" name="txtmMaterno"><br>
                    <label>C.I.:</label>
                    <input type="text" name="txtCi"required><br>
                    <label>Fecha de nacimiento:</label>
                    <input type="date" name="txtfecha"required><br>
                    <label>Contraseña</label>
                    <input type="text" name="txtPassword"required><br>
                    
                    <button type="submit" name="btnGuardar">Registrar</button>
                    <button onclick="limpiar()">Limpiar</button>

                    <a href="formMenu.php">Volver</a>
            </form>    
        </div>
        <script>
                src="../js/main.js"
        </script>
        <?php
            require_once("../class_usuario.php");
            $login = new usuario();
		    echo $login->guardar_usuario();
        ?>
</body>
</html>