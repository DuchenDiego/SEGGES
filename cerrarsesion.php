<?php
require_once("sesion.class.php");

$sesion = new session();
$usuario = $sesion->get("usuario");
if( $usuario == false )
{
    header("Location: index.php");
}
else
{
    $usuario = $sesion->get("usuario");
    $sesion->terminar_sesion();
    header("location: index.php");
}
?>

