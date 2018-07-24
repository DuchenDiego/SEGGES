<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Index</title>
<style>
	@import url(http://fonts.googleapis.com/css?family=Oswald&subset=latin-ext);
body, html {
  width: 100%;
  text-align: center;
}
p {
  text-shadow: 1px 1px 1px white;
  font-size: 1.2em;
  font-weight: bold;
  font-family: 'Oswald', sans-serif;
  border-top: 4px dashed #555;
  width: 50%;
  padding: 2em 10%;
  margin: 0 auto;
}
html {
  height: 100%;
}
ul {
  font-family: 'Oswald', sanf-serif;
  padding: 0;
  margin: 0;
  font-size: 1.4em;
  margin: 4em auto;
  display: inline-block;
  border: 1px solid black;
  box-shadow: 2px 2px 10px 5px rgba(30, 30, 30, 0.4);
}

li {
  display: inline-block;
  padding: 0;
  position: relative;
  background: #4d4d4d;
}

ul li a {
  display: inline-block;
  width: 5em;
  text-align: center;
  border-right: 1px solid #000;
  padding: 0.5em 1em 0.7em 1em;
  text-decoration: none;
  color: #EEE;
  text-shadow: 1px 1px 3px black;
  position: relative;
}

li span {
  display: block;
  height: 0.4em;
  width: 100%;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #000;
  transition: 0.3s height ease;
}
li:last-of-type a {
  border-right: 0;
}
li:nth-of-type(1) span { background: #4048eb; }
li:nth-of-type(2) span { background: #c9a928; }
li:nth-of-type(3) span { background: #9346eb; }
li:nth-of-type(4) span { background: #e68337;}
li:nth-of-type(1):hover:after { box-shadow:  0px 3px 10px 5px #4048eb }
li:nth-of-type(2):hover:after { box-shadow:  0px 3px 10px 5px #c9a928 }
li:nth-of-type(3):hover:after { box-shadow: 0px 3px 10px 5px #9346eb }
li:nth-of-type(4):hover:after { box-shadow: 0px 3px 10px 5px  #e68337 }

li:hover span {
  height: 100%;
}
li:hover:after {
  content: "";
  display: block;
  width: 100%;
  height: 0px;
  background: red;
  position: absolute;
  bottom: 0px;
  
}
#content {
		clear: both;
		overflow-y: scroll;
		width: 97%;
		height: 1500px;
		border:none;
		border-radius:20px;
	}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
	$(document).ready(function(e) {
		$('#menu1').on('click', function(){
			
			$('#content').attr('src', 'disciplinas.php');
		});
		$('#menu2').on('click', function(){
			$('#content').attr('src', 'horarios.php');
			
		});
		$('#menu3').on('click', function(){		
			$('#content').attr('src', 'mensualidad.php');
			
		});
	});
</script>
</head>
<body>
	<ul>
  <li><span></span><a id="menu1" >Disciplinas</a></li><li>
  <span></span><a id="menu2" >Horarios</a></li><li>
  <span></span><a id="menu3" >Mensualidad</a></li>
  </ul>
	<iframe id="content" allowtransparency="1" scrolling="auto"> No Soporta iFrames</iframe>
</body>
</html>