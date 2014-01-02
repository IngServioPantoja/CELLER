<html>
	<head>
		<title>TAVECOL LTDA</title> <!--Titulo-->
		<link rel="stylesheet" href="estilo.css" type="text/css"/> <!--Conecxion css-->
		<link href="styles.css" rel="stylesheet" type="text/css">
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
						<td><a href="logout.php">Cerrar Sesion</a></td>
					</tr>
					</table>
					
				</div>
				<div id ="cabecera-der">
				<IMG SRC="menu1.png" WIDTH=900 HEIGHT=80 BORDER=0 VSPACE=10 HSPACE=50 ALT="logo">
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
		<legend>Productos agotados</legend>
				<table  CELLSPACING="15" class="tablaincio">
	
					<tr>
					<td><font face="verdana"><b>Codigo</b></font></td>
					<td><font face="verdana"><b>Nombre producto</b></font></td>
					<td><font face="verdana"><b>stock</b></font></td>
					<td><font face="verdana"><b>Unidad de medida</b></font></td>
					<td><font face="verdana"><b>Categoria</b></font></td>
					</tr>

									

					<?php  
					 include('acceso_db.php');
					 
					  $query = ("SELECT id_producto, nom_producto, stock, nom_unidad, nom_categoria FROM PRODUCTOS p join CATEGORIA c join MEDIDAS m ON p.id_medida = m.id_medida and p.id_categoria = c.id_categoria WHERE stock <= min_stock");
					  $result = mysql_query($query);
					  $numero = 0;
					  while($row = mysql_fetch_array($result))
					  {
						echo "<tr><td><font face=\"verdana\">" . 
							$row["id_producto"] . "</font></td>";
						echo "<td><font face=\"verdana\">" . 
							$row["nom_producto"] . "</font></td>";
						echo "<td><font face=\"verdana\">" . 
							$row["stock"] . "</font></td>";
						echo "<td><font face=\"verdana\">" . 
							$row["nom_unidad"]. "</font></td>";  
						echo "<td><font face=\"verdana\">" . 
							$row["nom_categoria"] . "</font></td>"; 
					     
						$numero++;
					  } 
					  
					 
					?>
					</table>
			</fieldset>
			<?php 
			echo "<b>Numero de productos en stock minimo:  ". $numero ."</b>";
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
