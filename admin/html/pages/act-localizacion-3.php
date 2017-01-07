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
$Ubicacion 			=$_REQUEST["Ubicacion"];
$Nombre				=$_REQUEST["Nombre"];


$queryka		=	"UPDATE Localizacion set Idubicacion='$Ubicacion', Nombre = '$Nombre' Where Id='$Id'";
$resultka		=	mysql_query($queryka, $id);	

$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Actualizó una localización.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);
?>
<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
