<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
 		include 'conexion.php';
		  if($db_found){//para llenar los comboboxes
			  $SQL = "SELECT * FROM Ofertas ORDER BY NombreOferta";
			  $result=mysql_query($SQL ,$db_handle);
			  $result2=mysql_query($SQL ,$db_handle);
			  $SQL3= "SELECT * FROM Socio WHERE Estado='habilitado' AND Tipo='atleta'";
			  $result3=mysql_query($SQL3,$db_handle);
			  ////
			  $queryaux="SELECT * FROM Pago";
			  $res=mysql_query($queryaux,$db_handle);
			  $num_rows=mysql_num_rows($res);
		  }		
	if(isset ($_POST['submit1'])){
		$pago=$_POST['pago'];
		if($db_found){
			mysql_query("UPDATE Pago SET Pago='".$pago."'",$db_handle);
			echo "
				<input type='checkbox' id='close-modal'>
				<label for='close-modal' id='btn-close-modal'></label>
				 <div class='modal'>
				   <div class='content-modal'>
					 <h1>Monto Modificado</h1>
					  <p>El pago mensual ha sido cambiado</p>
				   </div>
				 </div> ";
		}
	  }
	
	if(isset ($_POST['submit2'])){
		$nombreoferta=$_POST['nombreoferta'];
		$oferta=$_POST['oferta'];
		$duracion=$_POST['duracion'];
		mysql_query("INSERT INTO Ofertas(IdOfertas,Oferta,NombreOferta,Duracion) VALUES ('','".$oferta."','".$nombreoferta."','".$duracion."')",$db_handle);
		echo "
				<input type='checkbox' id='close-modal'>
				<label for='close-modal' id='btn-close-modal'></label>
				 <div class='modal'>
				   <div class='content-modal'>
				   <form name='f2' method='post' action='mensualidad.php'>	
					 <h1>Oferta Agregada</h1>
					  <p>La oferta se creó satisfactoriamente</p>
					  <input type='submit' value='Aceptar' />
					  </form>
				   </div>
				 </div> ";
	}
	if(isset ($_POST['submit3'])){
		$eliminar=$_POST['eliminar'];
		mysql_query("DELETE FROM Ofertas WHERE NombreOferta='".$eliminar."'",$db_handle);
		echo "
				<input type='checkbox' id='close-modal'>
				<label for='close-modal' id='btn-close-modal'></label>
				 <div class='modal'>
				   <div class='content-modal'>
				   <form name='f2' method='post' action='mensualidad.php'>	
					 <h1>Oferta Eliminada</h1>
					  <p>La oferta se borró satisfactoriamente</p>
					  <input type='submit' value='Aceptar' />
					  </form>
				   </div>
				 </div> ";
	}
	if(isset ($_POST['submit4'])){
		$datacmbasignar=$_POST['cmbasignaroferta'];
		$datacmbsocio=$_POST['cmbasignarsocio'];
		$queryasignar="SELECT * FROM Ofertas WHERE NombreOferta='".$datacmbasignar."' ";
		$querysocio="SELECT * From Socio WHERE Nick='".$datacmbsocio."'";
		if($datacmbasignar==="Ninguna"){
			$num_rows=mysql_fetch_array($res);
			mysql_query("INSERT INTO Mensualidad(Mensualidad) VALUES ('".$num_rows['Pago']."')",$db_handle);
			$aux=mysql_query("SELECT * FROM Pago,Mensualidad Where Pago.Pago=Mensualidad.Mensualidad",$db_handle);
			$num_rows2=mysql_fetch_array($aux);
			$res2=mysql_query($querysocio,$db_handle);
			$num_rows3=mysql_fetch_array($res2);
			mysql_query("INSERT INTO MensualidadSocio(IdMensualidad,CiSo) VALUES ('".$num_rows2['IdMensualidad']."','".$num_rows3['CiSo']."')
						ON DUPLICATE KEY UPDATE IdMensualidad='".$num_rows2['IdMensualidad']."',CiSo='".$num_rows3['CiSo']."'",$db_handle);
			echo "
				<input type='checkbox' id='close-modal'>
				<label for='close-modal' id='btn-close-modal'></label>
				 <div class='modal'>
				   <div class='content-modal'>
					 <h1>Mensualidad Asignada</h1>
					  <p>Se le asignó la mensualidad al socio sin ninguna oferta</p>
				   </div>
				 </div> ";
		}
		elseif ($datacmbasignar!="Ninguna"){
			$res3=mysql_query($queryasignar,$db_handle);
			$num_rows4=mysql_fetch_array($res3);
			$num_rows=mysql_fetch_array($res);
			$valorpago=$num_rows['Pago'];
			$valoroferta=$num_rows4['Oferta'];
			$cantidadporcentaje=($valorpago/10)*($valoroferta/10);
			$resultadomensualidad=($valorpago)-($cantidadporcentaje);
			$res2=mysql_query($querysocio,$db_handle);
			$num_rows3=mysql_fetch_array($res2);
			mysql_query("INSERT INTO Mensualidad(Mensualidad) VALUES ('".$resultadomensualidad."')",$db_handle);
			$idinsert=mysql_insert_id();
			mysql_query("INSERT INTO MensualidadSocio(IdMensualidad,CiSo) VALUES ('".$idinsert."','".$num_rows3['CiSo']."')
						ON DUPLICATE KEY UPDATE IdMensualidad='".$idinsert."',CiSo='".$num_rows3['CiSo']."'",$db_handle);
			echo "
				<input type='checkbox' id='close-modal'>
				<label for='close-modal' id='btn-close-modal'></label>
				 <div class='modal'>
				   <div class='content-modal'>
					 <h1>Mensualidad Asignada</h1>
					  <p>Se le asignó la oferta a la mensualidad del socio determinado</p>
				   </div>
				 </div> ";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>
/***Forms***/
body{
  width: 100%;
	height:100%;
	font-family: 'Open Sans', sans-serif;
	background: url(http://www.salvoemme.com/wp-content/uploads/2015/03/SFondo-pagine.jpg) no-repeat center;
	background-position:top;
}
body{
  background:url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/dark_wall.png);
}

/*sass variables used*/
$full:100%;
$auto:0 auto;
$align:center;

@mixin disable{
  outline:none;
  border:none;
}

@mixin easeme{
  -webkit-transition:1s ease;
  -moz-transition:1s ease;
  -o-transition:1s ease;
  -ms-transition:1s ease;
  transition:1s ease;
}

/*site container*/
.wrapper{
  width:80%;
  margin:$auto;
}

h1{
  text-align:$align;
  padding:30px 0px 0px 0px;
  font:35px Oswald;
  color:#FFF;
  text-transform:uppercase;
  text-shadow:#000 0px 1px 5px;
  margin:0px;
}

p{
  font:20px Open Sans;
  color:#6E6E6E;
  text-shadow:#000 0px 1px 5px;
  margin-bottom:30px;
}

.form{
  width:$full;
}

input[type="text"],input[type="email"],input[type="number"]{
  width:98%;
  padding:15px 0px 15px 8px;
  border-radius:5px;
  box-shadow:inset 4px 6px 10px -4px rgba(0,0,0,0.3), 0 1px 1px -1px rgba(255,255,255,0.3);
	background:rgba(0,0,0,0.2);
  @include disable;
  border:1px solid rgba(0,0,0,1);
  margin-bottom:10px;
  color:#6E6E6E;
  text-shadow:#000 0px 1px 5px;
}

input[type="submit"]{
  width:100%;
  padding:15px;
  border-radius:5px;
  @include disable;
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#28D2DE), to(#1A878F));
  background-image: -webkit-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: -moz-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: -o-linear-gradient(#28D2DE 0%, #1A878F 100%);
  background-image: linear-gradient(#28D2DE 0%, #1A878F 100%);
  font:14px Oswald;
  color:#FFF;
  text-transform:uppercase;
  text-shadow:#000 0px 1px 5px;
  border:1px solid #000;
  opacity:0.7;
	-webkit-box-shadow: 0 8px 6px -6px rgba(0,0,0,0.7);
  -moz-box-shadow: 0 8px 6px -6px rgba(0,0,0,0.7);
	box-shadow: 0 8px 6px -6px rgba(0,0,0,0.7);
  border-top:1px solid rgba(255,255,255,0.8)!important;
  -webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(50%, transparent), to(rgba(255,255,255,0.2)));
}

input:focus{
  box-shadow:inset 4px 6px 10px -4px rgba(0,0,0,0.7), 0 1px 1px -1px rgba(255,255,255,0.3);
  background:rgba(0,0,0,0.3);
  @include easeme;
}

input[type="submit"]:hover{
  opacity:1;
  cursor:pointer;
}

.name-help,.email-help{
  display:none;
  padding:0px;
  margin:0px 0px 15px 0px;
}

.optimize{
  position:fixed;
  right:3%;
  top:0px;
}
/***Comboboxes***/

.container {
  margin: 50px auto;
  width: 500px;
  text-align: center;
}
.container > .dropdown {
  margin: 0 20px;
  vertical-align: top;
}

.dropdown {
  display: inline-block;
  position: relative;
  overflow: hidden;
  height: 50px;
  width: 300px;
  background: #f2f2f2;
  border: 1px solid;
  border-color: white #f7f7f7 #f5f5f5;
  border-radius: 3px;
  background-image: -webkit-linear-gradient(top, transparent, rgba(0, 0, 0, 0.06));
  background-image: -moz-linear-gradient(top, transparent, rgba(0, 0, 0, 0.06));
  background-image: -o-linear-gradient(top, transparent, rgba(0, 0, 0, 0.06));
  background-image: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.06));
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
  margin-left:150px;
}
.dropdown:before, .dropdown:after {
  content: '';
  position: absolute;
  z-index: 2;
  top: 9px;
  right: 10px;
  width: 0;
  height: 0;
  border: 4px dashed;
  border-color: #888 transparent;
  pointer-events: none;
}
.dropdown:before {
  border-bottom-style: solid;
  border-top: none;
}
.dropdown:after {
  margin-top: 7px;
  border-top-style: solid;
  border-bottom: none;
}

.dropdown-select {
  position: relative;
  width: 130%;
  margin: 0;
  padding: 6px 8px 6px 10px;
  height: 28px;
  line-height: 14px;
  font-size: 12px;
  color: #62717a;
  text-shadow: 0 1px white;
  /* Fallback for IE 8 */
  background: #f2f2f2;
  /* "transparent" doesn't work with Opera */
  background: rgba(0, 0, 0, 0) !important;
  border: 0;
  border-radius: 0;
  -webkit-appearance: none;
}
.dropdown-select:focus {
  z-index: 3;
  width: 100%;
  color: #394349;
  outline: 2px solid #49aff2;
  outline: 2px solid -webkit-focus-ring-color;
  outline-offset: -2px;
}
.dropdown-select > option {
  margin: 3px;
  padding: 6px 8px;
  text-shadow: none;
  background: #f2f2f2;
  border-radius: 3px;
  cursor: pointer;
}

/* Fix for IE 8 putting the arrows behind the select element. */
.lt-ie9 .dropdown {
  z-index: 1;
}
.lt-ie9 .dropdown-select {
  z-index: -1;
}
.lt-ie9 .dropdown-select:focus {
  z-index: 3;
}

/* Dirty fix for Firefox adding padding where it shouldn't. */
@-moz-document url-prefix() {
  .dropdown-select {
    padding-left: 6px;
  }
}

.dropdown-dark {
  background: #444;
  border-color: #111 #0a0a0a black;
  background-image: -webkit-linear-gradient(top, transparent, rgba(0, 0, 0, 0.4));
  background-image: -moz-linear-gradient(top, transparent, rgba(0, 0, 0, 0.4));
  background-image: -o-linear-gradient(top, transparent, rgba(0, 0, 0, 0.4));
  background-image: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.4));
  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.1), 0 1px 1px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.1), 0 1px 1px rgba(0, 0, 0, 0.2);
}
.dropdown-dark:before {
  border-bottom-color: #aaa;
}
.dropdown-dark:after {
  border-top-color: #aaa;
}
.dropdown-dark .dropdown-select {
  color: #aaa;
  text-shadow: 0 1px black;
  /* Fallback for IE 8 */
  background: #444;
}
.dropdown-dark .dropdown-select:focus {
  color: #ccc;
}
.dropdown-dark .dropdown-select > option {
  background: #444;
  text-shadow: 0 1px rgba(0, 0, 0, 0.4);
}
/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 200px;
  margin: auto;
  max-width: 222px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
.s_th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:10px;
  height:80px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

.s_th:first-child {
  border-top-left-radius:3px;
}
 
.s_th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
.s_tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
.s_tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
  border-bottom: 1px solid #22262e;
}
 
.s_tr:first-child {
  border-top:none;
}

.s_tr:last-child {
  border-bottom:none;
}
 
.s_tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
.s_tr:nth-child(odd):hover td {
  background:#4E5066;
}

.s_tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
.s_tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
.s_td {
  background:#FFFFFF;
   height:50px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

.s_td:last-child {
  border-right: 0px;
}

.s_th.text-left {
  text-align: left;
}

.s_th.text-center {
  text-align: center;
}

.s_th.text-right {
  text-align: right;
}

.s_td.text-left {
  text-align: left;
}

.s_td.text-center {
  text-align: center;
}

.s_td.text-right {
  text-align: right;
}
/***MODAL****/
.modal{
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.75);
    position: fixed;
    z-index: 50000;
    top: 0;
    left: 0; 
    display: flex;
    -webkit-animation: modal 1s 1s forwards;
    -moz-animation: modal 1s 1s forwards;
    -o-animation: modal 1s 1s forwards;
    -ms-animation: modal 1s 1s forwards;
    animation: modal 1s 1s forwards;
    visibility: hidden;
    opacity: 0;
}
.content-modal{
    width: 300px;
    height: 250px;
    margin-top:12%;
	margin-left:39%;
    background: #fff;
    text-align: center;
}
#close-modal{
    display: none;
}
#close-modal:checked + label, #close-modal:checked ~ .modal {
    display: none;
}
#close-modal + label {
    position: fixed;
    color: #fff;
    z-index: 500000;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    top:20%;
    right: 50%;
    margin-top: -140px;
    margin-right: -165px;
    cursor: pointer;
    font-weight: bold;
    text-indent: -9999px;
    background: url("data:image/png;base64,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") no-repeat 0 0;
    -webkit-animation: modal 1s 1s forwards;
    -moz-animation: modal 1s 1s forwards;
    -o-animation: modal 1s 1s forwards;
    -ms-animation: modal 1s 1s forwards;
    animation: modal 1s 1s forwards;
    visibility: hidden;
    opacity: 0;
}
@keyframes modal{
    100%{
        visibility: visible;
        opacity: 1;
    }
}
</style>
</head>
<body>
 <center>
 			<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
            <div class="wrapper">
        <table class="table">
          <tr >
          	<td align="center" style="padding-right:10%;">
              <h1>Modificar Pago</h1>
              <p>Asigne un nuevo valor a pagar por mes</p>
              <form class="form" method="post" action="mensualidad.php">
              <p>Monto</p><input type="number" step="any" min="1" name="pago" >
              <input type="submit" name="submit1" value="Modificar">
              </form>
              </td>
              <td align="center">
              <table style="padding:2px;">
              <h1>Agregar Oferta</h1>
              <p>Llene los campos de la nueva oferta</p>
              <form class="form" method="post" action="mensualidad.php">
              <tr><td align="center" style="padding-right:10%;">
              <p>Nombre de Oferta</p>
              <input type="text" name="nombreoferta" required formnovalidate pattern="^[a-zA-Z][a-zA-Z-_\.]{1,20}$"></td><td align="center" style="padding-left:10%;">
              <p>Oferta</p>
              <input type="number" name="oferta" step="any" min="1" placeholder="Porcentaje" required ></td></tr><tr><td align="center" colspan="2">
              <p>Duración</p>
              <input type="number" name="duracion" min="1" placeholder="Meses" required>
                <input name="submit2" type="submit" class="submit" value="Añadir"></td>
               </table>
              </form>
              </td>
              <td align="center" style="padding-left:10%;">
              <table>
              <tr>
               <h1>Eliminar Oferta</h1>
              <p>Seleccione la oferta que desea eliminar</p>
              <form class="form" method="post" action="">
               <div class="dropdown dropdown-dark">
                <select name='eliminar' class="dropdown-select">
                <?php
				while($fila=mysql_fetch_array($result)){
	 			echo "<option  value='".$fila['NombreOferta']."'>".$fila['NombreOferta']."</option>";}
				?>
    			  </select>
                </div>
                <input name="submit3" type="submit" class="submit" value="Eliminar">
              </form>
              </tr>
              <tr>
              <h1>Asignar Oferta</h1>
              <p>Escoja La Oferta y El Socio al Que desea Asignarlo</p>
              <form class="form" method="post" action="">
               <div class="dropdown dropdown-dark">
                <select name='cmbasignaroferta' class="dropdown-select">
                <option value="Ninguna">Ninguna</option>
                <?php
				while($fila2=mysql_fetch_array($result2)){
	 			echo "<option  value='".$fila2['NombreOferta']."'>".$fila2['NombreOferta']."</option>";}
				?>
    			  </select>
                </div>
                <div class="dropdown dropdown-dark">
                <select name='cmbasignarsocio' class="dropdown-select">
                <?php
				while($fila3=mysql_fetch_array($result3)){
	 			echo "<option value='".$fila3['Nick']."'>".$fila3['Nick']."</option>";}
				?>
    			  </select>
                </div>
                <input name="submit4" type="submit" class="submit" value="Asignar">
              </form>
              </tr>
              </table>
              </td>
             <tr><br />
			 <br />
             <td colspan="3">
              <h1>Socios Asignados</h1>
              <p>Todos los socios con mensualidades asignadas</p>
              <?php
				  include 'conexion.php';
				  $resultasignados=mysql_query("SELECT DISTINCT ApellidoP,ApellidoM,Nombre,Nick,Mensualidad FROM Socio,Mensualidad,MensualidadSocio Where MensualidadSocio.IdMensualidad=Mensualidad.IdMensualidad and MensualidadSocio.CiSo=Socio.CiSo ORDER BY Socio.ApellidoP",$db_handle);
				  if($row = mysql_fetch_array($resultasignados)){
					  echo "<center><table class='table-fill' border = '1'> ";
					  echo "<tr class='s_tr'>";
					  echo "<th class='s_th'>ApellidoP</th> ";
					  echo "<th class='s_th'>ApellidoM</th> ";
					  echo "<th class='s_th'>Nombre</th> ";
					  echo "<th class='s_th'>Nick</th> ";
					  echo "<th class='s_th'>Mensualidad</th> ";
					  echo "</tr> ";
					  do{
						  echo "<tr class='s_tr'>";
						  echo "<td class='s_td'>".$row['ApellidoP']." </td> <td class='s_td'>".$row['ApellidoM']."</td>  <td class='s_td'>".$row['Nombre']."</td> <td class='s_td'>".$row['Nick']."</td> <td class='s_td'>".$row['Mensualidad']."</td>";
						  echo "</tr>";
					  }while ($row = mysql_fetch_array($resultasignados));
				  }
			  ?>
			 </td>
             <td>
              
              
             </td>
             </tr>
            </div>
            </td>
        </tr>
        </table>
        <input type='submit' value='Imprimir' name='submit' onclick='window.print()'/>
          </center>
</body>
</html>