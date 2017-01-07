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
include("resize-class.php");



$Id					=$_REQUEST["Id"];
$Titulo				=$_REQUEST["Titulo"];
$TituloIngles		=$_REQUEST["TituloIngles"];
$Descripcion 		=$_REQUEST["Descripcion"];
$DescripcionIngles	=$_REQUEST["DescripcionIngles"];


$queryka			="UPDATE Empresa set Titulo = '$Titulo', Descripcion='$Descripcion', TituloEN='$TituloIngles', DescripcionEN='$DescripcionIngles' WHERE Id='$Id'";
$resultka			=mysql_query($queryka, $id);	

if(!empty($_FILES["Foto"]["name"])){

$Destino = "General/Empresa";

	$Imagen =  $_FILES ["Foto"]["tmp_name"];

	$Tipo = end(explode(".", $_FILES['Foto']['name'])); 

	$Nombre = $Id.".".$Tipo;

	move_uploaded_file ($Imagen, $Destino . '/'.$Nombre);


		$query1 = "UPDATE Empresa SET Foto='$Nombre' WHERE Id='$Id'"; 
		$result1=mysql_query($query1,$id);

	// *** 1) Initialise / load image
	$resizeObj = new resize("General/Empresa/".$Nombre);

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(1000, 500, 'crop');

	// *** 3) Save image
	$resizeObj -> saveImage("General/Empresa/".$Nombre, 100);


}

$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Actualizó información página de empresa.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);
?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
