<?
include("../../includes/conexion.php");

$Id 		=$_REQUEST["Id"];

$query1 	="SELECT * FROM Ubicacion WHERE Nombre='$Id'";
$result1 	=mysql_query($query1,$id);

while($row1 =mysql_fetch_array($result1)){

$Idubi      =$row1["Id"];

}

$queryK   	="SELECT * FROM Localizacion WHERE Idubicacion='$Idubi' AND Muestra=0";
$resultK	=mysql_query($queryK,$id);
while($rowK =mysql_fetch_array($resultK)){
$IdK 		=$rowK["Id"];
$NombreK 	=$rowK["Nombre"];
?>
<option value="<?=$NombreK?>"><?=$NombreK?></option>
<?
}
?>