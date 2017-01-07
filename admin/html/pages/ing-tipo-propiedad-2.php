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



$Nombre				=$_REQUEST["Nombre"];
$NombreEN			=$_REQUEST["NombreEN"];
$Categoria 			=$_REQUEST["Categoria"];


$sql="INSERT INTO  Tipo (Idcategoria,Nombre,NombreEN)";
$sql.= "VALUES ('$Categoria','$Nombre','$NombreEN')";
mysql_query($sql);

$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Ingresó nuevo tipo de propiedad.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);			

?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
