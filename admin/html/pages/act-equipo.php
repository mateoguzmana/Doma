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
$Cargo 				=$_REQUEST["Cargo"];
$CargoEN 			=$_REQUEST["CargoEN"];
$Descripcion 		=$_REQUEST["Descripcion"];
$DescripcionEN 		=$_REQUEST["DescripcionEN"];




$queryka		=	"UPDATE Equipo set Nombre='$Nombre', Cargo='$Cargo', CargoEN='$CargoEN', Descripcion='$Descripcion', DescripcionEN='$DescripcionEN' Where Id='$Id'";
$resultka		=	mysql_query($queryka, $id);	


$Destino = "Equipo";
$Imagen =  $_FILES["Foto"]["tmp_name"];

if(!empty($_FILES['Foto']['name'])){

$Tipo = end(explode(".", $_FILES['Foto']['name'])); 
$N 	  = $Id.".".$Tipo;
move_uploaded_file ($Imagen, $Destino . '/'.$N);


$query1 = "UPDATE Equipo SET Foto='$N' WHERE Id='$Id'";
$result1=mysql_query($query1,$id);

}


?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	

