<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>
body {
  padding: 50px 0px;
  text-align: center;
  background-color: #0F0F0F;
}

p {
  font-family: "Lato", sans-serif;
  color: #6b2b03;
}

.btn-animate {
  text-decoration: none;
  font-family: "Lato", sans-serif;
  color: #FFF;
  position: relative;
  display: inline-block;
  margin: 0 auto;
  width: 200px;
  height: 50px;
  overflow: hidden;
}
.btn-animate > svg {
  position: absolute;
  top: 0;
  left: 0;
  width: 200px;
  height: 50px;
  stroke-width: 8px;
  stroke: #F9690E;
  stroke-linecap: round;
  fill: transparent;
}
.btn-animate > span {
  color: #F9690E;
  width: 200px;
  height: 50px;
  display: inline-block;
  text-align: center;
  font-size: 20px;
  position: absolute;
  left: 0;
  top: 0;
  line-height: 2.3;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
}
.btn-animate > span:after {
  position: absolute;
  content: 'Ir!';
  color: #F9690E !important;
  top: 0;
  left: -100%;
  width: 200px;
  height: 50px;
  color: #0F0F0F;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
}
.btn-animate > span:before {
  position: absolute;
  content: '';
  height: 50px;
  z-index: 0;
  width: 50px;
  background-color: #F9690E;
  border-radius: 50%;
  top: 0;
  left: -63%;
  -webkit-transition: all .4s ease;
  transition: all .4s ease;
  -webkit-transform: scale(0);
          transform: scale(0);
  opacity: 0;
}
.btn-animate:hover > svg {
  -webkit-animation: 1s pencil linear forwards;
          animation: 1s pencil linear forwards;
}
.btn-animate:hover > span {
  left: 100%;
}
.btn-animate:hover > span:after {
  left: -100%;
}

.ripple-effect {
  position: absolute;
  width: 50px;
  height: 50px;
  border: 1px solid #F9690E;
  -webkit-animation: ripple-animation 2.5s;
          animation: ripple-animation 2.5s;
}

@-webkit-keyframes pencil {
  0% {
    stroke-dasharray: 300;
    stroke-dashoffset: 700;
    stroke-width: 8px;
  }
  75% {
    stroke-dasharray: 900;
    stroke-dashoffset: 400;
    stroke-width: 1px;
    fill: transparent;
  }
  100% {
    stroke-dasharray: 900;
    stroke-dashoffset: 400;
    stroke-width: 1px;
    fill: #191919;
  }
}

@keyframes pencil {
  0% {
    stroke-dasharray: 300;
    stroke-dashoffset: 700;
    stroke-width: 8px;
  }
  75% {
    stroke-dasharray: 900;
    stroke-dashoffset: 400;
    stroke-width: 1px;
    fill: transparent;
  }
  100% {
    stroke-dasharray: 900;
    stroke-dashoffset: 400;
    stroke-width: 1px;
    fill: #191919;
  }
}
@-webkit-keyframes ripple-animation {
  from {
    -webkit-transform: scale(0.5);
            transform: scale(0.5);
    opacity: 1;
  }
  to {
    -webkit-transform: scale(30);
            transform: scale(30);
    opacity: 0;
  }
}
@keyframes ripple-animation {
  from {
    -webkit-transform: scale(0.5);
            transform: scale(0.5);
    opacity: 1;
  }
  to {
    -webkit-transform: scale(30);
            transform: scale(30);
    opacity: 0;
  }
}
/**2do Boton***/
.btn-animate2 {
  text-decoration: none;
  font-family: "Lato", sans-serif;
  color: #FFF;
  position: relative;
  display: inline-block;
  margin: 0 auto;
  width: 200px;
  height: 50px;
  overflow: hidden;
}
.btn-animate2 > svg {
  position: absolute;
  top: 0;
  left: 0;
  width: 200px;
  height: 50px;
  stroke-width: 8px;
  stroke: #00C78C;
  stroke-linecap: round;
  fill: transparent;
}
.btn-animate2 > span {
  color: #00C78C;
  width: 200px;
  height: 50px;
  display: inline-block;
  text-align: center;
  font-size: 20px;
  position: absolute;
  left: 0;
  top: 0;
  line-height: 2.3;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
}
.btn-animate2 > span:after {
  position: absolute;
  content: 'Ir!';
  color: #00C78C !important;
  top: 0;
  left: -100%;
  width: 200px;
  height: 50px;
  color: #00C78C;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
}
.btn-animate2 > span:before {
  position: absolute;
  content: '';
  height: 50px;
  z-index: 0;
  width: 50px;
  background-color: #F9690E;
  border-radius: 50%;
  top: 0;
  left: -63%;
  -webkit-transition: all .4s ease;
  transition: all .4s ease;
  -webkit-transform: scale(0);
          transform: scale(0);
  opacity: 0;
}
.btn-animate2:hover > svg {
  -webkit-animation: 1s pencil linear forwards;
          animation: 1s pencil linear forwards;
}
.btn-animate2:hover > span {
  left: 100%;
}
.btn-animate2:hover > span:after {
  left: -100%;
}

.ripple-effect2 {
  position: absolute;
  width: 50px;
  height: 50px;
  border: 1px solid #00C78C;
  -webkit-animation: ripple-animation 2.5s;
          animation: ripple-animation 2.5s;
}
</style>
<script>
(function (window, $) {
  
  $(function() {

    $('.ripple').on('click', function (event) {
      event.preventDefault();
      
      var $div = $('<div/>'),
          btnOffset = $(this).offset(),
      		xPos = event.pageX - btnOffset.left,
      		yPos = event.pageY - btnOffset.top;

      $div.addClass('ripple-effect');
      var $ripple = $(".ripple-effect");
      
      $ripple.css("height", $(this).height());
      $ripple.css("width", $(this).height());
      $div
        .css({
          top: yPos - ($ripple.height()/2),
          left: xPos - ($ripple.width()/2),
          background: $(this).data("ripple-color")
        }) 
        .appendTo($(this));

      window.setTimeout(function(){
        $div.remove();
      }, 2500);
    });
    
  });
  
})(window, jQuery);
</script>
<>
</head>
<body>
<p>Escoja una opcion</p>
<a href="musculacion.php" class="btn-animate ripple">
  <svg>
    <rect class="shape" height="50" width="200" />
  </svg>
  <span>Musculacion</span>
</a><br />
<br />
<br />
<br />
<br />
<br />

<p style=" color: #00C78C !important;">O Tambien</p>
<a href="cardio.php" class="btn-animate2 ripple">
  <svg>
    <rect class="shape" height="50" width="200" />
  </svg>
  <span>Cardio</span>
</a>
</body>
</html>