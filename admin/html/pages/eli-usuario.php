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



$Casillero		=	$_SESSION['IdR'];

$Id					=$_REQUEST["Id"];



$queryka		=	"UPDATE Usuarios set Muestra = 1 Where Id='$Id'";
$resultka		=	mysql_query($queryka, $id);
				
$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Eliminó un usuario.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);
?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
