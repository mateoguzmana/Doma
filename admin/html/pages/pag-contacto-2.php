<?
session_start();


if (empty($_SESSION['sesionx']))
{
?>
<script type="text/javascript">

	alert('Su sesion ha finadlizado.');
	parent.location.href=('login.php');

</script>
<?
}

include("../../includes/conexion.php");




$Id					=$_REQUEST["Id"];
$Titulo				=$_REQUEST["Titulo"];
$Subtitulo 			=$_REQUEST["Subtitulo"];
$Descripcion 		=$_REQUEST["Descripcion"];
$TituloIngles		=$_REQUEST["TituloIngles"];
$SubtituloIngles 	=$_REQUEST["SubtituloIngles"];
$DescripcionIngles	=$_REQUEST["DescripcionIngles"];


$queryka			="UPDATE Contacto set Titulo = '$Titulo', Subtitulo='$Subtitulo', Descripcion='$Descripcion', TituloEN='$TituloIngles', SubtituloEN='$SubtituloIngles', DescripcionEN='$DescripcionIngles' WHERE Id='$Id'";
$resultka			=mysql_query($queryka, $id);	

if(!empty($_FILES["Foto"]["name"])){

$Destino = "General/Contacto";

	$Imagen =  $_FILES ["Foto"]["tmp_name"];

	$Tipo = end(explode(".", $_FILES['Foto']['name'])); 

	$Nombre = $Id.".".$Tipo;

	move_uploaded_file ($Imagen, $Destino . '/'.$Nombre);


		$query1 = "UPDATE Contacto SET Foto='$Nombre' WHERE Id='$Id'"; 
		$result1=mysql_query($query1,$id);

}
if(!empty($_FILES["Foto2"]["name"])){

$Destino = "General/Contacto/Fondo";

	$Imagen =  $_FILES ["Foto2"]["tmp_name"];

	$Tipo = end(explode(".", $_FILES['Foto2']['name'])); 

	$Nombre = $Id.".".$Tipo;

	move_uploaded_file ($Imagen, $Destino . '/'.$Nombre);


		$query1 = "UPDATE Contacto SET Foto2='$Nombre' WHERE Id='$Id'"; 
		$result1=mysql_query($query1,$id);

}

$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Actualizó información de la página de contácto.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);
?>
<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
