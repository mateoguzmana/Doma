<?
session_start();

//Parametros principales
$Pag      = $_REQUEST["P"];
$Lang     = $_SESSION["Lang"];
$search   = $_REQUEST["search"];

//Busqueda
$FG       = $_REQUEST["FG"];
$C        = $_REQUEST["C"];
$Ubc      = $_REQUEST["Ubc"];  
$Loc      = $_REQUEST["Loc"];  
$Min      = $_REQUEST["min"];
$Max      = $_REQUEST["max"];
$Order    = $_REQUEST["OrderBy"];

/*
if(!empty($Lang)){
$Urr="&Lang=".$Lang;
}*/

$UrOrder  = $_SERVER["REQUEST_URI"];
$UrOrder  = str_replace("&OrderBy=ASC", "", $UrOrder);
$UrOrder  = str_replace("&OrderBy=DESC", "", $UrOrder);
$UrOrder  = str_replace("?OrderBy=ASC", "", $UrOrder);
$UrOrder  = str_replace("?OrderBy=DESC", "", $UrOrder);

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


	
		<link href="cs/flexslider.css" rel="stylesheet" type="text/css">
	
		
		
		
		
		<link href="cs/style.css" rel="stylesheet" type="text/css">


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
  <?
  if(!empty($C)){

  $queryPI     = "SELECT * FROM Sesion WHERE Id='$C'";
  $resultPI    = mysql_query($queryPI,$id);
  
  while($rowPI = mysql_fetch_array($resultPI)){
  
  $NTitulos     = $rowPI["Nombre"];
  $NTitulosEN   = $rowPI["NombreEN"];  
  
  }
}
else{

  $NTitulos     = "Propiedades";
  $NTitulosEN   = "Properties";

}

  ?>
  <!--======= BANNER =========-->
  <div class="sub-banner">
    <div class="overlay">
      <div class="container">
        <h1><?if($Lang=="EN"){?><?=$NTitulosEN?> for sale<?}else{?><?=$NTitulos?> en Venta<?}?></h1>
       
      </div>
    </div>
  </div>
  
  
  
  
   <div class="container">
     <ul class="row">
        
        <!--======= PROPERTY =========-->
        <li class="col-sm-8"> 
   
   
      
      	<div class="flexslider main-flexslider animate-onscroll">
							
							<ul class="slides">
							<?
              $f=0;

              $query1       =    "SELECT * FROM Propiedades WHERE Fav=1 LIMIT 3";
              $result1      =    mysql_query($query1,$id);

              while($row1   =    mysql_fetch_array($result1)){

              $f++;

              $Id1          =    $row1["Id"];
              $Nombre1      =    $row1["Nombre"];
              $Nombre1EN    =    $row1["NombreEN"];
              $Precion      =    $row1["Precio"];
              $Arean        =    $row1["Area"];
              $Precion      =    number_format($Precion);
              $Descripcion  =    $row1["Descripcion"];
              $DescripcionEN=    $row1["DescripcionEN"];

              if($Lang=="EN"){
              $Nombre1    =$Nombre1EN;
              $Descripcion=$DescripcionEN;
              }

              $queryR       =    "SELECT * FROM FotosPropiedades WHERE Idpropiedad='$Id1' ORDER BY Pos LIMIT 1";
              $resultR      =    mysql_query($queryR,$id);

              while($rowR   =    mysql_fetch_array($resultR)){

              $FotoPRO      =    $rowR["Nombre"];

              }

              ?>	
								<li style="background-image:url(admin/html/pages/ImagenesPropiedades/<?=$FotoPRO?>);">
									<div class="slide ">
										<a href="detalles.php?Id=<?=$Id1?><?=$Urr?>"><h5><?=$Nombre1?></h5></a>
                    <p><strong>Area:</strong> <?=$Arean?> m2, <strong><?if($Lang=="EN"){?>Price<?}else{?>Precio<?}?>:</strong> <?=$Precion?> &nbsp;&nbsp;  
                    <a href="detalles.php?Id=<?=$Id1?><?=$Urr?>" class="button big button-arrow"><?if($Lang=="EN"){?>See more<?}else{?>ver más<?}?></a></p>
									</div>
								</li>
							<?}?>	
							</ul>
							
						</div>	
						
   
   
      
      
      </li>
   
   
   
   
   
    <li class="col-md-4">
      <form method="get" action="propiedades.php">
      <input type="hidden" name="search" value="1">
      <!--======= FORM SECTION =========-->
      <div class="find-sec1">
        <ul class="row">
          
          <li class="col-sm-12">
            <label><?if($Lang=="EN"){?>Other groups of properties<?}else{?>Otros grupos de propiedades<?}?></label>
            <select class="selectpicker" name="C" id="C" onchange="Carga2()">
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

              if($C==$Id12){
              $sel12 = "selected";
              }else{
              $sel12 = "";  
              }

              ?>
              <option value="<?=$Id12?>" <?=$sel12?>><?=$Nombre12?></option>
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
            <select class="selectpicker" name="Loc" id="Loc">
              <option value="" selected><?if($Lang=="EN"){?>Select a location<?}else{?>Seleccione una localización<?}?></option>
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
      
      </li>
      
      
      
    
      
      
      
      
    </div>
  
  
  <!--======= PROPERTY =========-->
  <section class="properties white-bg">
    <div class="container">
      <div class="row" id="BtnOrdes">
        <div class="col-sm-9">&nbsp;</div>
        <div class="col-sm-3">
          <select name="Order" id="Order" class="form-control" onchange="window.document.location.href=this.options[this.selectedIndex].value;">
            <option value=""><?if($Lang=="EN"){?>Sort by<?}else{?>Ordenar por<?}?>:</option>
            <option value="<?=$UrOrder?><?if(empty($search) && empty($C) && empty($Pag)){?>?<?}else{?>&<?}?>OrderBy=ASC"><?if($Lang=="EN"){?>Ascending price<?}else{?>Precio ascendente<?}?></option>
            <option value="<?=$UrOrder?><?if(empty($search) && empty($C) && empty($Pag)){?>?<?}else{?>&<?}?>OrderBy=DESC"><?if($Lang=="EN"){?>Descending price<?}else{?>Precio descendente<?}?></option>
          </select>
          <br></br>
        </div>
      </div>
    
      <ul class="row">
        <?
        $filas=0;

        if(empty($Pag)){
        $Ini   = 0;
        $Limit =12;
        }else{
        $Ini=(($Pag*12)-12); 
        $Limit=12; 
        }

        if(empty($search) && empty($C) && empty($FG)){

          if(empty($Order)){
          $Order = "DESC";
          }

          $query       = "SELECT * FROM Propiedades ORDER BY Precio $Order LIMIT ".$Ini.",".$Limit;
          //$query       = "SELECT * FROM Propiedades P LEFT JOIN FotosPropiedades F ON P.Id=F.Idpropiedad ORDER BY F.Pos ASC LIMIT ".$Ini.",".$Limit;

        }elseif(!empty($FG) && empty($search) && empty($C)){

        if(empty($Order)){
          $Order = "DESC";
          }

        $query       = "SELECT * FROM Propiedades WHERE Tipo='$FG' ORDER BY Precio $Order";

        }
        elseif(!empty($C) && empty($search) && empty($FG)){

          if(empty($Order)){
          $Order = "DESC";
          }

          $Tips        = array();

          $query50     = "SELECT * FROM Tipo WHERE Idcategoria='$C'";
          $result50    = mysql_query($query50,$id);

          while($row50 = mysql_fetch_array($result50)){

          $Tip         = $row50["Id"];
          $Tips[]      = $Tip;

          }
          $Tips        = implode(",", $Tips);

          $query       = "SELECT * FROM Propiedades WHERE Tipo IN ($Tips) ORDER BY Precio $Order";
        
        }
        else{

          if(empty($Order)){
          $Order = "DESC";
          }

          $Tips        = array();

          $query50     = "SELECT * FROM Tipo WHERE Idcategoria='$C'";
          $result50    = mysql_query($query50,$id);

          while($row50 = mysql_fetch_array($result50)){

          $Tip         = $row50["Id"];
          $Tips[]      = $Tip;

          }

          $Tips        = implode(",", $Tips);

          $query60     = "SELECT * FROM Ubicacion WHERE Id='$Ubc'";
          $result60    = mysql_query($query60,$id);

          while($row60 = mysql_fetch_array($result60)){

          $UbcP        = $row60["Nombre"];

          }

          if(empty($C) && empty($Loc)){
          $query       = "SELECT * FROM Propiedades WHERE Precio BETWEEN '$Min' AND '$Max' &&  Ubicacion='$UbcP' ORDER BY Precio $Order";
          }
          elseif(empty($C)){
          $query       = "SELECT * FROM Propiedades WHERE Precio BETWEEN '$Min' AND '$Max' && Ubicacion='$UbcP' && Localizacion='$Loc' ORDER BY Precio $Order";
          }
          elseif(empty($Ubc)){
          $query       = "SELECT * FROM Propiedades WHERE Precio BETWEEN '$Min' AND '$Max' && Tipo IN ($Tips) ORDER BY Precio $Order";
          }
          elseif(empty($Loc)){
          $query       = "SELECT * FROM Propiedades WHERE Precio BETWEEN '$Min' AND '$Max' && Tipo IN ($Tips) && Ubicacion='$UbcP' ORDER BY Precio $Order";
          }
          else{
          $query       = "SELECT * FROM Propiedades WHERE Precio BETWEEN '$Min' AND '$Max' && Tipo IN ($Tips) && Ubicacion='$UbcP' && Localizacion='$Loc' ORDER BY Precio $Order";  
          }
          
        
        }
        $result      = mysql_query($query,$id);

        while($row   = mysql_fetch_array($result)){

        $filas++;

        $Id          = $row["Id"];
        $Nombre      = $row["Nombre"];
        $NombreEN    = $row["NombreEN"];
        $Precio      = $row["Precio"];
        $Tipo        = $row["Tipo"];
        $Localizacion= $row["Localizacion"];
        $Habitaciones= $row["Habitaciones"];
        $Banos       = $row["Banos"];
        $Area        = $row["Area"];

        if($Lang=="EN"){
        $Nombre=$NombreEN;
        }

        $query2      = "SELECT * FROM Tipo WHERE Id='$Tipo'";
        $result2     = mysql_query($query2,$id);

        while($row2  = mysql_fetch_array($result2)){

        $NombreTipo  = $row2["Nombre"];

        }

        $query3      = "SELECT * FROM FotosPropiedades WHERE Idpropiedad='$Id' ORDER BY Pos LIMIT 1";
        $result3     = mysql_query($query3,$id);

        while($row3  = mysql_fetch_array($result3)){

        $Foto        = $row3["Nombre"];

        }

        $Precio      = number_format($Precio);

        if($filas>0){
        ?>
        <!--======= PROPERTY =========-->
        <li class="col-sm-4"> 
          <!--======= TAGS =========--> 
          <section> 
            <!--======= IMAGE =========-->
            <div class="img"> 
            
<?
			$file 		='admin/html/pages/ImagenesPropiedades/'.$Foto;
			
			if(file_exists( $file ))
			{
				
			}
			else
			{
			$Foto	=	'no-disponible.jpg';	
			}
?>
            
            <img class="img-responsive" src="admin/html/pages/ImagenesPropiedades/p/<?=$Foto?>" alt="" > 
            
              <!--======= IMAGE HOVER =========-->
              
              <div class="over-proper"> <a href="detalles.php?Id=<?=$Id?><?=$Urr?>" class="btn font-montserrat"><?if($Lang=="EN"){?>More details<?}else{?>Ver más<?}?></a></div>
            </div>
            <!--======= HOME INNER DETAILS =========-->
            <ul class="home-in">
               <li><span><i class="fa fa-home"></i><strong><?if($Lang=="EN"){?>Area:<?}else{?>Área:<?}?></strong> <?=$Area?> m2 </span></li>
              <li class="habitaciones"><span><i class="fa fa-bed"></i> <strong><?if($Lang=="EN"){?>Beds:<?}else{?>Habitaciones:<?}?></strong> <?=$Habitaciones?> </span></li>
              <li class="baños"><span><i class="fa fa-tty"></i><strong><?if($Lang=="EN"){?>Baths:<?}else{?>Baños:<?}?></strong> <?=$Banos?> </span></li>
            </ul>
            <!--======= HOME DETAILS =========-->
            <div class="detail-sec"> 
            
              <div style="height:36px;">
            
            <a href="detalles.php?Id=<?=$Id?><?=$Urr?>" class="font-montserrat"><?=$Nombre?></a> 
            </div>
            
            <span class="locate"><i class="fa fa-map-marker"></i> <?=$Localizacion?></span>
             
              <div class="share-p"> <span class="price font-montserrat">$ <?=$Precio?></span>  </div>
            </div>
          </section>
        </li>
        <!--FIN PROPERTY -->
        <?}}
        if($filas==0){?>
        <h4 style="text-align:center;"><?if($Lang=="EN"){
        ?>No results found in the search.<?
        }else{?>No se han encontrado resultados en la busqueda.<?}?></h4>
        <script type="text/javascript">
        function Oc(){
        $("#BtnOrdes").hide();
        }
        setTimeout("Oc()",100);
        
        </script>
  <?        }
        ?>
      </ul>
      <?
      $s=0;
      $query4      = "SELECT * FROM Propiedades";
      $result4     = mysql_query($query4,$id);

      while($row4  = mysql_fetch_array($result4)){
      $s++;
      }

      $TotalPag = ($s/12);
      $TotalPag = ceil($TotalPag);

      if(empty($Pag)){
      $r=1;  
      }else{
      $r=$Pag;  
      }
      ?>
      <?if(empty($search) && empty($C) && empty($FG)){?>
      <nav>
        <ul class="pagination">
          <?if($r>1){?><li><a href="propiedades.php?P=<?=($r-1)?><?=$Urr?>"><i class="fa fa-angle-double-left"></i> </a></li><?}?>
          <?for($x=$r;$x<=($r+3);$x++){
          if($x<=$TotalPag){?>
          <li class="<?if($r==$x){?>active<?}?>"><a href="propiedades.php?P=<?=$x?><?=$Urr?>"><?=$x?></a></li>
          <?}
          }?>
          <?if($x<=$TotalPag){?><li><a href="propiedades.php?P=<?=($r+1)?><?=$Urr?>"><i class="fa fa-angle-double-right"></i> </a></li><?}?>
        </ul>
      </nav>
      <?}?>
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

<script type="text/javascript" src="jss/modernizr.js"></script>
<script type="text/javascript" src="jss/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="jss/chosen.jquery.min.js"></script>
<script type="text/javascript" src="jss/script.js"></script>
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

<?if($_REQUEST["C"]){?>
  setTimeout("Carga2()",5000);
<?}?>

</script>

</body>
</html>