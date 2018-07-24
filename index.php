<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['submit']))
{
	//guardar las variables de las cajas de texto
	$nick=$_POST['nick'];
	$pass=$_POST['password'];
	//incluir el arcvihvo conexion.php
	include 'conexion.php';
	if($db_found){
		//query para verificar el usuario
		$sql="SELECT * FROM Socio WHERE Nick='".$nick."' AND Pass='".$pass."'";
		//guardamos en result si se ejecuto el query
		$result=mysql_query($sql,$db_handle);
		//guardamos en result si el query se ejecuto y encontro registros
		$num_rows=mysql_num_rows($result);
		//si se obtuvo resultado, es decir registros
		if($result){// mientras tengamos registros o filas en el arreglo
		while($num_rows = mysql_fetch_array($result))
			{//guardamos en las variables correspondientes las columnas nick,apellido, o cualquiera que lo desee
				$nick=$num_rows['Nick'];
				//$apellido=$num_rows['apellido'];
				$tipo=$num_rows['Tipo'];
				$estado=$num_rows['Estado']; 
				//requerir el archivo que inicia la sesion para el usuario
				require_once("sesion.class.php");
				//crear una nueva instancia de la sesion 
				$sesion=new session();
				//setear la variable usuario con la variable nick para el inicio de sesion
				$sesion->set("usuario",$nick);
				if($estado ==='deshabilit'){
					header("Location:index.php");
				}else{
				if($tipo =='admin'){
					header("Location:menu.php");
				}
				else if($tipo == 'atleta'){
					header("Location:menu.php");
				}
				
				else{
					print "Usuario Sin Permisos";
				}
				}
			}
		}else{echo "Usuario Inexistente";}
	}else{echo "Error de conexion Base de datos no encontrada";}
}
//mysql_close($db_handle);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="EstiloLogin2.css" type="text/css"/>
<script>
$(document).ready(function() {

    var state = false;

    //$("input:text:visible:first").focus();

    $('#accesspanel').on('submit', function(e) {

        e.preventDefault();

        state = !state;

        if (state) {
            document.getElementById("litheader").className = "poweron";
            document.getElementById("go").className = "";
            document.getElementById("go").value = "Initializing...";
        }else{
            document.getElementById("litheader").className = "";
            document.getElementById("go").className = "denied";
            document.getElementById("go").value = "Access Denied";
        }

    });

});
/*Funcion de array para leer datos(posterior prueba de  seguridad para el logeo automatizado de 30 o 20 usuarios)*/
/*function ingresar(){
	var datos=['A','B'];
	//var persona=[{Usuario:'Admin',Password:147}];
	tam=datos.length;
	for(i=0;i<tam;i++){
			document.getElementById.(datos[i]);
		}
	}*/
/*funcion randomica*/
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
var randcarac=rand_code(caracteres,longitud);

/*llenado*/
function testseguridad(){
	var v=new Array(10);
		var i;
		for(i=0;i<=v.length;i++){
			document.getElementById('txtnick').value=randcarac;
			document.getElementById('txtpass').value=randcarac;
			document.getElementById('accesspanel').submit();
			}
}	
</script>
<title></title>
</head>
<body onload="testseguridad();">
	<div class="background-wrap">
  	<div class="background"></div>
	</div>
	<form id="accesspanel" name="form1" method="post" action="Index.php">
    
    <h1 id="litheader">SeGes</h1>
    <div class="inset">
  	<p>
    	 <input type="text" id="txtnick" name="nick" maxlength="20" placeholder="NickSocio" required/>
    </p>
    <p>  
         <input type="password" id="txtpass" name="password" maxlength="20" placeholder="Codigo Acceso"  required/>   
    </p>
    <!-- <div style="text-align: center;">
      <div class="checkboxouter">
        <input type="checkbox" name="rememberme" id="remember" value="Remember">
        <label class="checkbox"></label>
      </div>
      <label for="remember">Remember me for 14 days</label>
    </div>-->
    <input class="loginLoginValue" type="hidden" name="service" value="login" />
  </div>
  <p class="p-container">
     <input type="submit" name="submit" id="go" value="Log in"/>
    </p>  
    </form>    
</body>
</html>
