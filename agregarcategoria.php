<html>
	<head>
		<title>TAVECOL</title> <!--Titulo-->
		<link rel="stylesheet" href="estilo.css" type="text/css"/> <!--Conecxion css-->
		<link href="styles.css" rel="stylesheet" type="text/css">
	</head>
	<?php 
	session_start(); 
	echo $_SESSION['id_empleado'];
	echo "</br>";
	echo $_SESSION['usuario'];
	?>
	<body background="fondo_principal.jpg"> <!--Fondo-->
		<div id ="contenedor">
			<!--------------------------------------------------Cabecera---------------------------------------------------------------------------------->
			<div id ="cabecera">
			<!--<IMG SRC="menu1.png" WIDTH=1000 HEIGHT=60 BORDER=0 VSPACE=20 HSPACE=100 ALT="logo">-->
				<div id ="cabecera-izq">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Usuario
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Salir
				</div>
				<div id ="cabecera-der">
				<IMG SRC="menu1.png" WIDTH=900 HEIGHT=80 BORDER=0 VSPACE=10 HSPACE=170 ALT="logo">
				</div>
			</div>
			<!--------------------------------------------------Cabecera---------------------------------------------------------------------------------->
			
			<!--------------------------------------------------Menu-------------------------------------------------------------------------------------->
			<div id='cssmenu'>
					<ul>
					   <li class='active'><a href='inicio.php'><span>Inicio</span></a></li>
					   <li class='has-sub'><a href='inicio.php'><span>Procesos</span></a>
						  <ul>
							 <li><a href='ingresarproducto.php'><span>Ingresar Producto</span></a></li>
							 <li class='last'><a href='retirarproducto.php'><span>Retirar Producto</span></a></li>
						  </ul>
					   </li>
					   <li class='has-sub'><a href='inicio.php'><span>Productos</span></a>
						  <ul>
							 <li><a href='agregarproducto.php'><span>Agregar Producto</span></a></li>
							 <li><a href='modificaroeleminarproducto.php'><span>Modificar o Eliminar Producto</span></a></li>
							 <li><a href='agregarcategoria.php'><span>Agregar Categoria</span></a></li>
							 <li><a href='modificaroeleminarcategoria.php'><span>Modificar o Eliminar Categoria</span></a></li>
							 <li class='last'><a href='consulta1.php'><span>Consulta</span></a></li>
						  </ul>
					   </li>
					   <li class='has-sub'><a href='inicio.php'><span>Personal</span></a>
						  <ul>
							 <li><a href='agregarempleado.php'><span>Agregar Empleado</span></a></li>
							 <li><a href='modificaroeleminarempleado.php'><span>Modificar o Eliminar Empleado</span></a></li>
							 <li class='last'><a href='consulta2.php'><span>Consulta</span></a></li>
						  </ul>
					   </li>
					   <li class='last'><a href='reportes.php'><span>Reportes</span></a></li>
					</ul>
			</div>
			<!--------------------------------------------------Menu---------------------------------------------------------------------------------------->
			<!--------------------------------------------------Centro-------------------------------------------------------------------------------------->
			<div id ="centro">
				<?php 
				include('acceso_db.php'); // incluimos el archivo de conexión a la Base de Datos 
				if(isset($_POST['enviar'])) { 
				// Procedemos a comprobar que los campos del formulario no estén vacíos 
		if(empty($_POST['nom_categoria'])) { 
            echo "No haz ingresado un nombre. <a href='javascript:history.back();'>Reintentar</a>";   
        }elseif(empty($_POST['descripcion'])) { 
            echo "No haz una descripcion. <a href='javascript:history.back();'>Reintentar</a>";
       
               
        }else { 
            // "limpiamos" los campos del formulario de posibles códigos maliciosos 
            $id_categoria = mysql_real_escape_string($_POST['id_categoria']); 
            $nom_categoria = mysql_real_escape_string($_POST['nom_categoria']); 
            $descripcion = mysql_real_escape_string($_POST['descripcion']); 
           
            
            // comprobamos que el usuario ingresado no haya sido registrado antes 
            $sql = mysql_query("SELECT login FROM EMPLEADOS WHERE nom_categoria='".$nom_categoria."'"); 
            if(mysql_num_rows($sql) > 0) { 
                echo "El nombre usuario elegido ya ha sido registrado anteriormente. <a href='javascript:history.back();'>Reintentar</a>"; 
            }else {
				
               $reg = mysql_query("INSERT INTO CATEGORIA (id_categoria, nom_categoria, descripcion) VALUES ('".$id_categoria."', '".$nom_categoria."', '".$descripcion."')");
                
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
			Agregar categoria producto
		</legend>
			<table>
				
				<tr><td><label>Nombre categoria:</label></td><td><input type="text" name="nom_categoria" maxlength="25" /></td></tr>
				<tr><td><label>Descripcion:</label></td><td><input type="text" name="descripcion" maxlength="100" /></td></tr>
				<tr><td><input type="reset" value="Borrar" /></td><td> <input type="submit" name="enviar" value="Agregar" /></td></tr>
			</table>
	</fieldset>
    </form> 
    </center>
<?php 
    } 
?>
			
			</div>
			<!--------------------------------------------------Centro-------------------------------------------------------------------------------------->
			<!-----------------------------------------------------Pie-------------------------------------------------------------------------------------->
			<div id ="pie">
				<IMG SRC="pie.png" WIDTH=1262 HEIGHT=50 BORDER=0 VSPACE=40 HSPACE=0 ALT="logo"> <!--Insertar iamgen-->
				<br>
			</div>	
			<!-----------------------------------------------------Pie-------------------------------------------------------------------------------------->
		</div
	</body>
</html>
