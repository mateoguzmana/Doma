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
$TituloIngles		=$_REQUEST["TituloIngles"];
$Descripcion 		=$_REQUEST["Descripcion"];
$DescripcionIngles	=$_REQUEST["DescripcionIngles"];


$queryka			="UPDATE ConsigneInicio set Titulo = '$Titulo', Descripcion='$Descripcion', TituloEN='$TituloIngles', DescripcionEN='$DescripcionIngles' WHERE Id='$Id'";
$resultka			=mysql_query($queryka, $id);	

if(!empty($_FILES["Foto"]["name"])){

$Destino = "General/ConsigneInicio";

	$Imagen =  $_FILES ["Foto"]["tmp_name"];

	$Tipo = end(explode(".", $_FILES['Foto']['name'])); 

	$Nombre = $Id.".".$Tipo;

	move_uploaded_file ($Imagen, $Destino . '/'.$Nombre);


		$query1 = "UPDATE ConsigneInicio SET Foto='$Nombre' WHERE Id='$Id'"; 
		$result1=mysql_query($query1,$id);

}


$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Actualizó información de consigne en la página de inicio.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);
?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
