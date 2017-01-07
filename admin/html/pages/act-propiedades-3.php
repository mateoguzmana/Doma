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
$NombreEN           =$_REQUEST["NombreEN"]; 
$Codigo 			=$_REQUEST["Codigo"];
$Tipo 				=$_REQUEST["Tipo"];
$Ubicacion 			=$_REQUEST["Ubicacion"];
$Localizacion 		=$_REQUEST["Localizacion"];
$Area 				=$_REQUEST["Area"];
$Habitaciones 		=$_REQUEST["Habitaciones"];
$Banos				=$_REQUEST["Banos"];
$Garaje				=$_REQUEST["Garaje"];
$Precio				=$_REQUEST["Precio"];
$Descripcion 		=$_REQUEST["Descripcion"];
$DescripcionEN 		=$_REQUEST["DescripcionEN"];
$Mapa				=$_REQUEST["Mapa"];

$Precio		=	 str_replace("$","",$Precio);
$Precio		=	 str_replace(" ","",$Precio);
$Precio		=	 str_replace(",","",$Precio);
$Precio		=	 str_replace("_","",$Precio);
$Precio		=	 str_replace("___","",$Precio);
$Precio		=	 str_replace("__","",$Precio);


$queryka		=	"UPDATE Propiedades set Nombre='$Nombre', NombreEN='$NombreEN', Codigo='$Codigo', Tipo='$Tipo', Ubicacion='$Ubicacion', Localizacion='$Localizacion', Area='$Area',
					Habitaciones='$Habitaciones', Banos='$Banos', Garaje='$Garaje', Precio='$Precio', Descripcion='$Descripcion', DescripcionEN='$DescripcionEN', Mapa='$Mapa' Where Id='$Id'";
$resultka		=	mysql_query($queryka, $id);	


$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Actualizó una propiedad.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);
?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
