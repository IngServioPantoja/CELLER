<html>
	<head>
		<title>TAVECOL LTDA</title> <!--Titulo-->
		<link rel="stylesheet" href="estilo.css" type="text/css"/> <!--Conecxion css-->
		<link href="styles.css" rel="stylesheet" type="text/css">
	</head>
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
				<p align="center">Seleccione la categor&iacute;a que desea eliminar:</p>
<form id="form1" name="form1" method="post" action="">
  <p align="center">
    <label for="producto"></label>
    
    <select name="producto" id="producto">
    <?php
   include('acceso_db.php');
$sel=mysql_query("select * from PRODUCTOS");
while($sel2=mysql_fetch_array($sel)){
?>
      <option value="<?php  echo $sel2[0]; ?>"><?php  echo $sel2[1]; ?></option>
<?php
}
?>

    </select>
  </p>
  <p align="center">
    <input type="submit" name="button" id="button" value="Eliminar" />
  </p>
</form>

				<?php
if (!isset($_POST['producto'])){
	echo"";}else{
		$_sel3=mysql_query("delete from PRODUCTOS where id_producto=". $_POST['producto']."");
		echo"<center><strong>La categor&iacute;a ha sido eliminada.</strong></center>";		
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
