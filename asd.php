<?php if(isset($_POST['submit1'])){
$checked=(isset($_POST['entrenador']));
if($checked){
	echo "presionado";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<form class="form"name="form1" method="post" action="registro.php" enctype="multipart/form-data">
            <fieldset class="Registro">
            <p><h1>Registro</h1></p>
                <tr>
                <td><label>Es Entrenador:</label></td>
                <td><input  type="checkbox" name="entrenador" />
                </td>
                </tr>
                <tr>
                <td colspan="2">
                <input type="submit" class="button" name="submit1" value="Guardar" /></td>
                </tr>
            </table>
            </fieldset>
            </form>
</body>
</html>
<?php } ?>