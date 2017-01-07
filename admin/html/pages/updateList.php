<?

include("../../includes/conexion.php");

$array	= $_POST['arrayorder'];

$tabla	= $_POST['tabla']; 

if ($_POST['update'] == "update")
{
	
	$count = 1;
	foreach ($array as $idval) 
	{
		$query = "UPDATE ".$tabla." SET Pos = " . $count . " WHERE Id = " . $idval;
		mysql_query($query) or die('Error, insert query failed');
		$count ++;	
	}
	echo 'Cambios guardados con exito';
}
?>