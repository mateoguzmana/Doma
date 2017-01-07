<? 
include("includes/conexion.php");
include("includes/class.phpmailer.php");

$query     = "SELECT * FROM Informacion"; 
$result    = mysql_query($query,$id);

while($row = mysql_fetch_array($result)){

$Correo    = $row["Email"];

}


$tipo 	   = $_POST["tipo"];
$name      = $_POST['name'];
$email     = $_POST['email'];
$company   = $_POST['company'];
$website   = $_POST['website'];
$message   = $_POST['message'];
$celular   = $_POST["celular"];
$ciudad    = $_POST["ciudad"];
$barrio    = $_POST["barrio"];
$horario   = $_POST["horario"];
$propiedad = $_POST["propiedad"];


if($tipo==1){
$mail             = new PHPMailer(); // defaults to using php "mail()"

$body             = "De: ".$name." \n Email: ".$email." \n Empresa: ".$company." \n Asunto:".$website." \n Mensaje: ".$message;;
$body 			  = nl2br($body);

$mail->AddReplyTo($Correo,"Mateo");

$mail->SetFrom($email, $name);

$mail->AddReplyTo($Correo,"Mateo");

$address = $Correo;

$mail->AddAddress($address, "Doma");

$mail->Subject    = "Mensaje domainmobiliaria.com";

// $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
}	
}

if($tipo==2){

$mail             = new PHPMailer(); // defaults to using php "mail()"

$body             = "De: ".$name." \n Email: ".$email." \n Telefono: ".$company." \n Asunto:".$website." \n Mensaje: ".$message;
$body 			  = nl2br($body);

$mail->AddReplyTo($Correo,"Mateo");

$mail->SetFrom($email, $name);

$mail->AddReplyTo($Correo,"Mateo");

$address = $Correo;

$mail->AddAddress($address, "Doma");

$mail->Subject    = "Mensaje domainmobiliaria.com";

// $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
}	

}


if($tipo==3){

$mail             = new PHPMailer(); // defaults to using php "mail()"

$body             = "Asunto:".$website." \n De: ".$name." \n Email: ".$email." \n Telefono: ".$company." \n Celular: ".$celular." \n Ciudad: " .$ciudad." \n Barrio: ".$barrio." \n Horario: ".$horario."\n Tipo de propiedad: ".$propiedad;
$body 			  = nl2br($body);

$mail->AddReplyTo($Correo,"Mateo");

$mail->SetFrom($email, $name);

$mail->AddReplyTo($Correo,"Mateo");

$address = $Correo;

$mail->AddAddress($address, "Doma");

$mail->Subject    = "Mensaje domainmobiliaria.com";

// $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
}	

}


?>