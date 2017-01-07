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
$Descripcion 		=$_REQUEST["Descripcion"];
$DescripcionEN 		=$_REQUEST["DescripcionIngles"];




$queryka		=	"UPDATE Sesion set Nombre='$Nombre', NombreEN='$NombreEN', Descripcion='$Descripcion', DescripcionEN='$DescripcionEN' Where Id='$Id'";
$resultka		=	mysql_query($queryka, $id);	


$Destino = "Sesion";
$Imagen =  $_FILES["Imagen"]["tmp_name"];

$Dec    =  $_FILES["Imagen"]["name"];


if(!empty($Dec)){

$Tipo = explode(".", $Dec); 
$Tipo = end($Tipo);
$N 	  = $Id.".".$Tipo;
move_uploaded_file ($Imagen, $Destino . '/'.$N);


$query1 = "UPDATE Sesion SET Foto='$N' WHERE Id='$Id'";
$result1=mysql_query($query1,$id);

}

$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Actualizó categoria.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);
?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	