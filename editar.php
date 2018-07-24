<?php
error_reporting(E_ERROR);
require_once("sesion.class.php");
$usuario =$_REQUEST['socioid'];;

    ?>
<html>
<head>
    <title>
    </title>
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
.aux{
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
</head>
<body>
<center>
    <form name="form1" method="POST" action="" enctype="multipart/form-data">
        <?php
		error_reporting(E_ERROR);
            include 'conexion.php';
if($db_found)
{
    $SQL="SELECT * FROM Socio where CiSo ='".$usuario."'";
    $result = mysql_query($SQL,$db_handle);
    $num_rows = mysql_num_rows($result);
    if ($result)
    {
        if ($num_rows > 0)
        {
            while($num_rows=mysql_fetch_array($result))
            {
				echo "<input type=\"hidden\" name=\"ciso\" value=".$usuario." id=\"ciso\"/>";
                echo"<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
				  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
				  <div class='wrapper'>
				  <h1>Edicion de Datos</h1>
				  <p>Campos con<img src='requerido.png' style='width:20px; height:20px;'> Son Obligatorios</p>
				<label for='nick'>Nick <img src='requerido.png' style='width:20px; height:20px;'></label>
            	<input type='text' name='nick' class='form-input' value='".$num_rows['Nick']."' required readonly />
                <label for='nombre'>Nombre <img src='requerido.png' style='width:20px; height:20px;'></label>
                <input type='text' name='nombre' class='form-input' value='".$num_rows['Nombre']."' title='No se pueden ingresar números ni caracteres especiales'required formnovalidate pattern='^[a-zA-Z][a-zA-Z-_\.]{1,20}$'/>
                <label for='apellidop'>ApellidoPaterno <img src='requerido.png' style='width:20px; height:20px;'></label>
                <input type='text' name='apellidop' value='".$num_rows['ApellidoP']."' class='form-input' title='No se pueden ingresar números ni caracteres especiales'required formnovalidate pattern='^[a-zA-Z][a-zA-Z-_\.]{1,20}$'/>
             	<label for='apellidom'>ApellidoMaterno <img src='requerido.png' style='width:20px; height:20px;'></label>
                <input type='text' name='apellidom' value='".$num_rows['ApellidoM']."' class='form-input' title='No se pueden ingresar números ni caracteres especiales' required formnovalidate pattern='^[a-zA-Z][a-zA-Z-_\.]{1,20}$'/>
                <label for='password'>Password <img src='requerido.png' style='width:20px; height:20px;'></label>
                <input type='password' name='password' value='".$num_rows['Pass']."' class='form-input' required />
                <label for='password1'>Repita su Password <img src='requerido.png' style='width:20px; height:20px;'></label>
                <input type='password' name='password1' value='".$num_rows['Pass']."' class='form-input' required />
                <label for='celular'>Celular</label>
                <input type='number' name='celular' class='form-input' min='1' value='".$num_rows['Celular']."' title='No se pueden ingresar letras ni caracteres especiales'/>
                <label for='direccion'>Direccion</label>
                <input type='text' name='direccion' value='".$num_rows['Direccion']."' />
                <label for='email'>Email</label>
                <input  type='email' name='email' value='".$num_rows['Email']."'/>
                <!------------------->
                <table>
                <tr>
                <td>
                <label for='entrenador'>Es Entrenador </label>
                <!-- .slideTwo -->
                <div class='slideTwo'>  
                  <input type='checkbox' value='None' id='slideTwo' name='entrenador' checked />
                  <label for='slideTwo'></label>
                </div>
                <!-- end .slideTwo -->
                </td>
                <td>
                 <label for='genero'>Genero <img src='requerido.png' style='width:20px; height:20px;'></label>
                <div class='dropdown dropdown-dark'>
                <select name='genero' class='dropdown-select'>
                <option value='Masculino'>Masculino</option>
                <option value='Femenino'>Femenino</option>
                </select>
                </div>
                </td>
                </tr>
                </table>
                <label for='latencia'>Latencia</label>
                <input  type='number' name='latencia' min='1' value='".$num_rows['Latencia']."' title='No se pueden ingresar letras ni caracteres especiales'/>
                <label for='edad'>Edad <img src='requerido.png' style='width:20px; height:20px;'></label>
                <input  type='number' name='edad' class='form-input' min='16' value='".$num_rows['Edad']."' max='80' title='No se pueden ingresar letras ni caracteres especiales' required/>
              ";

            }
        }

        }
    else{
            echo ("No se encontro la base de datos");
    }
}
        if (isset($_POST['submit1']))
        {
			$ciso= $_POST['ciso'];
            $nick = $_POST['nick'];
            $password = $_POST['password'];
			$password1=$_POST['password1'];
            $nombre =$_POST['nombre'];
            $apellidop =$_POST['apellidop'];
            $apellidom =$_POST['apellidom'];
            $email =$_POST['email'];
            $direccion =$_POST['direccion'];
			$latencia =$_POST['latencia'];
			$edad =$_POST['edad'];
			$genero =$_POST['genero'];
			$celular =$_POST['celular'];
            if($password == $password1)
            {
                include 'conexion.php';
                if ($db_found)
                {
					if(isset($_POST['entrenador'])){
						mysql_query("update IGNORE Socio set Nick='".$nick."',Nombre='".$nombre."',ApellidoP='".$apellidop."',ApellidoM='".$apellidom."',Pass='".$password."',Celular='".$celular."',Direccion='".$direccion."',Email='".$email."',Entrenador='si',Latencia='".$latencia."',Edad='".$edad."',Genero='".$genero."',Celular='".$celular."' where CiSo='".$ciso."'",$db_handle);
					}
					else{
                    mysql_query("update IGNORE Socio set Nick='".$nick."',Nombre='".$nombre."',ApellidoP='".$apellidop."',ApellidoM='".$apellidom."',Pass='".$password."',Celular='".$celular."',Direccion='".$direccion."',Email='".$email."',Entrenador='no',Latencia='".$latencia."',Edad='".$edad."',Genero='".$genero."',Celular='".$celular."' where CiSo='".$ciso."'",$db_handle);
					}
					
                    echo '<link rel="stylesheet" href="EstiloModal.css" type="text/css"/>';
					echo '<form name="form2" method="post" action="modificacion.php">
						
						<div class="modal-wrapper" id="popup">
						<div class="popup-contenedor">
						<a class="popup-cerrar" href="modificacion.php">X</a>
							<h2>Socio Modificado!!</h2>
							<input type="submit" class="botonlogin" value="Aceptar" />
							
							
						</div>
					</div>';

                }
                else
                {
                    echo 'error';
                }

            }
            else
            {
                echo '<link rel="stylesheet" href="EstiloModal.css" type="text/css"/>';
				echo '<form name="form2" method="post" action="modificacion.php">
			
				  <div class="modal-wrapper" id="popup">
				  <div class="popup-contenedor">
				  <a class="popup-cerrar" href="registro.php">X</a>
					  <h2>Las Contraseñas no Coinciden!!</h2>
					  <input type="submit" class="botonlogin" value="Aceptar" />
					  
					  
				  </div>
			  </div>';
            }
        }
        mysql_close($db_handle);
        ?>
               <input type="submit" value="Guardar cambios" name="submit1"/>
        <br />
        <input type="button" class="aux"  onClick="location.href='modificacion.php'" value="Volver" />
    </form>
</center>
</body>
</html>

