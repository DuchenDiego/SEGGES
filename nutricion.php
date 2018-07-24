<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<style>
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
  color:#06C;
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

input[type="text"],input[type="email"]{
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
#menu li a ,#menu li span
{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:12px;
}

#menu

{
	list-style:none;
	width:200px;
}
#menu > li{
	  float: none;
	  overflow:visible;
	  padding:0;
	}
	
	#menu > li a,#menu > li span{
	  padding: .7em 0 .7em 2em;
	  float: left;
	  text-decoration: none;
	  color: #eee;
	  position: relative;
	  background-color: #333;
	  width:100%;
	  display:block;
	  padding-left:1em;
	  
	  border-bottom:1px solid #555;
	  border-top:1px solid #000;
	}
	
	#menu > li:first-child a,#menu > li:first-child span{
	  border-top:2px solid #333;
	}
	#menu > li:last-child a,#menu > li:last-child span{
	  -moz-border-radius: 0 0 0 35px;
	  -webkit-border-radius: 0 0 0 35px;
	  border-radius: 0 0 0 35px;
	  border-bottom:2px solid #333;
	}
	
	#menu > li:hover span
	{
		background:#000;
		color:#F90;
	}
	#menu > li:hover span::after{
	  border-left-color: #000;
	}
	
	#menu > li a:hover{
	  background: #000;
	  color:#fff;
	  cursor:pointer;
	}
	#menu > li span:hover
	{
		background: #000;
	  	color:#fff;
		cursor:default;
	}
	
	#menu > li a::after,
	#menu > li a::before{
	  content: "";
	  position: absolute;
	  top: 50%;
	  margin-top: -1.5em;   
	  border-top: 1.5em solid transparent;
	  border-bottom: 1.5em solid transparent;
	  border-left: 1em solid;
	  right: -1em;
	}
	#menu > li span::after,
	#menu > li span::before{
	  content: "";
	  position: absolute;
	  top: 50%;
	  margin-top: -1.5em;   
	  border-top: 1.5em solid transparent;
	  border-bottom: 1.5em solid transparent;
	  border-left: 1em solid;
	  right: -1em;
	}
	
	#menu > li a::after,#menu > li span::after{ 
	  z-index: 2;
	  border-left-color: #333;  
	}
	
	#menu > li a::before,#menu > li span::before{
	  border-left-color: #333;  
	  right: -1.1em;
	  z-index: 1; 
	}
	
	#menu > li a:hover::after,#menu > li span:hover::after{
	  border-left-color: #000;
	}

	
#menu li > ul{
	  background:transparent;
	  overflow:visible;
	  list-style:none;
	  left:96%;
	  display:none;
	  padding:0;
	  margin:0;
	  width:700px;
	}
	
	#menu > li:hover ul{ display:block;}	
	
	#menu ul li{
	  overflow:visible;
	  float:left;
	}
	#menu > li > ul > li a{
	  float:none;
	  display:block;
	  width:auto;
	  padding: .6em 1em .6em 3em;
	  text-decoration: none;
	  color: #eee;
	  position: relative;
	  background-color: #333;
	   -moz-border-radius: 0 0 0 70px;
	  -webkit-border-radius: 0 0 0 70px;
	  border-radius: 0 0 0 70px;
	  text-align:center;
	}
	
	#menu > li ul > li:first-child a,#menu > li ul > li:last-child a{
	  padding-left: 2em;
	  -moz-border-radius: 0 0 0 70px;
	  -webkit-border-radius: 0 0 0 70px;
	  border-radius: 0 0 0 70px;
	}
	#menu > li  ul > li a:hover{
	  background: #000;
	  color:#F90;
	}
	
	#menu > li ul > li a::after,
	#menu > li ul > li a::before{
	  content: "";
	  position: absolute;
	  top: 50%;
	  margin-top: -1.5em;   
	  border-top: 1.5em solid transparent;
	  border-bottom: 1.5em solid transparent;
	  border-left: 1em solid #333;
	  right: -1em;
	}
	
	#menu > li ul > li a::after{ 
	  z-index: 2;
	  border-left-color: #333;
	}
	
	#menu > li ul > li a::before{
	  border-left-color: #aaa;  
	  right: -1.1em;
	  z-index: 1; 
	}
	
	#menu > li ul > li a:hover::after{
	  border-left-color: #000;
	}
#general .seccionmenu
{
    width:100%;
    height:500px;
}
#general .central{

    width:100%;
    height:700px;
}
#general{
    width: 98%;
 	height: 1200px;
	overflow: hidden;
	
}
#content {
	margin-top:10%;
	border:none;
	width:100%;
	height:70%;
	}
</style>
</head>
<body>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div id="general">
<div class="seccionmenu">
	<h1>Para Dieta Balanceada</h1>
              <p>-Toma frutas y hortalizas... a diario</p>
<p>Casi todas las organizaciones sanitarias recomiendan consumir un mínimo de cinco raciones de frutas y hortalizas al día en adultos. Nuevos datos confirman que a más consumo de frutas y hortalizas, mejor para la salud.</p>
<hr>
<p>-Reduce tu consumo de sal: toma menos procesados</p>
<p>Solo del 25% al 30% de la cantidad de sal se añade en el hogar, el resto está "escondida" en multitud de alimentos que se ingieren a diario: panadería, bollería, cárnicos y derivados, salsas, quesos, comida rápida, vegetales en conserva, sopas listas para tomar, etc.</p>
<hr>
<p>-Toma más legumbres y frutos secos</p>
<p>Los expertos en nutrición no cesan de insistir en que se incorporen legumbres en los menús lo más a menudo posible. Los beneficios para la salud del corazón están fuera de duda.</p>
<hr>
    <div class="central">
              <h1>Para Ganancia de Masa Muscular</h1>
 <p>-Consume proteina: </p>
<p>En el desarrollo muscular es importante tomar proteina, al menos 1gr por kilo de peso aunque en entrenamientos intensos se deben ingerir hasta 2 gr por kilo de peso corporal, lo necesitas para regenerar las miofibrillas musculares rotas en el entrenamiento.</p>
<hr>
<p>-Consume hidratos:</p>
<p>Cuando alguien quiere ganar músculo hay que comer hidratos suficientes, recomendándose entre 3 y 4 gr de hidratos por kilo de peso coporal, lo necesitas para estar cargado de energía y poder realizar entrenamientos intensos y exigentes, además de recuperar el músculo más fácilmente.</p>
<hr>
<p>-Bebe agua:</p>
<p>Nunca nos cansaremos de decir que hay que beber agua antes, durante y después del entreno, la deshidratación, por muy poca que sea, afecta a la capacidad atlética del individuo y al físico en general, además los músculos se componen de más de un 60% de agua.</p>
    </div>
</div>
</body>
</html>