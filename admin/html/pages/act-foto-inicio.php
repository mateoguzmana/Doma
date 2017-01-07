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



$Id		=$_REQUEST["Id"];
$i 		=$_REQUEST["Numero"];

$Destino = "ImagenesInicio";

$Imagen =  $_FILES ["Foto"]["tmp_name"];
$Tipo 	=  end(explode(".", $_FILES['Foto']['name'])); 
$Nombre =  $Id."-".$i.".".$Tipo;
move_uploaded_file($Imagen, $Destino . '/'.$Nombre);


$query1 = "INSERT INTO FotosInicio (Idpropiedad,Nombre,Pos) 
VALUES ('$Id','$Nombre','$i')";
$result1=mysql_query($query1,$id);

	
	// *** 1) Initialise / load image
	$resizeObj = new resize("ImagenesInicio/".$Nombre);

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(1000, 500, 'crop');

	// *** 3) Save image
	$resizeObj -> saveImage("ImagenesInicio/".$Nombre, 100);

$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Se ingresó nueva foto en la página de inicio.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);

?>

