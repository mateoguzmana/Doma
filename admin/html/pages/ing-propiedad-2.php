<?
session_start();

if (empty($_SESSION['sesionx']))
{
header("Location: login.php");
}

include("../../includes/conexion.php");
include("resize-class.php");

$Nombre					=$_REQUEST["Nombre"];
$NombreEN 				=$_REQUEST["NombreEN"];
$Codigo 				=$_REQUEST["Codigo"];
$Tipo 					=$_REQUEST["Tipo"];
$Ubicacion				=$_REQUEST["Ubicacion"];
$Localizacion			=$_REQUEST["Localizacion"];
$Area					=$_REQUEST["Area"];
$Habitaciones			=$_REQUEST["Habitaciones"];
$Banos					=$_REQUEST["Banos"];
$Garaje					=$_REQUEST["Garaje"];
$Precio 				=$_REQUEST["Precio"];
$Descripcion	 		=$_REQUEST["Descripcion"];
$DescripcionEN	 		=$_REQUEST["DescripcionEN"];
$Mapa 					=$_REQUEST["Mapa"];

$Precio		=	 str_replace("$","",$Precio);
$Precio		=	 str_replace(" ","",$Precio);
$Precio		=	 str_replace(",","",$Precio);
$Precio		=	 str_replace("_","",$Precio);
$Precio		=	 str_replace("___","",$Precio);
$Precio		=	 str_replace("__","",$Precio);


$sql="INSERT INTO Propiedades (Nombre, NombreEN, Codigo, Tipo, Ubicacion, Localizacion, Area, Habitaciones, Banos, Garaje, Precio, Descripcion, DescripcionEN, Mapa)";
$sql.= "VALUES ('$Nombre', '$NombreEN', '$Codigo', '$Tipo', '$Ubicacion', '$Localizacion', '$Area', '$Habitaciones', '$Banos', '$Garaje', '$Precio', '$Descripcion', '$DescripcionEN','$Mapa')";
mysql_query($sql);


$query		="SELECT*  FROM Propiedades Order by Id ASC" ;
$result		=mysql_query($query, $id);
		
while($row	=mysql_fetch_array($result))
{
$Id			=$row["Id"];
}

$Numero2= $_REQUEST["Numero2"];

	for ($i=1; $i <=$Numero2; $i++) { 
	$Destino = "ImagenesPropiedades";

	$Imagen =  $_FILES ["Imagen".$i]["tmp_name"];

	$Tipo = end(explode(".", $_FILES['Imagen'.$i]['name'])); 

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
$AccionACC      =  "Ingresó nueva propiedad.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);		
?>
<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>