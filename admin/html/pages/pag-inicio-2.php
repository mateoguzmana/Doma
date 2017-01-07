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

if(!empty($_FILES["Foto"]["name"])){

$Destino = "General/Inicio";

	$Imagen =  $_FILES ["Foto"]["tmp_name"];

	$Tipo = end(explode(".", $_FILES['Foto']['name'])); 

	$Nombre = $Id.".".$Tipo;

	move_uploaded_file ($Imagen, $Destino . '/'.$Nombre);


		$query1 = "UPDATE Inicio SET Foto='$Nombre' WHERE Id='$Id'"; 
		$result1=mysql_query($query1,$id);

}
?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
