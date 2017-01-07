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




$Nombre					=$_REQUEST["Nombre"];
$Cargo 					=$_REQUEST["Cargo"];
$CargoEN 				=$_REQUEST["CargoEN"];
$Descripcion			=$_REQUEST["Descripcion"];
$DescripcionEN			=$_REQUEST["DescripcionEN"];


	$Destino = "Equipo";

	$Imagen =  $_FILES ["Imagen"]["tmp_name"];

	$Tipo = end(explode(".", $_FILES['Imagen']['name'])); 


$queryka			= 	"INSERT INTO Equipo (Nombre, Cargo, CargoEN, Descripcion, DescripcionEN) VALUES('$Nombre','$Cargo','$CargoEN','$Descripcion','$DescripcionEN')";
$resultka			= 	mysql_query($queryka, $id);	

$query1 	 		=	"SELECT * FROM Equipo ORDER BY Id ASC";
$result1 	 		=	mysql_query($query1,$id);
while ($row1 		= 	mysql_fetch_array($result1)) {

$Id 				= 	$row1["Id"];

}

if(!empty($_FILES['Imagen']['name'])){

$Foto = $Id.".".$Tipo;


move_uploaded_file ($Imagen, $Destino . '/'.$Foto);

$query2 	=  "UPDATE Equipo SET Foto='$Foto' WHERE Id='$Id'";
$result2    =  mysql_query($query2,$id);

}
?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
