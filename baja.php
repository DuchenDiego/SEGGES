<?php
include 'conexion.php';
$usuarioid=$_REQUEST['socioid'];
if($db_found){
	$result=mysql_query("UPDATE Socio SET Estado='deshabilitado' WHERE Estado='habilitado' and CiSo=$usuarioid",$db_handle);
	if($result){
		echo '<link rel="stylesheet" href="EstiloModal.css" type="text/css"/>';
			echo '<form name="form2" method="post" action="modificacion.php">
		
		<div class="modal-wrapper" id="popup">
		<div class="popup-contenedor">
		<a class="popup-cerrar" href="modificacion.php">X</a>
			<h2>Socio Deshabilitado!!</h2>
			<input type="submit" class="botonlogin" value="Aceptar" />
			
			
		</div>
	</div>

';
	}
	else{
		print('Error al ejecutar la consulta');
	}
	mysql_close($db_handle);
}
else{
	print('No se pudo conectar a un servidor');
}
?>