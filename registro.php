<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['submit1'])){
	$nick=$_POST['nick'];
	$nombre=$_POST['nombre'];
	$apellidop=$_POST['apellidop'];
	$apellidom=$_POST['apellidom'];
	$password=$_POST['password'];
	$password1=$_POST['password1'];
	$celular=$_POST['celular'];
	$direccion=$_POST['direccion'];
	$email=$_POST['email'];
	$latencia=$_POST['latencia'];
	$edad=$_POST['edad'];
	$genero=$_POST['genero'];
	if($password==$password1){
		include 'conexion.php';
		if($db_found){
			$queryver="SELECT * FROM Socio WHERE Nick='".$nick."'";
			$resver=mysql_query($queryver,$db_handle);
			if(mysql_num_rows($resver)>0){
				echo '<link rel="stylesheet" href="EstiloModal.css" type="text/css"/>';
			echo '<form name="form3" method="post" action="registro.php">
		
		<div class="modal-wrapper" id="popup">
		<div class="popup-contenedor">
		<a class="popup-cerrar" href="registro.php">X</a>
			<h2>Error: Socio Encontrado con el Nick ingresado<br>Introduzca un Nick diferente</h2>
			<input type="submit" class="botonlogin" value="Aceptar" />
			
			
		</div>
	</div>

';
			}
			else{
			//include 'subirfoto.php';
			if(isset($_POST['entrenador'])){
				mysql_query("INSERT INTO Socio(CiSo,Nick,Pass,Nombre,ApellidoP,ApellidoM,Direccion,Email,Entrenador,Latencia,Estado,Edad,Genero,Celular,Tipo) values ('','".$nick."','".$password."','".$nombre."','".$apellidop."','".$apellidom."','".$direccion."','".$email."','si','".$latencia."','habilitado','".$edad."','".$genero."','".$celular."','atleta')",$db_handle);
			}else{
				mysql_query("INSERT INTO Socio(CiSo,Nick,Pass,Nombre,ApellidoP,ApellidoM,Direccion,Email,Entrenador,Latencia,Estado,Edad,Genero,Celular,Tipo) values ('','".$nick."','".$password."','".$nombre."','".$apellidop."','".$apellidom."','".$direccion."','".$email."','no','".$latencia."','habilitado','".$edad."','".$genero."','".$celular."','atleta')",$db_handle);
			}
			
			echo '<link rel="stylesheet" href="EstiloModal.css" type="text/css"/>';
			echo '<form name="form2" method="post" action="registro.php">
		
		<div class="modal-wrapper" id="popup">
		<div class="popup-contenedor">
		<a class="popup-cerrar" href="registro.php">X</a>
			<h2>Socio Agregado!!</h2>
			<input type="submit" class="botonlogin" value="Aceptar" />
			
			
		</div>
	</div>

';
		}
		}
		else{
			echo "Base de datos no encontrada";
		}
		mysql_close($db_handle);
	}
	else{
		echo '<link rel="stylesheet" href="EstiloModal.css" type="text/css"/>';
			echo '<form name="form2" method="post" action="registro.php">
		
		<div class="modal-wrapper" id="popup">
		<div class="popup-contenedor">
		<a class="popup-cerrar" href="registro.php">X</a>
			<h2>!!Error!!</h2>
			<h3>Passwords Diferentes</h3>
			<input type="submit" class="botonlogin" value="Volver" />
			
			
		</div>
	</div>

';
	}
}
else{
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro</title>
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
  margin-left:10%;
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

input[type="text"],input[type="email"],input[type="number"],input[type="password"]{
  width:98%;
  height:10px;
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
  height: 30px;
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
/***CheckBoxes***/
/* .slideTwo */
.slideTwo {
  width: 80px;
  height: 30px;
  background: #333;
  margin: 20px auto;
  position: relative;
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 0.2);
}
.slideTwo:after {
  content: '';
  position: absolute;
  top: 14px;
  left: 14px;
  height: 2px;
  width: 52px;
  background: #111;
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 0.2);
}
.slideTwo label {
  display: block;
  width: 22px;
  height: 22px;
  cursor: pointer;
  position: absolute;
  top: 4px;
  z-index: 1;
  left: 4px;
  background: #fcfff4;
  border-radius: 50px;
  -webkit-transition: all 0.4s ease;
  transition: all 0.4s ease;
  box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.3);
  background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  background: linear-gradient(to bottom, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
}
.slideTwo label:after {
  content: '';
  width: 10px;
  height: 10px;
  position: absolute;
  top: 6px;
  left: 6px;
  background: #333;
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px black, 0px 1px 0px rgba(255, 255, 255, 0.9);
}
.slideTwo input[type=checkbox] {
  visibility: hidden;
}
.slideTwo input[type=checkbox]:checked + label {
  left: 54px;
}
.slideTwo input[type=checkbox]:checked + label:after {
  background: #27ae60;
  /*activeColor*/
}
label{
	color:#6E6E6E;
}

/* end .slideTwo */
</style>
<!--Script para el calculo de diferencia de tiempo desde carga hasta click de submit-->
<script type="text/javascript">
/*Funcion de tiempo para calcular la diferencia desde que carga hasta que se hace click al submit*/
	var inicio=(new Date()).getTime();
	function tiempo(){
		var despues=(new Date()).getTime();
		var segs=(despues-inicio)/1000;
		alert(segs);
		}
/*Funcion para cambiar el texto de un campo Onload */
	function escribir(){
		document.getElementById('txtnick').value='pepito';
		}
		
/*Funcion para caracteres randomicos personalizados*/
function rand_code(chars, lon){
code = "";
for (x=0; x < lon; x++)
{
rand = Math.floor(Math.random()*chars.length);
code += chars.substr(rand, 1);
}
return code;
}

caracteres = "0123456789abcdefABCDEF";
longitud = 10;

numeros="0123456789";
letras="abcdefABCDEF";
email="0123456789abcdefABCDEF@.";
var randcarac=rand_code(caracteres,longitud);
var randnum=rand_code(numeros,longitud);
var randletr=rand_code(letras,longitud);
var randemail=rand_code(email,longitud);

/*funcion para llenar los campos*/
	function testregistro(){
		var v=new Array(10);
		var i;
		var password=randcarac;
		for(i=0;i<=v.length;i++){
			document.getElementById('txtnick').value=randcarac;
			document.getElementById('txtnombre').value=randletr;
			document.getElementById('txtappat').value=randletr;
			document.getElementById('txtapmat').value=randletr;
			document.getElementById('txtpass').value=password;
			document.getElementById('txtpassrep').value=password;
			document.getElementById('txtcel').value=numeros;
			document.getElementById('txtdir').value=randletr;
			document.getElementById('txtemail').value=randemail;
			document.getElementById('txtlat').value=randnum;
			document.getElementById('txtedad').value=randnum;
			document.getElementById('registro').submit();
			}
		}
</script>
</head>
<body onLoad="">
	<center>
    	<section>
         <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
            <div class="wrapper">
              <h1>Registro de Socio</h1>
              <p>Campos con<img src="requerido.png" style="width:20px; height:20px;"> Son Obligatorios</p>
        	  <form name="form1" id="registro" method="post"  action="registro.php" enctype="multipart/form-data">
            	<label for="nick">Nick <img src="requerido.png" style="width:20px; height:20px;"></label>
            	<input type="text" name="nick" id="txtnick" class="form-input" required />
                <label for="nombre">Nombre <img src="requerido.png" style="width:20px; height:20px;"></label>
                <input type="text" name="nombre" class="form-input" id="txtnombre" title="No se pueden ingresar números ni caracteres especiales"required formnovalidate pattern="^[a-zA-Z][a-zA-Z-_\.]{1,20}$"/>
                <label for="apellidop">ApellidoPaterno <img src="requerido.png" style="width:20px; height:20px;"></label>
                <input type="text" name="apellidop" class="form-input" id="txtappat" title="No se pueden ingresar números ni caracteres especiales"required formnovalidate pattern="^[a-zA-Z][a-zA-Z-_\.]{1,20}$"/>
             	<label for="apellidom">ApellidoMaterno <img src="requerido.png" style="width:20px; height:20px;"></label>
                <input type="text" name="apellidom" class="form-input" id="txtapmat" title="No se pueden ingresar números ni caracteres especiales" required formnovalidate pattern="^[a-zA-Z][a-zA-Z-_\.]{1,20}$"/>
                <label for="password">Password <img src="requerido.png" style="width:20px; height:20px;"></label>
                <input type="password" name="password" id="txtpass" class="form-input" required />
                <label for="password1">Repita su Password <img src="requerido.png" style="width:20px; height:20px;"></label>
                <input type="password" name="password1" id="txtpassrep" class="form-input" required />
                <label for="celular">Celular</label>
                <input type="number" name="celular" class="form-input" id="txtcel" min="1" title="No se pueden ingresar letras ni caracteres especiales"/>
                <label for="direccion">Direccion</label>
                <input type="text" id="txtdir" name="direccion" />
                <label for="email">Email</label>
                <input  type="email" id="txtemail" name="email"/>
                <!------------------->
                <table>
                <tr>
                <td>
                <label for="entrenador">Es Entrenador </label>
                <!-- .slideTwo -->
                <div class="slideTwo">  
                  <input type="checkbox" value="None" id="slideTwo" name="entrenador" checked />
                  <label for="slideTwo"></label>
                </div>
                <!-- end .slideTwo -->
                </td>
                <td>
                 <label for="genero">Genero <img src="requerido.png" style="width:20px; height:20px;"></label>
                <div class="dropdown dropdown-dark">
                <select name="genero" class="dropdown-select">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                </select>
                </div>
                </td>
                </tr>
                </table>
                <label for="latencia">Latencia</label>
                <input  type="number" name="latencia" id="txtlat" min="1" title="No se pueden ingresar letras ni caracteres especiales"/>
                <label for="edad">Edad <img src="requerido.png" style="width:20px; height:20px;"></label>
                <input  type="number" name="edad" class="form-input" id="txtedad" min="16" max="80" title="No se pueden ingresar letras ni caracteres especiales" required/>
                <!-- Prueba tiempo con js desde carga de pagina hasta el click de submit Onclick-->
                <input type="submit" class="submit" name="submit1" value="Guardar" onClick="tiempo();" />
            </form>
            </div>
        </section>
    </center>
</body>
</html>
<?php } ?>