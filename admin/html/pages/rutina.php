<?

include("../../includes/conexion.php");
include("resize-class.php");


$query		="SELECT*  FROM Propiedades";
$result		=mysql_query($query, $id);
		
while($row	=mysql_fetch_array($result))
{
$Id			=$row["Id"];

$query1     = "SELECT * FROM FotosPropiedades WHERE Idpropiedad='$Id'";
$result1    = mysql_query($query1,$id);

while($row1 = mysql_fetch_array($result1)){
$Nombre 	= $row1["Nombre"];

	// *** 1) Initialise / load image
	$resizeObj = new resize("ImagenesPropiedades/".$Nombre);

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(600, 400, 'crop');

	// *** 3) Save image
	$resizeObj -> saveImage("ImagenesPropiedades/p/".$Nombre, 100);
} 
}

	





				
?>