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



$Ubicacion 			=$_REQUEST["Ubicacion"];
$Nombre				=$_REQUEST["Nombre"];


$sql="INSERT INTO  Localizacion (Idubicacion, Nombre)";
$sql.= "VALUES ('$Ubicacion','$Nombre')";
mysql_query($sql);

$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Ingresó nueva localización.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);	

?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
