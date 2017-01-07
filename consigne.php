<?
session_start();

include("includes/conexion.php");

$Lang          =   $_SESSION["Lang"];

$query         =   "SELECT * FROM Consigne";
$result        =   mysql_query($query,$id);   

while($row     =   mysql_fetch_array($result)){

$Titulo        =   $row["Titulo"];
$TituloEN      =   $row["TituloEN"];
$Descripcion   =   $row["Descripcion"];
$DescripcionEN =   $row["DescripcionEN"];
$Foto          =   $row["Foto"]; 
$Foto2         =   $row["Foto2"];

}

if($Lang=="EN"){

$Titulo        =   $TituloEN;
$Descripcion   =   $DescripcionEN;

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
        <h1><?=$Titulo?></h1>
       
      </div>
    </div>
  </div>
  
  <!--======= PROPERTIES DETAIL PAGE =========-->
  <section  style="background-image: url(admin/html/pages/General/Consigne/Fondo/<?=$Foto2?>); " data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20" class=" register parallax ">
  
  <div class="overlay1">
  
  
    <div class="container ">
      <div class="row "> 
        
        <!--======= LEFT BAR =========-->
        <div class="col-sm-12">
          <div class="row"> 
            
         
            <div class="col-sm-6">
            
            <img style=" padding-bottom:12px;" width="100%" src="admin/html/pages/General/Consigne/<?=$Foto?>"/>
            
            
            
           <?=$Descripcion?>

<hr/>
            
            
            </div>
            
           
            <div class="col-sm-6">
              <div class="regi-sec">
              
             
         
         
               
            
            
              
            
              <form role="form" id="contact_form" method="post" onSubmit="return false">
                <input type="hidden" name="tipo" value="3">
                <input type="hidden" name="website" id="website" value="Formulario consigne">
                <input type="hidden" name="message" id="message" value="ignore">
          <ul class="row">
          
          
         <div style="margin-bottom:22px;" class="col-sm-12">
              <select class="selectpicker" name="propiedad" required>
                  <option value=""><?if($Lang=="EN"){?>Select an option<?}else{?>Seleccione una opcion<?}?></option>
                  <option value="Apartamento"><?if($Lang=="EN"){?>Apartment<?}else{?>Apartamento<?}?></option>
                  <option value="Bodega"><?if($Lang=="EN"){?>Warehouse<?}else{?>Bodega<?}?></option>
                  <option value="Casa"><?if($Lang=="EN"){?>House<?}else{?>Casa<?}?></option>
                  <option value="Finca"><?if($Lang=="EN"){?>Estate<?}else{?>Finca<?}?></option>
                  <option value="Local">Local</option>
                  <option value="Lote"><?if($Lang=="EN"){?>Lot<?}else{?>Lote<?}?></option>
                  <option value="Oficina"><?if($Lang=="EN"){?>Office<?}else{?>Oficina<?}?></option>
                  </select>
                  
                  </div>
          
          
            <li class="col-sm-12">
             
                <input type="text" class="form-control" name="name" id="name" placeholder="<?if($Lang=="EN"){?>Names and surnames<?}else{?>Nombres y Apellidos<?}?>" required>
             
            </li>
            <li class="col-sm-12">
            
                <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" required>
              
            </li>
            <li class="col-sm-12">
             
                <input type="text" class="form-control" name="company" id="company" placeholder="<?if($Lang=="EN"){?>Phone<?}else{?>Telefono<?}?>" required>
             
            </li>
           
            <li class="col-sm-12">
             
              <input type="text" class="form-control" name="celular" id="celular" placeholder="<?if($Lang=="EN"){?>Cell phone<?}else{?>Celular<?}?>" required>
           
            </li>
            
            
              <li class="col-sm-12">
             
                <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="<?if($Lang=="EN"){?>City<?}else{?>Ciudad<?}?>" required>
             
            </li>
            
            
            <li class="col-sm-12">
             
                <input type="text" class="form-control" name="barrio" id="barrio" placeholder="<?if($Lang=="EN"){?>District<?}else{?>Barrio<?}?>" required>
             
            </li>
            
            
               <div style="margin-bottom:22px;" class="col-sm-12">
             <label style="color:#656565;"><?if($Lang=="EN"){?>Contact schedule<?}else{?>Horario de contacto<?}?></label>
            <select class="selectpicker" name="horario">
              <option><?if($Lang=="EN"){?>Any time<?}else{?>A Cualquier Hora<?}?></option>
              <option><?if($Lang=="EN"){?>Morning<?}else{?>Mañana<?}?></option>
              <option><?if($Lang=="EN"){?>Afternoon<?}else{?>Tarde<?}?></option>
              <option><?if($Lang=="EN"){?>Night<?}else{?>Noche<?}?></option>
            </select>
            
                 </div>
                 
            
            
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
<script>
$(window).load(function() {
  // The slider being synced must be initialized first
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 138,
    itemMargin: 0,
    asNavFor: '#slider'
  });
   
  $('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
  });
});

</script>
</body>
</html>