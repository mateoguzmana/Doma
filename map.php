<?



include("includes/conexion.php");

$query    	 =  "SELECT * FROM Propiedades";
$result   	 =  mysql_query($query,$id);

while ($row  =  mysql_fetch_array($result)) {

$Id 		 =  $row["Id"];
$Precio      =	$row["Precio"];  

$Precio = substr($Precio, 0, -2);


$query2      =  "UPDATE Propiedades SET Precio='$Precio' WHERE Id='$Id'";
$result2     =  mysql_query($query2,$id);

}

?>