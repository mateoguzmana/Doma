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




$Nombre					=$_REQUEST["NombreE"];
$Descripcion			=$_REQUEST["DescripcionE"];
$DescripcionEN			=$_REQUEST["DescripcionEEN"];


	$Destino = "Sesion";

	$Imagen =  $_FILES ["Imagen".$i]["tmp_name"];

	$Tipo = end(explode(".", $_FILES['Imagen'.$i]['name'])); 


$queryka			= 	"INSERT INTO Sesion (Nombre, Descripcion, DescripcionEN) VALUES('$Nombre','$Descripcion','$DescripcionEN')";
$resultka			= 	mysql_query($queryka, $id);	

$query1 	 		=	"SELECT * FROM Sesion ORDER BY Id ASC";
$result1 	 		=	mysql_query($query1,$id);
while ($row1 		= 	mysql_fetch_array($result1)) {

$Id 				= 	$row1["Id"];

}

$Foto = $Id.".".$Tipo;

move_uploaded_file ($Imagen, $Destino . '/'.$Foto);

$query2 	=  "UPDATE Sesion SET Foto='$Foto'";
$result2    =  mysql_query($query2,$id);
?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
