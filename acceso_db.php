<?php 
    $host_db = "localhost"; // Host de la BD 
    $usuario_db = "root"; // Usuario de la BD 
    $clave_db = ""; // Contraseña de la BD 
    $nombre_db = "celler c.b"; // Nombre de la BD 
     
    //conectamos y seleccionamos db 
    echo mysql_connect($host_db, $usuario_db, $clave_db)or die("Problemas en la conexión con el servidor");
    echo mysql_select_db($nombre_db)or die("Problemas en la BD"); 
?>
