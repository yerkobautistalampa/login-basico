<?php
    class usuario 
    {
        public function guardar_usuario()
        {
            include("conexion_BD.php");
            if(isset($_POST['btnGuardar']))
            {       
                $nombre=trim($_POST['txtNombre']);
                $paterno=trim($_POST['txtPaterno']);
                $materno=trim($_POST['txtmMaterno']);
                $ci=trim($_POST['txtCi']);
                $fechanac=trim($_POST['txtfecha']);
                $contra=trim($_POST['txtPassword']);

                $consulta="INSERT INTO clienteUsuario(paterno,materno,nombre,ci,fecha_nac,contra) 
                            VALUES ('$paterno','$materno','$nombre','$ci','$fechanac','$contra')";
                $resultado = mysqli_query($conexion,$consulta);
                if($resultado)
                {
                    echo '<div">Se ha registrado exitosamente</div>';
                }
                else{
                    echo '<div">No se ha registrado</div>';
                } 
            }
        }
        public function buscar_usuario()
        {
            include("conexion_BD.php");
            if(isset($_POST['btnBuscar']))
            {
                $buscar=$_POST['txtBuscarUsurio'];

                $consulta = "SELECT id,nombre,paterno,materno,ci,fecha_nac,contra FROM clienteUsuario
                WHERE paterno like '$buscar' '%'
                or materno like '$buscar' '%'
                or nombre like '$buscar' '%'
                or ci like '$buscar' '%'
                or fecha_nac like '$buscar' '%'
                or contra like '$buscar' '%'
                order by id";

                $resultado = mysqli_query($conexion,$consulta);
                echo '
                <div>
                    <table border=1>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>PATERNO</th>
                            <th>MATERNO</th>
                            <th>CI</th>
                            <th>FECHA NAC</th>
                            <th>EDITAR</th>
                        </tr>';
                    while($fila=mysqli_fetch_row($resultado))
                    {
                        echo'<tr>';
                        echo"<td>$fila[0]</th>"; 
                        echo"<td>$fila[1]</td>"; 
                        echo"<td>$fila[2]</td>"; 
                        echo"<td>$fila[3]</td>";
                        echo"<td>$fila[4]</td>"; 
                        echo"<td>$fila[5]</td>"; 
                        echo "<td>";
                        ?><a href = "formEditar.php?enviarId=<?php echo $fila[0]?> & 
                        enviarNombre=<?php echo $fila[1]?>&
                        enviarPaterno=<?php echo $fila[2]?>&
                        enviarMaterno=<?php echo $fila[3]?>&
                        enviarCi=<?php echo $fila[4]?>&
                        enviarFecha=<?php echo $fila[5]?>&
                        enviarPassword=<?php echo $fila[6]?>">Editar</a><?php echo "</td>"?>
                        <?php echo "</tr>";
                    }
                echo "</table>
                <div>";
            }
        }

        public function mostar_usuario()
        {
            include("conexion_BD.php");
    
            $consulta = "SELECT * FROM clienteUsuario";
            $resultado = mysqli_query($conexion,$consulta);
            if($resultado==true)
            {
            echo '
            <div>
                <table border=1>
                    <tr>
                        <td>#</th>
                        <td>NOMBRE</td>
                        <td>PATERNO</td>
                        <td>MATERNO</td>
                        <td>CI</td>
                        <td>FECHA NAC</td>
                        <td>EDITAR</td>
                    </tr>';
                while($fila=mysqli_fetch_row($resultado))
                {
                    echo'<tr>';
                        echo"<td>$fila[0]</th>"; 
                        echo"<td>$fila[1]</td>"; 
                        echo"<td>$fila[2]</td>"; 
                        echo"<td>$fila[3]</td>";
                        echo"<td>$fila[4]</td>"; 
                        echo"<td>$fila[5]</td>"; 
                        echo "<td>";
                        ?><a href = "formEditar.php?enviarId=<?php echo $fila[0]?> & 
                        enviarNombre=<?php echo $fila[1]?>&
                        enviarPaterno=<?php echo $fila[2]?>&
                        enviarMaterno=<?php echo $fila[3]?>&
                        enviarCi=<?php echo $fila[4]?>&
                        enviarFecha=<?php echo $fila[5]?>&
                        enviarPassword=<?php echo $fila[6]?>">Editar</a><?php echo "</td>"?>
                    <?php echo "
                    </tr>";
                }
                echo "
                </table>
            <div>";
            }
        }
        public function actualizar_usuario()
        {
            include("conexion_BD.php");
            if(isset($_POST['btnActializar']))
            {
                $id = $_POST['txtId'];
                $nombre = $_POST['txtNombre'];
                $paterno = $_POST['txtPaterno'];
                $materno = $_POST['txtMaterno'];
                $ci = $_POST['txtCi'];
                $fechanac = $_POST['txtFecha'];
                $contra = $_POST['txtPasword'];
            
                $consulta = "UPDATE clienteUsuario set paterno='$paterno',materno='$materno',nombre='$nombre',ci='$ci',
                            fecha_nac='$fechanac',contra='$contra' WHERE id like $id ";
                $resultado = mysqli_query($conexion, $consulta);
            
                if(!$resultado)
                {
                    echo '<div> No se ha actualizado </div>';
                }
                else
                {
                    header("Location: formBusqueda.php");
                }
            }
        } 
        public function elimiminar_usuario()
        {
            include("conexion_BD.php");
            if(isset($_POST['btnEliminar']))
            {
                $id = $_POST['txtId'];
        
                $consulta = "DELETE FROM clienteUsuario WHERE id = $id ";
                $resultado = mysqli_query($conexion, $consulta);
        
                if($resultado)
                {
                    header("Location: formBusqueda.php");
                }
                else
                {
                    echo '<div> No se elimino </div>';
                }
            }
        }
        public function cerrar_session()
        {
            if(isset($_POST['btnCerraSession']))
            {
                session_start();
                session_destroy();
                header("Location:../index.php");  
            }
        }
        public function iniciar_session()
        {
            if(isset($_POST['btnIniciarSession']))
            {
                include("conexion_BD.php");
                $usuario=$_POST['txtUsuario'];
                $pass=$_POST['txtPassword'];
                session_start();
                $consulta="SELECT nombre, paterno, materno, contra FROM clienteUsuario where ci ='$usuario' and  contra='$pass'";                
                $resultado = mysqli_query($conexion,$consulta);
                $fila=mysqli_num_rows($resultado);
                if($fila)
                {
                    while($filas=mysqli_fetch_row($resultado)){
                        if($filas[3]=$pass)
                        {
                            $Nombre=$filas[0].' '.$filas[1].' '.$filas[2];
                            $_SESSION['Nombre']=$Nombre;
                            header("location:formularios/formMenu.php");
                        }
                    }
                } 
                else
                {   require_once("index.php");
                    echo "<h1>Usuario o contrasena incorrectos</h1>";
                }
            }
        }
    }
?>

