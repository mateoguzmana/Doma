<?
session_start();

include("includes/conexion.php");


          $query22            ="SELECT * FROM Lonja";
          $result22           =mysql_query($query22,$id);

          while($row22        =mysql_fetch_array($result22)){

          $IdL                =$row22["Id"];
          $TituloL            =$row22["Titulo"]; 
          $TituloLIngles      =$row22["TituloEN"]; 
          $DescripcionL       =$row22["Descripcion"];  
          $DescripcionLIngles =$row22["DescripcionEN"];
          $FotoL              =$row22["Foto"];

          if($_SESSION["Lang"]=="EN"){
          $TituloL            =$TituloLIngles;
          $DescripcionL       =$DescripcionLIngles;
          }

          }

          $query33            ="SELECT * FROM ConsigneInicio";
          $result33           =mysql_query($query33,$id);

          while($row33        =mysql_fetch_array($result33)){

          $IdK                =$row33["Id"];
          $TituloK            =$row33["Titulo"]; 
          $TituloKIngles      =$row33["TituloEN"]; 
          $DescripcionK       =$row33["Descripcion"];  
          $DescripcionKIngles =$row33["DescripcionEN"];
          $FotoK              =$row33["Foto"];

          if($_SESSION["Lang"]=="EN"){
          $TituloK            =$TituloKIngles;
          $DescripcionK       =$DescripcionKIngles;
          }

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
<div id="wrap" class="home-3"> 
  
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
  <div id="banner">
    <div class="flex-banner">
      <ul class="slides">
        <!--======= SLIDER =========-->
        <?
        $queryP    =    "SELECT * FROM FotosInicio ORDER BY Pos";
        $resultP   =    mysql_query($queryP,$id);

        while($rowP=    mysql_fetch_array($resultP)){

        $FotoP     =    $rowP["Nombre"];

        ?>
        <li> <img src="admin/html/pages/ImagenesInicio/<?=$FotoP?>" alt="" > </li>
        <?}?>
      </ul>
    </div>
    
    
    <!--======= FIND PROPERTY =========-->
   
    
  </div>
  
  <!--======= FIND PROPERTY =========-->
  <div class="finder">
    <div class="container">
 
      <!--======= FORM SECTION =========-->
      <div class="find-sec">
      
        <section class="property-slide"> 
    
    <!--======= PROPERTY SLIDER =========-->
    <div class="prot-slide"> 
      
      <!--======= PROPERTY SLIDE =========-->
      <?
      $queryX        =  "SELECT * FROM Sesion ORDER BY Pos";
      $resultX       =  mysql_query($queryX,$id);
      while ($rowX   =  mysql_fetch_array($resultX)) {
      $IdX           =  $rowX["Id"];
      $NombreX       =  $rowX["Nombre"];
      $NombreXEN     =  $rowX["NombreEN"];
      $DescripcionX  =  $rowX["Descripcion"];
      $DescripcionXEN=  $rowX["DescripcionEN"];
      $FotoX         =  $rowX["Foto"];

      if($_SESSION["Lang"]=="EN"){
      $NombreX       =  $NombreXEN;
      $DescripcionX  =$DescripcionXEN;
      }

      ?>
      <div class="plots ">
      
      <div class="cuadros left-padding right-padding">
      
        <ul class="row">
        
        <!--======= PROPERTY =========-->
        <li > 
          <!--======= TAGS =========-->
          
          <section> 
            <!--======= IMAGE =========-->
            <a href="propiedades.php?C=<?=$IdX?>">  <div class="img"> <img class="img-responsive" src="admin/html/pages/Sesion/<?=$FotoX?>" alt="" > 
              <!--======= IMAGE HOVER =========-->
               <div class="over-proper">  </div>
              
            </div></a>
            <!--======= HOME INNER DETAILS =========-->
          
            <!--======= HOME DETAILS =========-->
            <div   class="detail-sec">
            
            <h6><?=$NombreX?></h6>
            
           <div style="height:110px;">
           <?=$DescripcionX?>
           </div>
            
             <a href="propiedades.php?C=<?=$IdX?>" class="btn"><?if($_SESSION["Lang"]=="EN"){?>More information<?}else{?>Ampliar Información<?}?></a>
            
             </div>
          </section>
        </li>
      
      
       
       </ul>
       
     </div>
      
        
      </div>
      <?}?>
      
     
      </div>
    
    
    
  </section>
      
      
      
      
      
      
      
      </div>
    </div>
  </div>
  

 
 
  <!--======= FOOTER =========-->
  <footer>
    <div class="container"> 
      
      <!--======= NEWSLETTER =========-->
      <div class="subcribe">
       
      
      </div>
      <ul class="row">
        
        <!--======= HAPPY CLIENTS =========-->
        <li class="col-sm-6">
          <h5 onclick="javascript:alert('<?=$_SESSION["Lang"];?>');"><?if($_SESSION["Lang"]=="EN"){?>RECENT PROPERTIES<?}else{?>PROPIEDADES RECIENTES<?}?></h5>
         <hr>
          <section class="recientes">
          
            <div class="thumb-slider">
            <div id="slider" class="flexslider">
              <ul class="slides">
                
               <?
               $Listado     = array();

               $queryC      = "SELECT * FROM Propiedades WHERE Fav=1 LIMIT 10";
               $resultC     = mysql_query($queryC,$id);

               while($rowC  = mysql_fetch_array($resultC)){

               $IdC         = $rowC["Id"];
               $Tipo        = $rowC["Tipo"];
               $Localizacion= $rowC["Localizacion"];
               $Precio      = $rowC["Precio"];
               $Precio      = number_format($Precio);

               $queryL      = "SELECT * FROM Tipo WHERE Id='$Tipo'";
               $resultL     = mysql_query($queryL,$id);

               while($rowL  = mysql_fetch_array($resultL)){

               $NombreTipo  = $rowL["Nombre"];  
               $NombreTipoEN= $rowL["NombreEN"];
               }

               if($_SESSION["Lang"]=="EN"){
               $NombreTipo       =  $NombreTipoEN;
               }

               $queryZ      = "SELECT * FROM FotosPropiedades WHERE Idpropiedad='$IdC' ORDER BY Pos LIMIT 1";
               $resultZ     = mysql_query($queryZ,$id);

               while($rowZ  = mysql_fetch_array($resultZ)){

               $FotoPro     = $rowZ["Nombre"]; 
               $Listado[]   = $FotoPro;

               }

               ?>
               <li onclick="location.href='detalles.php?Id=<?=$IdC?>';" style="cursor:pointer;background-image:url(admin/html/pages/ImagenesPropiedades/<?=$FotoPro?>); background-size:cover; background-repeat:no-repeat; height:287px; "> 
                <a href="detalles.php?Id=<?=$IdC?>">
                  <div class="descripcion">
                    <div class="col-sm-4 "> <span class="tipo"> <?=$NombreTipo?> </span></div>
                    <div class="col-sm-4"> <span class="lugar"> <?=$Localizacion?> </span></div>
                    <div class="col-sm-4"> <span class="precio"> <?=$Precio?> </span></div>
                  </div>
                </a>
              </li>
              <?}?>
              </ul>
            </div>
            
            <!--======= THUMBS =========-->
            <div id="carousel" class="flexslider">
              <ul class="slides">
                <?
                for($x=0;$x<count($Listado);$x++){
                ?>
                <li><img class="img-responsive" src="admin/html/pages/ImagenesPropiedades/p/<?=$Listado[$x]?>" alt=""></li>
                <?}?>
              </ul>
            </div>
          </div>
       
          
        </section>
        </li>
        
      
        <li style="padding-top:60px;" class="col-sm-6">
        <div class="row">
         <div style="padding-bottom:20px;;" class="col-sm-6">
         <img width="100%" src="admin/html/pages/General/Lonja/<?=$FotoL?>"/>
         
        </div>
        
           <div class="col-sm-6 texto">
          <h5><?=$TituloL?></h5>
          <hr>
          
          <p><?=$DescripcionL?></p>
          
          </div>
          
          </div>
          
           <div class="row">
          <div class="col-sm-6">
         <img width="100%" src="admin/html/pages/General/ConsigneInicio/<?=$FotoK?>"/>
         
        </div>
        
           <div class="col-sm-6 texto">
          <h5><?=$TituloK?></h5>
          <hr>
          
          <p><?=$DescripcionK?></p>
          
          <a href="consigne.php" class="btn"><?if($_SESSION["Lang"]=="EN"){?>More information<?}else{?> Ampliar Información<?}?></a>
          
          </div>
          
          </div>
          
         
        </li>
        
     
      </ul>
    </div>
  </footer>
  
  <!--======= RIGHTS =========-->
  <?include("includes/footer.php");?>
</div>
<script src="js/jquery-1.11.0.min.js"></script> 
<script src="js/wow.min.js"></script> 
<script src="js/bootstrap-select.js"></script> 
<script src="js/bootstrap-select.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.stellar.js"></script> 
<script src="js/jquery.flexslider-min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/jquery.sticky.js"></script> 
<script src="js/own-menu.js"></script> 
<script src="js/jquery.nouislider.min.js"></script> 
<script src="js/main.js"></script> 
<script type="text/javascript">
  /*-----------------------------------------------------------------------------------*/
/*    PRICE RANGE
/*-----------------------------------------------------------------------------------*/
$("#price-range").noUiSlider({
  range: {
      'min': [ 0 ],
      'max': [ 10000000]},
  start: [0, 10000000],
       connect:true,
       serialization:{
           lower: [
         $.Link({
          target: $("#price-min")
        })],
   upper: [
          $.Link({
          target: $("#price-max")
        })],
   format: {
      // Set formatting
          decimals: 0,
          prefix: '$'
  }}
});
</script>


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