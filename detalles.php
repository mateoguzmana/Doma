<?

session_start();

include("includes/conexion.php");

$Lang           =  $_SESSION["Lang"];

$Id             =  $_REQUEST["Id"];

/*
if(!empty($Lang)){
$Urr="&Lang=".$Lang;
}*/

$queryCON         =   "SELECT * FROM Consigne";
$resultCON        =   mysql_query($queryCON,$id);   

while($rowCON     =   mysql_fetch_array($resultCON)){

$FotoCON       =   $rowCON["Foto"]; 

}

$query          =  "SELECT * FROM Propiedades WHERE Id='$Id'";
$result         =  mysql_query($query,$id);

while($row      =  mysql_fetch_array($result)){

$Nombre         =  $row["Nombre"];
$NombreEN       =  $row["NombreEN"];
$Codigo         =  $row["Codigo"];
$Tipo           =  $row["Tipo"];
$Area           =  $row["Area"];
$Habitaciones   =  $row["Habitaciones"];
$Banos          =  $row["Banos"];
$Garaje         =  $row["Garaje"];      
$Precio         =  $row["Precio"];          
$Mapa           =  $row["Mapa"];     
$Descripcion    =  $row["Descripcion"];      
$DescripcionEN  =  $row["DescripcionEN"];    
$Latitud        =  $row["Latitud"];
$Longitud       =  $row["Longitud"];

$Precio         =  number_format($Precio);
}

if($Lang=="EN"){
$Nombre         =$NombreEN;
$Descripcion    =$DescripcionEN;  
}

$query2         =  "SELECT * FROM Tipo WHERE Id='$Tipo'";
$result2        =  mysql_query($query2,$id);

while($row2     =  mysql_fetch_array($result2)){

$Sex            =  $row2["Idcategoria"];
$NombreTipo     =  $row2["Nombre"];
$NombreTipoEN   =  $row2["NombreEN"];
}

if($Lang=="EN"){
$NombreTipo     =  $NombreTipoEN; 
}

$Fotos          =  array(); 

$query3         =  "SELECT * FROM FotosPropiedades WHERE Idpropiedad='$Id' ORDER BY Pos";
$result3        =  mysql_query($query3,$id);

while($row3     =  mysql_fetch_array($result3)){

$Fotos[]        =  $row3["Nombre"];

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
        <h1 class="detalles"><?=$Nombre?></h1>
        
       
      </div>
    </div>
  </div>
  
  <!--======= PROPERTIES DETAIL PAGE =========-->
  <section class="properti-detsil">
    <div class="container">
      <div class="row"> 
        
        <!--======= LEFT BAR =========-->
        <div class="col-sm-9"> 
          
          <!--======= THUMB SLIDER =========-->
          <div class="thumb-slider">
            <div id="slider" class="flexslider">
              <ul class="slides">
                <?
                for($d=0;$d<count($Fotos);$d++)
				{
					
				$file 		='admin/html/pages/ImagenesPropiedades/'.$Fotos[$d];
				
				if(file_exists( $file ))
				{
				$FotoPri	=	$Fotos[$d];	
				}
				else
				{
				$FotoPri	=	'no-disponible.jpg';	
				}
					
				?>
                
                <li><img class="img-responsive" src="admin/html/pages/ImagenesPropiedades/<?=$FotoPri?>" alt="" > </li>
                <?}?>
              </ul>
            </div>
            
            <!--======= THUMBS =========-->
            <div id="carousel" class="flexslider">
              <ul class="slides">
                <?
                for($x=0;$x<count($Fotos);$x++)
				{
				
				$filw 		='admin/html/pages/ImagenesPropiedades/p/'.$Fotos[$x];
				
				if(file_exists( $filw ))
				{
				$FotoPru	=	$Fotos[$x];	
				}
				else
				{
				$FotoPru	=	'no-disponible.jpg';	
				}
				
				
				?>
                <li> <img class="img-responsive" src="admin/html/pages/ImagenesPropiedades/p/<?=$FotoPru?>" alt=""> </li>
                <?}?>
              </ul>
            </div>
          </div>
          
          <!--======= HOME INNER DETAILS =========-->
       
          <div style="padding:20px 0px 20px 0px;">
          
          <div class="col-md-9">
          
          <span class="referencia"><strong><?if($Lang=="EN"){?>Property Code:<?}else{?>Código del Inmueble:<?}?> </strong><span style="color:#ba2121;"> <?=$Codigo?></span></span>
          <!--======= TITTLE =========-->
          <h5><?=$Nombre?></h5>
          
          </div>
          
          
           <div class="col-md-3">
          <section style="float:right;">  <span class="sale-tag price font-montserrat"> $<?=$Precio?></span> </section>
          
          
          </div>
          
          </div>
          
          
             <ul class="home-in">
            <li><span><strong><?if($Lang=="EN"){?>Type:<?}else{?>Tipo:<?}?></strong> <?=$NombreTipo?></span></li>
          
          
            <li><span><i class="fa fa-home"></i> <?=$Area?> m2</span></li>
            <li><span><i class="fa fa-bed"></i><strong><?if($Lang=="EN"){?>Beds:<?}else{?>Habitaciones:<?}?> </strong> <?=$Habitaciones?> </span></li>
            <li><span><i class="fa fa-tty"></i><strong><?if($Lang=="EN"){?>Baths:<?}else{?>Baños:<?}?></strong> <?=$Banos?> </span></li>
            <li><span><i class="fa fa-car"></i> <strong><?if($Lang=="EN"){?>Garage:<?}else{?>Garaje:<?}?></strong> <?=$Garaje?> </span></li>
          </ul>
          
          
      <?=$Descripcion?>
          
          
       
          
         
          
         
          
       
          
          <!--======= PROPERTY FEATURES =========-->
          <section class="info-property agents-info">
            <h5 class="tittle-head">DOMA INMOBILIARIA</h5>
            <div class="inner"> 
              <!--======= AGENT DETAILS =========-->
              <div class="row">
             
               
               
               
                <div class="col-sm-6">
                 
                      <img style="border:1px solid #e5e5e5;" width="100%" class="img-responsive" src="images/DOMA.jpg" alt="" > 
                      <?
                      $query15      = "SELECT * FROM Informacion";
                      $result15     = mysql_query($query15,$id);

                      while($row15  = mysql_fetch_array($result15)){
                      $Email        = $row15["Email"];
                      $Telefono     = $row15["Telefono"];
                      $Celular      = $row15["Celular"];

                      if($Sex==9){
                      $Celular="310 425 7395";
                      }



                      }
                      ?>
                
                      <p><span style="color:#071c4a;"><i class="fa fa-phone"></i></span> <?=$Telefono?> </p>
                      
                      <p><span style="color:#071c4a;"><i class="fa fa-mobile"></i></span> <?=$Celular?> </p>
                   
                      <p><span style="color:#071c4a;"><i class="fa fa-envelope-o"></i></span>  <a href=""><?=$Email?></a> </p>
                    
                      <p><span style="color:#071c4a;"><i class="fa fa-home"></i> </span> <a href="">www.domainmobiliaria.com</a> </p>
                   
                  
                   
                  
                  
                </div>
                
                
                 <div class="col-sm-6">
                 
                 <h4><?if($Lang=="EN"){?>Ask for information<?}else{?>Solicitar Información<?}?></h4>
                 
                  <form role="form" id="contact_form" method="post" onSubmit="return false">
                    <input type="hidden" name="tipo" value="2">
                    <input type="hidden" name="website" id="website" value="Formulario detalles">
                    
          <ul class="row">
            <li class="col-sm-12">
             
                <input type="text" class="form-control" name="name" id="name" placeholder="<?if($Lang=="EN"){?>Name<?}else{?>Nombre<?}?>" required>
             
            </li>
            <li class="col-sm-12">
            
                <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" required>
              
            </li>
            <li class="col-sm-12">
             
                <input type="text" class="form-control" name="company" id="company" placeholder="<?if($Lang=="EN"){?>Phone<?}else{?>Telefono<?}?>" required>
             
            </li>
           
            <li class="col-sm-12">
             
                <textarea class="form-control" name="message" id="message" rows="5" placeholder="<?if($Lang=="EN"){?>Message<?}else{?>Mensaje<?}?>" required></textarea>
           
            </li>
            <li class="col-sm-12">
              <button type="submit" value="submit" class="btn font-montserrat" id="btn_submit" onClick="proceed();"><?if($Lang=="EN"){?>Send Message<?}else{?>Enviar Mensaje<?}?></button>
            </li>
          </ul>
        </form>
                 
                
                
                    
                  
                   
                  
                  
                </div>
                
              </div>
            </div>
          </section>
          
          <!--======= PROPERTY FEATURES =========-->
          <section class="info-property location">
            <h5 class="tittle-head"><?if($Lang=="EN"){?>Property Location<?}else{?>Ubicación de la Propiedad<?}?></h5>
            <div class="inner"> 

            <!--<iframe src="https://maps.google.com/maps?q=<?=$Latitud?>,<?=$Longitud?>&z=14&amp;output=embed" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
            <?=$Mapa?>
            
            
            </div>
          </section>
        </div>
        
        <!--======= RIGT SIDEBAR =========-->
        <div class="col-sm-3 side-bar"> 
        
        
         <div   class="categories ">
            <h5><?if($Lang=="EN"){?>On sale<?}else{?>En Venta<?}?></h5>
            <hr>
            <ul>
              <?
              $query13      = "SELECT * FROM Tipo WHERE Muestra=0";
              $result13     = mysql_query($query13,$id);

              while($row13  = mysql_fetch_array($result13)){
              $Id13         = $row13["Id"];
              $Nombre13     = $row13["Nombre"]; 
              $Nombre13EN   = $row13["NombreEN"];

              if($Lang=="EN"){
              $Nombre13     =$Nombre13EN;
              }


              $p=0;

              $query14      = "SELECT * FROM Propiedades WHERE Tipo='$Id13'";
              $result14     = mysql_query($query14,$id);

              while($row14  = mysql_fetch_array($result14)){

              $p++;    
    
              }
              ?>
              <li><a href="propiedades.php?FG=<?=$Id13?>"> <?=$Nombre13?> <span>(<?=$p?>)</span></a></li>
              <?}?>
            </ul>
          </div>
        
        
         <!--======= SOCIAL =========-->
          <div class="flicker-post margin-t-40">
            <h5><?if($Lang=="EN"){?>Allocate your Property<?}else{?>Consigne su Inmueble<?}?></h5>
            <hr>
            
           <a href="consigne.php"> <img width="100%" src="admin/html/pages/General/Consigne/<?=$FotoCON?>"/></a>
            
          </div>
          
        
        
          
          <!--======= FIND PROPERTY =========-->
          <div class="finder margin-t-40"> 
           <form method="get" action="propiedades.php">
          <input type="hidden" name="search" value="1"> 
          <?
      if($Lang=="EN"){?>
      <input type="hidden" name="Lang" value="EN">
      <?
      }
      ?>
            <!--======= FORM SECTION =========-->
            <div class="find-sec">
              <h5><?if($Lang=="EN"){?>Search Property<?}else{?>Buscar Inmueble<?}?></h5>
              <ul class="row">
          
          <!--======= FORM =========-->
          <li class="col-sm-12">
            <label><?if($Lang=="EN"){?>Other groups of properties<?}else{?>Otros grupos de propiedades<?}?></label>
            <select class="selectpicker" name="C" id="C" required onchange="Carga2()">
              <option value=""><?if($Lang=="EN"){?>Select a category<?}else{?>Seleccione una categoria<?}?></option>
              <?
              $query12         = "SELECT * FROM Sesion";
              $result12        = mysql_query($query12,$id);

              while($row12     = mysql_fetch_array($result12)){
              $Id12            = $row12["Id"];
              $Nombre12        = $row12["Nombre"];
              $Nombre12EN      = $row12["NombreEN"];

              if($Lang=="EN"){
              $Nombre12=$Nombre12EN; 
              }
              ?>
              <option value="<?=$Id12?>"><?=$Nombre12?></option>
              <?}?>
            </select>
          </li>
          <!--======= FORM =========-->
          <li class="col-sm-12">
            <label><?if($Lang=="EN"){?>Ubication<?}else{?>Ubicación<?}?></label>
            <div id="Ubcd">
            <select class="selectpicker" name="Ubc" id="Ubc" onchange="Carga()">
                <option value=""><?if($Lang=="EN"){?>Select a ubication<?}else{?>Seleccione una ubicación<?}?></option>                                               
            </select>
            </div>
          </li>
          
          <!--======= FORM =========-->
          <li class="col-sm-12">
            <label><?if($Lang=="EN"){?>Location<?}else{?>Localización<?}?></label>
            <div id="Locd">
            <select class="selectpicker" name="Loc" id="Loc" required>
              <option value=""><?if($Lang=="EN"){?>Select a location<?}else{?>Seleccione una localización<?}?></option>
            </select>
            </div>
            
          </li>
          
          <!--======= Pricing Range =========-->
          <li class="col-sm-6">
            <label><?if($Lang=="EN"){?>Min Price<?}else{?>Precio Minimo<?}?></label>
            <select class="selectpicker" name="min">
               <option value="0">0</option>
               <option value="100000000"> 100.000.000</option>
               <option value="200000000"> 200.000.000</option>
               <option value="300000000"> 300.000.000</option>
               <option value="400000000"> 400.000.000</option>
               <option value="500000000"> 500.000.000</option>
               <option value="600000000"> 600.000.000</option>
               <option value="700000000"> 700.000.000</option>
               <option value="800000000"> 800.000.000</option>
               <option value="900000000"> 900.000.000</option>
               <option value="1000000000"> 1.000.000.000</option>
            </select>
          </li>
          <li class="col-sm-6">
            <label><?if($Lang=="EN"){?>Max Price<?}else{?>Precio Máximo<?}?></label>
            <select class="selectpicker" name="max">
               <option value="100000000"> 100.000.000</option>
               <option value="200000000"> 200.000.000</option>
               <option value="300000000"> 300.000.000</option>
               <option value="400000000"> 400.000.000</option>
               <option value="500000000"> 500.000.000</option>
               <option value="600000000"> 600.000.000</option>
               <option value="700000000"> 700.000.000</option>
               <option value="800000000"> 800.000.000</option>
               <option value="900000000"> 900.000.000</option>
               <option value="1000000000"> 1.000.000.000</option>
               <option value="2000000000"> 2.000.000.000</option>
               <option value="10000000000" selected> 10.000.000.000</option>
            </select>
          </li>
          <li class="col-lg-12">
            <div class="search">
              <button type="submit" class="btn"><?if($Lang=="EN"){?>Search<?}else{?>Buscar<?}?></button>
            </div>
          </li>
        </ul>
            </div>
            </form>
          </div>
          
          <!--======= CATEGORIES =========-->
         
         
          
        
          
          <!--======= SOCIAL =========-->
         
          
         
         
        
          
          
        </div>
      </div>
    </div>
  </section>
   <!--======= PROPERTY =========-->
      <section class="properties white-bg">
        <div class="container"> 
          
          <!--======= TITTLE =========-->
          <div class="tittle"> <img src="images/head-top.png" alt="">
            <h3><?if($Lang=="EN"){?>Other Properties<?}else{?>Otras Propiedades<?}?></h3>
          
          </div>
          
          <!--======= PROPERTIES ROW =========-->
          <ul class="row">
            <?
            $queryC           = "SELECT * FROM Propiedades WHERE Fav=1 LIMIT 3";
            $resultC          = mysql_query($queryC,$id);

            while($rowC       = mysql_fetch_array($resultC)){

            $IdC              = $rowC["Id"];
            $NombreC          = $rowC["Nombre"];
            $NombreCEN        = $rowC["NombreEN"];
            $AreaC            = $rowC["Area"];
            $HabitacionesC    = $rowC["Habitaciones"];
            $BanosC           = $rowC["Banos"];

            $LocalizacionC    = $rowC["Localizacion"];
            $PrecioC          = $rowC["Precio"];
            $PrecioC          = number_format($PrecioC);

            if($Lang=="EN"){
            $NombreC=$NombreCEN; 
            }


            $queryZ           = "SELECT * FROM FotosPropiedades WHERE Idpropiedad='$IdC' ORDER BY Pos LIMIT 1";
            $resultZ          = mysql_query($queryZ,$id);

            while($rowZ       = mysql_fetch_array($resultZ)){

            $FotoPro          = $rowZ["Nombre"]; 

            }
			
			$file 		='admin/html/pages/ImagenesPropiedades/'.$FotoPro;
			
			if(file_exists( $file ))
			{
				
			}
			else
			{
			$FotoPro	=	'no-disponible.jpg';	
			}
			
            ?>
            <!--======= PROPERTY =========-->
            <li class="col-sm-4"> 
              <!--======= TAGS =========-->
              <section> 
                <!--======= IMAGE =========-->
                <div class="img"> <img class="img-responsive" src="admin/html/pages/ImagenesPropiedades/p/<?=$FotoPro?>" alt="" > 
                  <!--======= IMAGE HOVER =========-->   
                  <div class="over-proper"> <a href="detalles.php?Id=<?=$IdC?><?=$Urr?>" class="btn font-montserrat"><?if($Lang=="EN"){?>More Details<?}else{?>Más Detalles<?}?></a> </div>
                </div>
                <!--======= HOME INNER DETAILS =========-->
                <ul class="home-in">
                    <li><span><i class="fa fa-home"></i> <?=$AreaC?> m2 </span></li>
              <li class="habitaciones"><span><i class="fa fa-bed"></i> <?=$HabitacionesC?> <?if($Lang=="EN"){?>Beds<?}else{?>Habitaciones<?}?></span></li>
              <li class="baños"><span><i class="fa fa-tty"></i> <?=$BanosC?> <?if($Lang=="EN"){?>Baths<?}else{?>Baños<?}?></span></li>
                </ul>
                <!--======= HOME DETAILS =========-->
                <div class="detail-sec"> <a href="detalles.php?Id=<?=$IdC?><?=$Urr?>" class="font-montserrat"><?=$NombreC?></a> <span class="locate"><i class="fa fa-map-marker"></i> <?=$LocalizacionC?></span> <span class="price-bg  font-montserrat">$ <?=$PrecioC?></span> <a href="detalles.php?Id=<?=$IdC?><?=$Urr?>" class="btn"><?if($Lang=="EN"){?>More Details<?}else{?>Más Detalles<?}?></a> </div>
              </section>
            </li>
            <?}?>
          </ul>
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
<script type="text/javascript">
function Carga(){

var Id = $("#Ubc option:selected").val();

$.get("includes/sel-loc.php?Id="+Id, function( data ) {
  $("#Locd").html(data);
});

}  


function sel(Id){

  $("#Locd li").removeClass("selected");
  $("#Locd li[data-original-index="+Id+"]").addClass("selected");
  var Tet = $("#Locd li[data-original-index="+Id+"] span.text").html();
  $("#Loc").val(Tet);
  $("#ingtet").html(Tet);

}

function Carga2(){

var Id = $("#C").val();

$.get("includes/sel-ubc.php?Id="+Id, function(data) {
  $("#Ubcd").html(data);
});

setTimeout("Carga()",100);
}  


function sel2(Id){

  $("#Ubcd li").removeClass("selected");
  $("#Ubcd li[data-original-index="+Id+"]").addClass("selected");
  var Tet = $("#Ubcd li[data-original-index="+Id+"] span.text").html();
  var ret = $("#Ubcd li[data-original-index="+Id+"]").attr("id");
  $("#Ubc").val(ret);
  $("#ingtet2").html(Tet);

  setTimeout('Carga()',100);
}

</script>
</body>
</html>