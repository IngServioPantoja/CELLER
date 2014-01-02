
			<?php 
				include('acceso_db.php'); // incluimos el archivo de conexión a la Base de Datos 
				if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos desde el formulario 
				// creamos una función que nos parmita validar el email 
				function valida_email($correo) { 
				if (preg_match('/^[A-Za-z0-9-_.+%]+@[A-Za-z0-9-.]+\.[A-Za-z]{2,4}$/', $correo)) return true; 
				else return false; 
				} 
				// Procedemos a comprobar que los campos del formulario no estén vacíos 
        $sin_espacios = count_chars($_POST['login'], 1); 
        if(!empty($sin_espacios[32])) { // comprobamos que el campo login no tenga espacios en blanco 
            echo "El campo <em>login</em> no debe contener espacios en blanco. <a href='javascript:history.back();'>Reintentar</a>"; 
        }elseif(empty($_POST['login'])) { // comprobamos que el campo login no esté vacío 
            echo "No haz ingresado tu login. <a href='javascript:history.back();'>Reintentar</a>"; 
         
        }elseif(empty($_POST['cedula'])) { // comprobamos que el campo login no esté vacío 
            echo "No haz ingresado tu login. <a href='javascript:history.back();'>Reintentar</a>";  
        }elseif(empty($_POST['nom_empleado'])) { // comprobamos que el campo nombre no esté vacío 
            echo "No haz ingresado tu nombre. <a href='javascript:history.back();'>Reintentar</a>";   
        }elseif(empty($_POST['apellidos'])) { // comprobamos que el campo apellido no esté vacío 
            echo "No haz ingresado tus apellidos. <a href='javascript:history.back();'>Reintentar</a>";
        }elseif(empty($_POST['id_cargo'])) { // comprobamos que el campo cargo no esté vacío 
            echo "No haz ingresado tu login. <a href='javascript:history.back();'>Reintentar</a>"; 
        }elseif(empty($_POST['telefono'])) { // comprobamos que el campo telefono no esté vacío 
            echo "No haz ingresado tu telefono. <a href='javascript:history.back();'>Reintentar</a>";  
                
        }elseif(empty($_POST['password'])) { // comprobamos que el campo password no esté vacío 
            echo "No haz ingresado password. <a href='javascript:history.back();'>Reintentar</a>"; 
        }elseif($_POST['password'] != $_POST['password_conf']) { // comprobamos que las contraseñas ingresadas coincidan 
            echo "Las contraseñas ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>"; 
        }elseif(!valida_email($_POST['correo'])) { // validamos que el email ingresado sea correcto 
            echo "El email ingresado no es válido. <a href='javascript:history.back();'>Reintentar</a>"; 
        }else { 
            // "limpiamos" los campos del formulario de posibles códigos maliciosos 
            $cedula = mysql_real_escape_string($_POST['cedula']); 
            $nom_empleado = mysql_real_escape_string($_POST['nom_empleado']); 
            $apellidos = mysql_real_escape_string($_POST['apellidos']); 
            $telefono = mysql_real_escape_string($_POST['telefono']); 
            $login = mysql_real_escape_string($_POST['login']); 
            $password = mysql_real_escape_string($_POST['password']); 
            $correo = mysql_real_escape_string($_POST['correo']); 
            $id_cargo = mysql_real_escape_string($_POST['id_cargo']); 
            $id_empleado = mysql_real_escape_string($_POST['id_empleado']);
            
            // comprobamos que el usuario ingresado no haya sido registrado antes 
            $sql = mysql_query("SELECT login FROM EMPLEADOS WHERE login='".$login."'"); 
            if(mysql_num_rows($sql) > 0) { 
                echo "El nombre usuario elegido ya ha sido registrado anteriormente. <a href='javascript:history.back();'>Reintentar</a>"; 
            }else { 
                $password = md5($password); // encriptamos la contraseña ingresada con md5 
                // ingresamos los datos a la BD 
               $reg = mysql_query("INSERT INTO EMPLEADOS (cedula, nom_empleado, apellidos, telefono, login, password, id_cargo, correo) VALUES ('".$cedula."', '".$nom_empleado."', '".$apellidos."', '".$telefono."', '".$login."', '".$password."', '".$id_cargo."','".$correo."')");
                
				if($reg) { 

                }else { 
                    echo "ha ocurrido un error y no se registraron los datos."; 
                } 
            } 
        } 
    }else { 
?> 
<center>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
    <fieldset class="fieldset_registro">
		<legend>
			Registrar usuario
		</legend>
			<table>
				<tr>
				<td><label>Cedula</label></td>
				<td><label>Nombre</label></td>
				<td><label>Apellidos</label></td>
				<td><label>Cargo</label></td>
				<td><label>telefono</label></td>
				<td><label>login</label></td>
				<td><label>Contrase&ntilde;a</label></td>
				<td><label>Confirmar Contrase&ntilde;a</label></td>
				<td><label>Correo</label></td>
				</tr>
					
					
					
					
					
					
					
				<tr>
					<td><input type="text" name="cedula" maxlength="25" /></td>
					<td><input type="text" name="nom_empleado" maxlength="25" /></td>
					<td><input type="text" name="apellidos" maxlength="25" /></td>
				
					<td>
				
				    <select name="id_cargo">
					<?php
					include('acceso_db.php');
					$sel=mysql_query("select * from CARGO");
					while($sel2=mysql_fetch_array($sel)){
					?>
					<option value="<?php  echo $sel2[0]; ?>"><?php  echo $sel2[1]; ?></option>
					<?php
					}
					?>
				
				</td>
				
				
					<td><input type="text" name="telefono" maxlength="25" /></td>
					<td><input type="text" name="login" maxlength="25" /></td>
					<td><input type="password" name="password" maxlength="25" /></td>
					<td><input type="password" name="password_conf" maxlength="25" /></td></tr>
					<td><input type="text" name="correo" maxlength="50" /></td>
				</tr>
				
					<tr>
					<td><input type="text" name="cedula" maxlength="25" /></td>
					<td><input type="text" name="nom_empleado" maxlength="25" /></td>
					<td><input type="text" name="apellidos" maxlength="25" /></td>
				
					<td>
				
				    <select name="id_cargo">
					<?php
					include('acceso_db.php');
					$sel=mysql_query("select * from CARGO");
					while($sel2=mysql_fetch_array($sel)){
					?>
					<option value="<?php  echo $sel2[0]; ?>"><?php  echo $sel2[1]; ?></option>
					<?php
					}
					?>
				
				</td>
				
				
					<td><input type="text" name="telefono" maxlength="25" /></td>
					<td><input type="text" name="login" maxlength="25" /></td>
					<td><input type="password" name="password" maxlength="25" /></td>
					<td><input type="password" name="password_conf" maxlength="25" /></td></tr>
					<td><input type="text" name="correo" maxlength="50" /></td>
				</tr>
				
					<tr>
					<td><input type="text" name="cedula" maxlength="25" /></td>
					<td><input type="text" name="nom_empleado" maxlength="25" /></td>
					<td><input type="text" name="apellidos" maxlength="25" /></td>
				
					<td>
				
				    <select name="id_cargo">
					<?php
					include('acceso_db.php');
					$sel=mysql_query("select * from CARGO");
					while($sel2=mysql_fetch_array($sel)){
					?>
					<option value="<?php  echo $sel2[0]; ?>"><?php  echo $sel2[1]; ?></option>
					<?php
					}
					?>
				
				</td>
					<td><input type="text" name="telefono" maxlength="25" /></td>
					<td><input type="text" name="login" maxlength="25" /></td>
					<td><input type="password" name="password" maxlength="25" /></td>
					<td><input type="password" name="password_conf" maxlength="25" /></td></tr>
					<td><input type="text" name="correo" maxlength="50" /></td>
				</tr>
				
				<tr><td><input type="reset" value="Borrar" /></td><td> <input type="submit" name="enviar" value="Registrar" /></td></tr>
			
			</table>
	</fieldset>
    </form> 
    </center>
<?php 
    } 
?>
