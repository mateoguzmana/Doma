<?
session_start();

if (empty($_SESSION['sesionx']))
{
header("Location: login.php");
}

include("../../includes/conexion.php");


$Casillero		=	$_SESSION['IdR'];

$Nombre				=$_REQUEST["Nombre"];
$Cedula				=$_REQUEST["Cedula"];
$Email				=$_REQUEST["email"];
$Tipo				=$_REQUEST["tipo"];
$Contrasena			=$_REQUEST["Contrasena"];

$queryevep			="SELECT COUNT(*) AS TOTAL FROM Usuarios where Cedula = '$Cedula' and Muestra = 0";
$resultevep			=mysql_query($queryevep, $id);

while($rowevep		=mysql_fetch_array($resultevep))
{
$TOTAL				=$rowevep["TOTAL"];
}

if($TOTAL > 0)
{
?>
<script type="text/javascript">
alert('El usuario ingresado ya existe en el sistema.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
<?	
}
else
{
$sql="INSERT INTO  Usuarios (Nombre, Cedula, Email, Clave, Tipo)";
$sql.= "VALUES ('$Nombre','$Cedula','$Email','$Contrasena','$Tipo')";
mysql_query($sql);
				
				
$UsuarioACC     =  $_SESSION["usuario"];
$AccionACC      =  "Ingreso un nuevo usuario.";
$FechaACC       =  date("Y-m-d H:i:s");

$queryACC 		=  "INSERT INTO Acciones (Usuario, Accion, Fecha) VALUES ('$UsuarioACC','$AccionACC','$FechaACC')";
$resultACC 		=  mysql_query($queryACC,$id);
?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
<?
}
?>