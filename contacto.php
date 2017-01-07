<?
session_start();

include("includes/conexion.php");

$Lang   =    $_SESSION["Lang"];

$query        =  "SELECT * FROM Contacto";
$result       =  mysql_query($query,$id);

while($row    =  mysql_fetch_array($result)){

$Titulo       =  $row["Titulo"];
$TituloEN     =  $row["TituloEN"];
$Subtitulo    =  $row["Subtitulo"];
$SubtituloEN  =  $row["SubtituloEN"];
$Descripcion  =  $row["Descripcion"];
$DescripcionEN=  $row["DescripcionEN"]; 
$Foto         =  $row["Foto"];
$Foto2        =  $row["Foto2"];
}

if($Lang=="EN"){

$Titulo        =   $TituloEN;
$Subtitulo     =   $SubtituloEN;
$Descripcion   =   $DescripcionEN;

}

$query2       =  "SELECT * FROM Informacion";
$result2      =  mysql_query($query2,$id);

while($row2   =  mysql_fetch_array($result2)){

$Telefono     =  $row2["Telefono"];
$Celular      =  $row2["Celular"];
$Email        =  $row2["Email"];

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Doma Inmobiliaria</title>
<meta name="keywords" content="" >
<meta name="description" content="">
<meta name="author" content="">

<!-- FONTS ONLINE -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<!--MAIN STYLE-->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<!-- Page Wrap ===========================================-->
<div id="wrap"> 
  
  <!--======= TOP BAR =========-->
  <?include("includes/topbar.php");?>
  
  <!--======= HEADER =========-->
  <header class="sticky">
    <div class="container"> 
      
      <!--======= LOGO =========-->
      <div class="logo"> <a href="index.php"><img src="images/logo.png" alt="" ></a> </div>
      <!--======= NAV =========-->
      <nav> 
        
        <!--======= MENU START =========-->
        <?include("includes/menu.php");?>
        
        <!--======= SUBMIT COUPON =========-->
        <div class="sub-nav-co"> <a href="#"><i class="fa fa-search"></i></a> </div>
      </nav>
    </div>
  </header>
  
  <!--======= BANNER =========-->
  <div class="sub-banner">
    <div class="overlay">
      <div class="container">
        <h1><?if($Lang=="EN"){?>Contact<?}else{?>Contácto<?}?></h1>
       
      </div>
    </div>
  </div>
  
  <!--======= MAP =========-->
 
  <!--======= CONTACT =========-->
  <section  style="background-image: url(admin/html/pages/General/Contacto/Fondo/<?=$Foto2?>); " data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20" class="contact parallax"> 
    
    <!--======= CONTACT INFORMATION =========-->
    
     <div class="overlay1">
    
   
      <div style="padding:05px 0px 60px 0px;" class="container"> 
      
      
       <div class="row"> 
      
        <div class="col-sm-12"  >
        
        
        <h4><?=$Titulo?></h4>
       <?=$Descripcion?>

 
 </div>
 
 </div>
 
      <div class="row"> 

 <div class="col-sm-5"  >
 
 <img width="100%" src="admin/html/pages/General/Contacto/<?=$Foto?>"/>
 
 
 <h5><?=$Subtitulo?></h5>
 
 
 
    <p><span style="color:#071c4a;"><i class="fa fa-phone"></i></span> <?=$Telefono?> </p>
                      
                      <p><span style="color:#071c4a;"><i class="fa fa-mobile"></i></span> <?=$Celular?> </p>
                   
                      <p><span style="color:#071c4a;"><i class="fa fa-envelope-o"></i></span>  <a href=""> <?=$Email?></a> </p>
                    
                      <p><span style="color:#071c4a;"><i class="fa fa-home"></i> </span> <a href="">www.domainmobiliaria.com</a> </p>
 



        
        
        </div>
        
        
        
         <div class="col-sm-7"  >
         
           
    <div class="contact-form">
 
   <form role="form" id="contact_form" method="post" onSubmit="return false">
          <input type="hidden" name="tipo" value="1">
          <ul class="row">
            <li class="col-sm-6">
              <label class="font-montserrat"><?if($Lang=="EN"){?>Name<?}else{?>Nombre<?}?> *
                <input type="text" class="form-control" name="name" id="name" placeholder="">
              </label>
            </li>
            <li class="col-sm-6">
              <label class="font-montserrat">E-mail *
                <input type="text" class="form-control" name="email" id="email" placeholder="">
              </label>
            </li>
            <li class="col-sm-6">
              <label class="font-montserrat"><?if($Lang=="EN"){?>Phone<?}else{?>Telefono<?}?> *
                <input type="text" class="form-control" name="company" id="company" placeholder="">
              </label>
            </li>
            <li class="col-sm-6">
              <label class="font-montserrat"><?if($Lang=="EN"){?>Subject<?}else{?>Asunto<?}?>
                <input type="text" class="form-control" name="website" id="website" placeholder="">
              </label>
            </li>
            <li class="col-sm-12">
              <label class="font-montserrat"><?if($Lang=="EN"){?>Message<?}else{?>Mensaje<?}?>
                <textarea class="form-control" name="message" id="message" rows="5" placeholder=""></textarea>
              </label>
            </li>
            <li class="col-sm-12">
              <button type="submit" value="submit" class="btn font-montserrat" id="btn_submit" onClick="proceed();"><?if($Lang=="EN"){?>Send Message<?}else{?>Enviar Mensaje<?}?></button>
            </li>
          </ul>
        </form>


</div>
        
        
        </div>
        
       
       
       
  </div>     
       
      
    </div>
    
    
    
    
    </div>
  
  </section>
  
  
  
  
 
  
  <!--======= RIGHTS =========-->
  <?include("includes/footer.php");?>
</div>
<script src="js/jquery-1.11.0.min.js"></script> 
<script src="js/wow.min.js"></script> 
<script src="js/bootstrap-select.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.stellar.js"></script> 
<script src="js/jquery.flexslider-min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/jquery.sticky.js"></script> 
<script src="js/own-menu.js"></script> 
<script src="js/jquery.nouislider.min.js"></script> 
<script src="js/bootstrap-select.js"></script> 
<script src="js/main.js"></script> 
<script src="js/mapmarker.js"></script> 
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false'></script> 
<!-- begin map script--> 
<script type="text/javascript">
// Use below link if you want to get latitude & longitude
// http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude.php 
$(document).ready(function(){
//set up markers 
var myMarkers = {"markers": [{
		
	"latitude": "-75.558862",
	"longitude":"6.196031",
	
	"icon": "images/map-locator.png", 
	"baloon_text": 'Torre Empresarial Platinum, Medellín - Antioquia, Colombia'
}]};
	
//set up map options
$("#map").mapmarker({
  zoom  : 17,
  center  : 'Torre Empresarial Platinum, Medellín - Antioquia, Colombia',
  markers : myMarkers
  });
});
</script>
</body>
</html>