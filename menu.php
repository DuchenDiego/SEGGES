<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once("sesion.class.php");
$session=new session();
$usuario=$session->get("usuario");
if($usuario==false){
	header("Location:index.php");
}
else{
	?>
<html>
	<head>
		<title>SeGes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
		<style type="text/css">
		body,td,th {
	font-family: Oxygen, sans-serif;
	font-size: 13px;
}
        </style>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
		<noscript>
			<!--<link rel="stylesheet" href="css/skel-noscript.css" />-->
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
	</head>
	<body>

	<!-- Header -->
		<div id="header">
			<div class="container">
					
				<!-- Logo -->
					<div id="logo">
						<h1><a href="#">SeGes</a></h1>
						<span>Bienvenido <?php print ($usuario);?></span>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
					<?php
                          include 'conexion.php';
                          if($db_found){
                              $SQL = "SELECT * FROM Socio, Menu WHERE Socio.Tipo=Menu.Tipo and Socio.nick='$usuario'";
                              $result=mysql_query($SQL,$db_handle);
                              $num_rows=mysql_num_rows($result);
                              if($result){
                                  if($num_rows>0){
                                      echo"<ul>";
                                      while($num_rows=mysql_fetch_array($result)){
										  $destino=$num_rows['Destino'];
                                          echo "<li><a id='menuprincipal' href='".$num_rows['Destino']."' target='destino'>".$num_rows['Value']."</a></li>";
                                      }
                                  }
                                  else{
                                      print("No se pudo obtener las opciones del menu para este usuario");
                                  }
                              }
                              else{
                                  print("No se pudo conectar a la Base de Datos");
                              }
                              mysql_close($db_handle);
                          }
                          else{
                              print("No se pudo conectar al servidor");
                          }
                          ?>
                          <!--Script para la carga de iframes-->
							<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
                            <script>
                                $(document).ready(function(e) {
                                    $('#menuprincipal').on('click', function(){
                                        
                                        $('#content').attr('src', '<?php //echo $destino;?>');
                                    });
                                });
                            </script>
                          <!---->
                          <br/>
					</nav>

			</div>
            <form name="form1" method="POST">
            <input type="button" class="button"  onClick="location.href='cerrarsesion.php'" value="Cerrar Sesion" />
            </form>
		</div>
	<!-- Header -->
			
	<!-- Main -->
		<div id="main">
			<iframe name="destino" id="content" scrolling="no" allowtransparency="1"> No Soporta iFrames</iframe>
		</div>
	<!-- Main -->

	<!-- Footer -->
		<div id="footer">
			<div class="container">
				<div class="row">
					<div class="3u">
						<section>
							
						</section>				
					</div>
					<div class="6u">
						<section>
							
						</section>
					</div>
				</div>
			</div>
		</div>
	<!-- Footer -->

	<!-- Copyright -->
	<div id="copyright">
			<div class="container">
				Estudiante: <a href="http://1.bp.blogspot.com/-K0ieSNYmlxo/T9UhPGEwmzI/AAAAAAAAC40/FfD_lORsPPA/s1600/4759535950_7bca6684c8_b.jpg">Duchen Ibañez Brad Diego</a>Taller: <a >Programacion 2</a>
			</div>
		</div>

	</body>
</html>
<?php } ?>