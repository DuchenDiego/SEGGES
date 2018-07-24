<?php 
include 'conexion.php';
require_once("sesion.class.php");
$session=new session();
$usuario=$session->get("usuario");
$aux2=mysql_query("SELECT * FROM Socio Where Nick='".$usuario."'",$db_handle);
$resaux=mysql_fetch_array($aux2);
	if($db_found){
		$SQL = "SELECT * FROM Socio WHERE Nick='".$usuario."'";
		$result=mysql_query($SQL ,$db_handle);
		$filasocio=mysql_fetch_array($result);
		$SQL2= "SELECT * FROM AvancePersonal WHERE CiSo='".$filasocio['CiSo']."' ORDER BY Fecha ";
		$result2=mysql_query($SQL2,$db_handle);
		$SQL3= "SELECT * FROM Ejercicios WHERE CiSo='".$filasocio['CiSo']."' ORDER BY Fecha ";
		$result3=mysql_query($SQL3,$db_handle);
		//$filavance=mysql_fetch_array($result2);
	}		
	  if(isset ($_POST['submit1'])){
		$peso=$_POST['peso'];
		$altura=$_POST['altura'];
		$fecha=$_POST['fechaavance'];
		$conversionmetros=$altura/100;
		$cuadradoaltura=$conversionmetros*$conversionmetros;
		$IMC=$peso/$cuadradoaltura;
		$queryver1=mysql_query("SELECT * FROM AvancePersonal WHERE CiSo='".$filasocio['CiSo']."' AND Fecha='".$fecha."'",$db_handle);
		if(mysql_num_rows($queryver1)>0){
			//mysql_query("UPDATE AvancePersonal SET Peso='".$peso.",Altura='".$altura."',IMC='".$IMC."' WHERE CiSo='".$filasocio['CiSo']."' AND Fecha='".$fecha."'",$db_handle);
			echo "
				<input type='checkbox' id='close-modal'>
				<label for='close-modal' id='btn-close-modal'></label>
				 <div class='modal'>
				   <div class='content-modal'>
				   <form name='fm' method='post' action='menuavance.php'>	
					 <h1>Registro de Avance Existente</h1>
					 <p>Escogió una fecha con un registro existente, escoja otra</p>
					  <input type='submit' value='Aceptar' />
					  </form>
				   </div>
				 </div> ";
		}else{
		mysql_query("INSERT INTO AvancePersonal(IdAp,Peso,Altura,Fecha,CiSo,IMC) VALUES ('','".$peso."','".$altura."','".$fecha."','".$filasocio['CiSo']."','".$IMC."')",$db_handle);
		echo "
				<input type='checkbox' id='close-modal'>
				<label for='close-modal' id='btn-close-modal'></label>
				 <div class='modal'>
				   <div class='content-modal'>
				   <form name='fm' method='post' action='menuavance.php'>	
					 <h1>Nuevo Registro de avance</h1>
					 <p>Se Agregó un nuevo registro de avance, consulte estadisticas para mas información</p>
					  <input type='submit' value='Aceptar' />
					  </form>
				   </div>
				 </div> ";
		
	  }
	  }
	 if(isset ($_POST['submit2'])){
		$fechaeliminar=$_POST['cmbeliminar'];
		mysql_query("DELETE FROM AvancePersonal WHERE Fecha='".$fechaeliminar."'",$db_handle);
		echo "
				<input type='checkbox' id='close-modal'>
				<label for='close-modal' id='btn-close-modal'></label>
				 <div class='modal'>
				   <div class='content-modal'>
				   <form name='fm' method='post' action='menuavance.php'>	
					 <h1>Registro de avance eliminado</h1>
					 <p>Se eliminó el registro de avance seleccionado</p>
					  <input type='submit' value='Aceptar' />
					  </form>
				   </div>
				 </div> ";
	  }
	  if(isset ($_POST['submit3'])){
		  $nombrejercicio=$_POST['nombrejercicio'];
		  $pesolevantado=$_POST['pesolevantado'];
		  $numerosets=$_POST['numerosets'];
		  $numerorepeticiones=$_POST['numerorepeticiones'];
		  $fechaejercicio=$_POST['fechaejercicio'];
		  $queryver2=mysql_query("SELECT * FROM Ejercicios WHERE CiSo='".$filasocio['CiSo']."' AND Fecha='".$fechaejercicio."'",$db_handle);
		  if(mysql_num_rows($queryver2)>0){
			//mysql_query("UPDATE AvancePersonal SET Peso='".$peso.",Altura='".$altura."',IMC='".$IMC."' WHERE CiSo='".$filasocio['CiSo']."' AND Fecha='".$fecha."'",$db_handle);
			echo "
				<input type='checkbox' id='close-modal'>
				<label for='close-modal' id='btn-close-modal'></label>
				 <div class='modal'>
				   <div class='content-modal'>
				   <form name='fm' method='post' action='menuavance.php'>	
					 <h1>Registro de Ejercicio Existente</h1>
					 <p>Escogió una fecha con un registro de ejercicio existente, escoja otra</p>
					  <input type='submit' value='Aceptar' />
					  </form>
				   </div>
				 </div> ";
		}else{
		  mysql_query("INSERT INTO Ejercicios(IdEjercicio,NombreEjercicio,PesoLevantado,NumeroSets,NumeroRepeticiones,CiSo,Fecha) VALUES ('','".$nombrejercicio."','".$pesolevantado."','".$numerosets."','".$numerorepeticiones."','".$filasocio['CiSo']."','".$fechaejercicio."')",$db_handle);
		  echo "
				<input type='checkbox' id='close-modal'>
				<label for='close-modal' id='btn-close-modal'></label>
				 <div class='modal'>
				   <div class='content-modal'>
				   <form name='fm' method='post' action='menuavance.php'>	
					 <h1>Nuevos Datos de ejercicio añadidos</h1>
					 <p>Se Agregó un nuevo registro de ejercicio, consulte estadisticas para mas información</p>
					  <input type='submit' value='Aceptar' />
					  </form>
				   </div>
				 </div> ";
		  }
	  }
	  if(isset ($_POST['submit4'])){
		$fechaeliminar2=$_POST['cmbeliminar2'];
		mysql_query("DELETE FROM Ejercicios WHERE Fecha='".$fechaeliminar2."'",$db_handle);
		echo "
				<input type='checkbox' id='close-modal'>
				<label for='close-modal' id='btn-close-modal'></label>
				 <div class='modal'>
				   <div class='content-modal'>
				   <form name='fm' method='post' action='menuavance.php'>	
					 <h1>Registro de ejercicio eliminado</h1>
					 <p>Se eliminó el registro de ejercicio seleccionado</p>
					  <input type='submit' value='Aceptar' />
					  </form>
				   </div>
				 </div> ";
	  }
/*********CHARTS************/
$querylineachart="SELECT * FROM AvancePersonal WHERE CiSo='".$resaux['CiSo']."' ORDER BY Fecha";
$resultado=mysql_query($querylineachart);
$num_rows=mysql_num_rows($resultado);
$datos[0] = array('Fecha','IMC','Peso');
for ($i=1; $i<($num_rows+1); $i++)
{
    $datos[$i] = array(mysql_result($resultado, $i-1, "Fecha"),
    (int) mysql_result($resultado, $i-1, "IMC"),(int) mysql_result($resultado, $i-1, "Peso"));
}
$querybarrachart="SELECT * FROM Ejercicios WHERE CiSo='".$resaux['CiSo']."' ORDER BY Fecha";
$resultado2=mysql_query($querybarrachart);
$num_rows2=mysql_num_rows($resultado2);
$datos2[0] = array('Fecha','PesoLevantado','NumeroSets','NumeroRepeticiones');
for ($i=1; $i<($num_rows2+1); $i++)
{
    $datos2[$i] = array(mysql_result($resultado2, $i-1, "Fecha"),
    (int) mysql_result($resultado2, $i-1, "PesoLevantado"),(int) mysql_result($resultado2, $i-1, "NumeroSets"),(int) mysql_result($resultado2, $i-1, "NumeroRepeticiones"));
}
/////////////////////////////
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" > </script>
<!-- Load the AJAX API -->
<script type="text/javascript" src="https://www.google.com/jsapi" > </script>
<script type="text/javascript"
src="https://www.google.com/jsapi?autoload={
'modules':[{
'name':'visualization',
'version':'1',
'packages':['corechart']}]}">
</script>
<!--Script para Lineas-->
<script type="text/javascript">
google.setOnLoadCallback(drawChart);
 
function drawChart() {
 
//cargamos nuestro array $datos creado en PHP para que se puede utilizar en JavaScript
var cargaDatos = <?php echo json_encode($datos); ?>;
 
var datosFinales = google.visualization.arrayToDataTable(cargaDatos);
 
var options = {
title: 'Relacion IMC-Tiempo',
'backgroundColor': '#C8C9D7',
titleTextStyle: {fontSize: 22},
colors: ['#00CC66','#3399FF','#E0E0E0','#202020'],
};
 
var chart = new google.visualization.LineChart(document.getElementById('linechart'));
 
chart.draw(datosFinales, options);
}
</script>
<!--Script-->
<script type="text/javascript">
google.setOnLoadCallback(drawChart);
 
function drawChart() {
 
//cargamos nuestro array $datos creado en PHP para que se puede utilizar en JavaScript
var cargaDatos = <?php echo json_encode($datos2); ?>;
 
var datosFinales = google.visualization.arrayToDataTable(cargaDatos);
 
var options = {
          chart: {
            title: 'Relacion Campos Ejercicio-Tiempo',
            subtitle: 'PesoLevantado, NumeroSets, and NumeroRepeticiones:',
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#1b9e77', '#d95f02', '#7570b3' ]
        };
 
var chart = new google.visualization.BarChart(document.getElementById('barchart'));
 
chart.draw(datosFinales, options);
}
</script>
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
  width:90%;
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

input[type="text"],input[type="email"],input[type="number"],input[type="date"]{
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
              <h1>Añadir Nuevo Registro</h1>
              <p>Ingrese los Datos</p>
              <form class="form" method="post" action="menuavance.php">
              <input type="number" min="40"  name="peso" placeholder="Peso(Kg)" required="required" >
              <input type="number" min="140"  name="altura" placeholder="Altura(Cm)" required="required" >
              <input type="date" min="2016-01-01" step="1" name="fechaavance" placeholder="Fecha" required="required" >
              <input type="submit" name="submit1" value="Añadir">
              </form>
              </td>
              <td align="center">
              <table>
              <tr>
              <h1>Eliminar Registro</h1>
              <p>Seleccione la fecha del registro que desea Eliminar</p>
              <form class="form" method="post" action="">
               <div class="dropdown dropdown-dark">
                <select name='cmbeliminar' class="dropdown-select">
                <?php
				while($fila=mysql_fetch_array($result2)){
	 			echo "<option  value='".$fila['Fecha']."'>".$fila['Fecha']."</option>";}
				?>
    			  </select>
                </div>
                <input name="submit2" type="submit" class="submit" value="Eliminar">
              </form>
              </tr>
             <!-- <tr>
               <h1>Indice De Masa Corporal</h1>
              <p>Su Indice de Masa Corporal Es:</p>
              <form class="form" method="post" action="">
                <input type="text" value="<?php /* $aux=mysql_query("Select max(Fecha) From AvancePersonal Where CiSo='".$resaux['CiSo']."'",$db_handle); $aux3=mysql_num_rows($aux); echo $aux3['IMC'];*/?>" >
              </form>
              </tr>-->
              <tr>
              <h1>Eliminar Registro de Ejercicio</h1>
              <p>Seleccione la fecha del registro que desea eliminar:</p>
              <form class="form" method="post" action="">
               <div class="dropdown dropdown-dark">
                <select name='cmbeliminar2' class="dropdown-select">
                <?php
				while($fila2=mysql_fetch_array($result3)){
	 			echo "<option  value='".$fila2['Fecha']."'>".$fila2['Fecha']."</option>";}
				?>
    			  </select>
                </div>
                <input name="submit4" type="submit" class="submit" value="Eliminar">
              </form>
              </tr>
              </table>
              </td>
              <td align="center" style="padding-left:5%;">
                <h1>Añadir Datos Ejercicio</h1>
              <p>Ingrese los Datos</p>
              <form class="form" method="post" action="menuavance.php">
              <input type="text"   name="nombrejercicio" placeholder="Nombre de Ejercicio" required formnovalidate pattern="^[a-zA-Z][a-zA-Z-_\.]{1,20}$">
              <input type="number" min="1" step="any"  name="pesolevantado" placeholder="Peso Levantado" required="required" >
              <input type="number" min="1"  name="numerosets" placeholder="Numero de Sets" required="required" >
              <input type="number" min="1"  name="numerorepeticiones" placeholder="Numero de Repeticiones" required="required" >
              <input type="date" min="2016-01-01" step="1" name="fechaejercicio" placeholder="Fecha" required="required" >
              <input type="submit" name="submit3" value="Registrar">
              </form>
              </td>
             <tr><br />
			 <br />
             <td colspan="2">
             <h1>Estadísticas</h1>
              <p>Relacion Indice de Masa Corporal con Tiempo</p>
              <div  id="linechart" style="width: 500px; border: 10px solid #000; border-radius:20px; height: 400px; display:inline-block"></div>
			 </td>
             <td colspan="1"><br /><br /><br /><br />
              <p>Relacion Tiempo con Peso Levantado, Numero de Sets y Repeticiones</p>
              <div  id="barchart" style="width: 500px; border: 10px solid #000; border-radius:20px; height: 400px; display:inline-block"></div>
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