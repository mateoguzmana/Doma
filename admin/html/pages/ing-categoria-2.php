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
$NombreEN 				=$_REQUEST["NombreEN"];
$Descripcion			=$_REQUEST["Descripcion"];
$DescripcionEN			=$_REQUEST["DescripcionIngles"];





$queryka			= 	"INSERT INTO Sesion (Nombre, NombreEN, Descripcion, DescripcionEN) VALUES('$Nombre','$NombreEN','$Descripcion','$DescripcionEN')";
$resultka			= 	mysql_query($queryka, $id);	

$query1 	 		=	"SELECT * FROM Sesion ORDER BY Id ASC";
$result1 	 		=	mysql_query($query1,$id);
while ($row1 		= 	mysql_fetch_array($result1)) {

$Id 				= 	$row1["Id"];

}

$Destino = "Sesion";
$Imagen =  $_FILES["Imagen"]["tmp_name"];

if(!empty($_FILES['Imagen']['name'])){

$Tipo = end(explode(".", $_FILES['Imagen']['name'])); 
$N 	  = $Id.".".$Tipo;
move_uploaded_file ($Imagen,$Destino.'/'.$N);


$query3 = "UPDATE Sesion SET Foto='$N' WHERE Id='$Id'";
$result3=mysql_query($query3,$id);

}

$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Ingresó nueva categoria.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);
?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
