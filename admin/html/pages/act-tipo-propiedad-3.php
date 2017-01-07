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
$Nombre				=$_REQUEST["Nombre"];
$NombreEN 			=$_REQUEST["NombreEN"];
$Categoria 			=$_REQUEST["Categoria"];


$queryka		=	"UPDATE Tipo set Idcategoria='$Categoria', Nombre = '$Nombre', NombreEN='$NombreEN' Where Id='$Id'";
$resultka		=	mysql_query($queryka, $id);	

$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Actualizó tipo de propiedad.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);
?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
