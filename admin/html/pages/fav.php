<?
session_start();


include("../../includes/conexion.php");


$Id					=$_REQUEST["Id"];
$E 					=$_REQUEST["E"];



$query2 	=  "UPDATE Propiedades SET Fav='$E' WHERE Id='$Id'";
$result2    =  mysql_query($query2,$id);

?>