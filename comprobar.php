<?php 
    include('acceso_db.php'); 
    if(isset($_POST['enviar'])) { // comprobamos que se hayan enviado los datos del formulario 
        // comprobamos que los campos usuarios_nombre y usuario_clave no estén vacíos 
        if(empty($_POST['login']) || empty($_POST['password'])) { 
			
        }else { 
            // "limpiamos" los campos del formulario de posibles códigos maliciosos 
           $login = mysql_real_escape_string($_POST['login']); 
            $password = mysql_real_escape_string($_POST['password']); 
           $password = md5($password); 
            // comprobamos que los datos ingresados en el formulario coincidan con los de la BD 
            echo $sql=("SELECT id_empleado,nom_empleado,apellidos FROM EMPLEADOS WHERE login='$login' AND password='$password'");
			echo "</br>";
			 $query=mysql_query($sql);
			echo "</br>";
			
			echo "</br>";
			echo "<--";
			$total=mysql_num_rows($query);
			$array=mysql_fetch_array($query);
			echo "</br>";
			$array['id_empleado'];
			$array['nom_empleado'];
            if($total>0) {
				
			session_start(); 
                echo $_SESSION['id_empleado'] = $array['id_empleado']; // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id 
                echo $_SESSION['nombre'] = $array['nom_empleado']; // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre 
                echo $_SESSION['apellidos']= $array['apellidos'];
                header("Location: inicio.php"); 
            }else { 
?> 
                Error, <a href="index.html">Reintentar</a>
<?php 
            } 
        } 
    }else { 
        header("Location: inicio.html"); 
    } 
?>
