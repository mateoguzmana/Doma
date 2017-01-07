<?
session_start();

include("includes/conexion.php");

$Lang   =    $_SESSION["Lang"];

$query      =  "SELECT * FROM Empresa";
$result     =  mysql_query($query,$id);

while($row  =  mysql_fetch_array($result)){

$Titulo        = $row["Titulo"];
$TituloEN      = $row["TituloEN"];
$Descripcion   = $row["Descripcion"];
$DescripcionEN = $row["DescripcionEN"];
$Foto          = $row["Foto"];

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
        <h1><?if($Lang=="EN"){?>ABOUT US<?}else{?>QUIENES SOMOS<?}?></h1>
        
      </div>
    </div>
  </div>
 
 
  
  <!--======= TEAM =========-->
  <section id="team">
    <div class="container"> 
      
      <!--======= TITTLE =========-->
      <div class="tittle"> <img src="images/head-top.png" alt="">
        <h3><?=$Titulo?></h3>
       
      </div>
      <div class="row">
       
       
          <div class="col-sm-12">
          
          
          
           <img src="admin/html/pages/General/Empresa/<?=$Foto?>" width="100%" alt="">
          
          
          <hr/>
          
          
          <?=$Descripcion?>
          
          
          
          </div>
          
          
        
          
       
       
       
     
      </div>
    </div>
  </section>
  
  
  
  
  
  
  
  
   <section style="background-color:#e9e9e9;" id="team">
    <div class="container"> 
      
      <!--======= TITTLE =========-->
      <div class="tittle"> <img src="images/head-top.png" alt="">
        <h3><?if($Lang=="EN"){?>Our team<?}else{?>Nuestro Equipo<?}?></h3>
        
        <p><strong><?if($Lang=="EN"){?>We are a large, effective and wise team ...<?}else{?>Somos un  equipo grande, eficaz y sabio...<?}?></strong></p>
       
      </div>
      <div class="row">
      
          
          <!--======= TEAM ROW =========-->
          
            
            <!--======= TEAM =========-->
            <?
            $r=0;

            $query2         = "SELECT * FROM Equipo order by Id";
            $result2        = mysql_query($query2,$id);

            while($row2     = mysql_fetch_array($result2)){
            $r++;
            $Id2            = $row2["Id"];  
            $Nombre2        = $row2["Nombre"];
            $Cargo          = $row2["Cargo"];
            $CargoEN        = $row2["CargoEN"];
            $Descripcion2   = $row2["Descripcion"]; 
            $DescripcionEN2 = $row2["DescripcionEN"];
            $Foto2          = $row2["Foto"];

            if($Lang=="EN"){

            $Cargo          = $CargoEN;
            $Descripcion2   = $DescripcionEN2;   
            
            }

            $Fin="";
            
            if($r==3 || $r==4 || $r==6 || $r==8){
            $Fin='</div><div class="row">';
            }
            ?>
            <div style="float:left;" class="col-md-4">
             <div style="padding-bottom:15px;" class="team"> <img class="img-responsive" src="admin/html/pages/Equipo/<?=$Foto2?>" alt="">
                <div class="team-over"> 
                  <!--======= SOCIAL ICON =========-->
                  <ul class="social_icons animated-6s fadeInUp">
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
                
              
              </div>
              
              <br/>
              <div class="cajon"  >
            <h4><?=$Nombre2?></h4>
            
             <p><strong><?=$Cargo?></strong> </p>
              <p><strong> <?if($Lang=="EN"){?>OFFICE:<?}else{?>OFICINA:<?}?> <?=$Telefono?></strong> </p>
            
             <p align="justify">  <?=$Descripcion2?>
             
             
             
</p>
             
             
              
            </div>
              
              
              
            </div>
            
            
            <?=$Fin?>
            <?}?>
            
            
            
            
            </div>
            
       </div>
      </div>
    </div>
  </section>
  

  
  
  
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
</body>
</html>