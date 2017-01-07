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
$i 					=$_REQUEST["Numero"];

$Destino = "ImagenesPropiedades";

$Imagen =  $_FILES ["Foto"]["tmp_name"];
$Tipo = end(explode(".", $_FILES['Foto']['name'])); 
$Nombre = $Id."-".$i.".".$Tipo;
move_uploaded_file ($Imagen, $Destino . '/'.$Nombre);


$query1 = "INSERT INTO FotosPropiedades (Idpropiedad,Nombre,Pos) 
VALUES ('$Id','$Nombre','$i')";
$result1=mysql_query($query1,$id);

// *** 1) Initialise / load image
	$resizeObj = new resize("ImagenesPropiedades/".$Nombre);

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(600, 400, 'crop');

	// *** 3) Save image
	$resizeObj -> saveImage("ImagenesPropiedades/p/".$Nombre, 100);

	}


$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Actualizó foto de una propiedad.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);
?>

