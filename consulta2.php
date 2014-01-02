<html>
	<head>
		<title>TAVECOL LTDA</title> <!--Titulo-->
		<link rel="stylesheet" href="estilo.css" type="text/css"/> <!--Conecxion css-->
		<link href="styles.css" rel="stylesheet" type="text/css">
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script>
function confirmar()
{
  if(confirm('¿Esta seguro de que desea eliminar este registro?'))
  {
    return true;
  }
  else
  {
    return false;
  } 
}
</script>
	</head>
	<?php 
	session_start(); 
	?>
	<body background="fondo_principal.jpg"> <!--Fondo-->
		<div id ="contenedor">
			<!--------------------------------------------------Cabecera---------------------------------------------------------------------------------->
			<div id ="cabecera">
			<!--<IMG SRC="menu1.png" WIDTH=1000 HEIGHT=60 BORDER=0 VSPACE=20 HSPACE=100 ALT="logo">-->
				<div id ="cabecera-izq">
					<br>
					<br>
					<table>
					<tr>
						<td>
						<?php
						echo $_SESSION['nombre'];
						?>
						</td>
						<td>
						<?php
						echo $_SESSION['apellidos'];
						?>
						</td>
					</tr>
					</table>
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
				
				<center>		
		<fieldset class="fieldset_modempleado">
		<legend>Empleados</legend>
				<table  CELLSPACING="15" >
					<tr>
					<td><font face="verdana"><b>Codigo</b></font></td>
					<td><font face="verdana"><b>Cedula</b></font></td>
					<td><font face="verdana"><b>Nombre</b></font></td>
					<td><font face="verdana"><b>Apellidos</b></font></td>
					<td><font face="verdana"><b>Telefono</b></font></td>
					<td><font face="verdana"><b>Cargo</b></font></td>
					<td><font face="verdana"><b>Correo</b></font></td>
					<td colspan="2"><font face="verdana"><b>Opciones</b></font></td>
					</tr>

									

					<?php  
					 include('acceso_db.php');
					  $query = ("SELECT id_empleado, cedula, nom_empleado, apellidos, telefono, nom_cargo, correo FROM EMPLEADOS e JOIN CARGO c ON e.id_cargo=c.id_cargo where estado=1");
					  $result = mysql_query($query);
					  $numero = 0;
			
				if(mysql_num_rows($result)!=null){
					for($i=0;$i<mysql_num_rows($result);$i++){
						echo "<tr>";
							for($j=0;$j<mysql_num_fields($result);$j++){
								echo"<td>".mysql_result($result,$i,$j)."</td>";
								
							}
						?>
						<td><a  onClick='return confirmar()' href=eliminarempleado.php?id=<?php echo mysql_result($result,$i,0) ?>><IMG SRC='eliminar.png' WIDTH='30' HEIGHT='30'></a></td>
						<td><a href='modificarempleado.php'><IMG SRC='modificar.png' WIDTH='30' HEIGHT='30'></a></td></tr>
						<?php
						$numero++;
					}
				}
					  
					?>
					</table>
			</fieldset>
			<?php 
			echo "<b>Numero de empleados:  ". $numero ."</b>";
			?>
			</center>
				
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
