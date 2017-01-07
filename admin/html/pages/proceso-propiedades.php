<?
session_start();

include("../../includes/conexion.php");

if (empty($_SESSION['sesionx']))
{
?>
<script type="text/javascript">

	alert('Su sesion ha finadlizado.');
	parent.location.href=('login.php');

</script>
<?
}

$_SESSION['anterior']	=	$_SERVER['REQUEST_URI']; 


?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,600,700,800' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/bootstrap.css?1403937764" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/boostbox.css?1403937765" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/boostbox_responsive.css?1403937765" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/font-awesome.min.css?1401481653" />
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1401481649"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1401481651"></script>
		<![endif]-->
	</head>
	<body >

		<!-- BEGIN HEADER-->
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">
			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> <?=$NombreTITMEN?></h3>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="box style-transparent">
									<div class="tab-content">
										<!-- START PROFILE EDITOR -->
										<div class="tab-pane active" id="editDetails">
											<div class="box-body style-white">
												<table class="table table-hover">
													<thead>
														<th>Id</th>
														<th>Código</th>
														<th>Tipo</th>
														<th>Titulo</th>
														<th>Ubicación</th>
														<th>Localizacion</th>
														<th>Precio</th>
														<th>Area</th>
														<th>Garaje</th>
														<th>Piezas</th>
														<th>Baños</th>
														<th>Latitud</th>
														<th>Longitud</th>
														<th>Fotos</th>
														<th>Descripción</th>
													</thead>
													<?
													$query 		="SELECT * FROM wp_posts WHERE post_type='property' ORDER BY post_title";
													$result 	=mysql_query($query,$id);
													while($row 	=mysql_fetch_array($result)){

													$Id 		=$row["ID"];
													$Titulo 	=$row["post_title"];
													$Nombre 	=$row["post_name"];
													$Descripcion=$row["post_content"];

													$query2 	="SELECT * FROM wp_postmeta WHERE post_id='$Id'";
													$result2	=mysql_query($query2,$id);
													while($row2 =mysql_fetch_array($result2)){

													$key 		=$row2["meta_key"];

													if($key=="_cmb_furnish"){		$Codigo		=$row2["meta_value"];	}
													if($key=="_cmb_pro_country"){	$Ubicacion	=$row2["meta_value"];	}
													if($key=="_cmb_pro_location"){	$Location 	=$row2["meta_value"];	}
													if($key=="_cmb_textmoney"){		$Precio		=$row2["meta_value"];	}
													if($key=="_cmb_area"){			$Area 		=$row2["meta_value"];	}
													if($key=="_cmb_garage"){		$Garaje 	=$row2["meta_value"];	}
													if($key=="_cmb_beds"){			$Piezas 	=$row2["meta_value"];	}
													if($key=="_cmb_baths"){			$Banos 		=$row2["meta_value"];	}
													if($key=="_cmb_pro_lat"){		$Latitud 	=$row2["meta_value"];	}
													if($key=="_cmb_pro_long"){		$Longitud 	=$row2["meta_value"];	}
													
													}

													$query3 	="SELECT * FROM wp_term_relationships WHERE object_id='$Id'";
													$result3 	=mysql_query($query3,$id);
													while($row3 =mysql_fetch_array($result3)){
													$term 		=$row3["term_taxonomy_id"];
													$tl 		=$term;
													}
													$query4 	="SELECT * FROM wp_terms WHERE term_id='$term'";
													$result4 	=mysql_query($query4,$id);
													while($row4 =mysql_fetch_array($result4)){
													$Tipo 		=$row4["name"];
													}

													$Mapa 		="https://www.google.com.co/maps/dir//".$Latitud.",".$Longitud;

													$Precio		=str_replace(".","",$Precio);

													$Descripcion=explode("]", $Descripcion);
													$Descripcion=str_replace("[", "", $Descripcion);
													$IdFotos 	=explode(" ", $Descripcion[0]);
													$IdFotos 	=str_replace('ids="', '', $IdFotos[3]);
													$IdFotos 	=str_replace('"', '', $IdFotos);
													$IdFotos 	=explode(",", $IdFotos);


													$ConsultaMADRE="INSERT INTO Propiedades (Nombre, Codigo, Tipo, Ubicacion, Localizacion, Area, Habitaciones, Banos, Garaje, Precio, Descripcion, Mapa, Latitud, Longitud)";
													$ConsultaMADRE.="VALUES ('$Titulo', '$Codigo', '$tl', '$Ubicacion', '$Location', '$Area', '$Piezas', '$Banos', '$Garaje', '$Precio', '$Descripcion[1]', '$Mapa', '$Latitud', '$Longitud');";
													$resultMADRE  =mysql_query($ConsultaMADRE,$id);


													$queryZ 	  ="SELECT * FROM Propiedades ORDER BY Id ASC";
													$resultZ 	  =mysql_query($queryZ,$id);
													while($rowZ   =mysql_fetch_array($resultZ)){
													$IdPropiedad  =$rowZ["Id"];	
													}

													for($x=0;$x<count($IdFotos);$x++)
														{
														$query5 	="SELECT * FROM wp_postmeta WHERE post_id='".$IdFotos[$x]."'";
														$result5	=mysql_query($query5,$id);
														while($row5 =mysql_fetch_array($result5)){
														$F 			=$row5["meta_value"];

														$FF 		=explode('"', $F);
														}
														
														$y 			=0;

														for($z=0;$z<=count($FF);$z++){
															$y++;
															$FFF	=strstr($FF[$z], "jpg");
															$FFFF 	=!strstr($FF[$z], "foto-no-disponible");

																if($FFF===false){
																//echo " ";
    															} 
    															else {
    																if($FFFF){

    																	if(strstr($FF[$z], "2015")  || strstr($FF[$z], "2016")){
    																		//echo ($FF[$z]);
    																		$t = explode("/", $FF[$z]);
    																		$Name 		= $IdPropiedad."-".$t[2];
																			$queryR3 	="INSERT INTO FotosPropiedades (Idpropiedad, Nombre, Pos) VALUES ('$IdPropiedad', '$Name', '$z')";
																			$resultR3 	=mysql_query($queryR3,$id);

    																		copy("http://domainmobiliaria.com/web/wp-content/uploads/".$FF[$z], "ImagenesPropiedades/".$Name);
    																	}
    																}
            													}
            												}

														  	}
													
													?>
													<tr>
														<td><?=$Id?></td>
														<td><?=$Codigo?></td>
														<td><?=$Tipo?></td>
														<td><?=$Titulo?></td>
														<td><?=$Ubicacion?></td>
														<td><?=$Location?></td>
														<td><?=$Precio?></td>
														<td><?=$Area?></td>
														<td><?=$Garaje?></td>
														<td><?=$Piezas?></td>
														<td><?=$Banos?></td>
														<td><?=$Latitud?></td>
														<td><?=$Longitud?></td>
														<td>
														<?
																		
														
														?>
														</td>
														<td><?=$Descripcion[1]?></td>
													</tr>
													<?
													}
													?>
												</table>
											</div><!--end .box-body -->
										</div><!--end .tab-pane -->
										<!-- END PROFILE EDITOR -->

									</div><!--end .tab-content -->
								</div><!--end .box -->
							</div><!--end .col-lg-12 -->
						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<script src="../../assets/js/libs/jquery/jquery-1.11.0.min.js"></script>
		<script src="../../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="../../assets/js/core/BootstrapFixed.js"></script>
		<script src="../../assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../../assets/js/libs/spin.js/spin.min.js"></script>
		<script src="../../assets/js/libs/moment/moment.min.js"></script>
		<script src="../../assets/js/libs/flot/jquery.flot.min.js"></script>
		<script src="../../assets/js/libs/flot/jquery.flot.time.min.js"></script>
		<script src="../../assets/js/libs/flot/jquery.flot.resize.min.js"></script>
		<script src="../../assets/js/libs/flot/jquery.flot.orderBars.js"></script>
		<script src="../../assets/js/libs/flot/jquery.flot.pie.js"></script>
		<script src="../../assets/js/libs/jquery-knob/jquery.knob.js"></script>
		<script src="../../assets/js/libs/sparkline/jquery.sparkline.min.js"></script>
		<script src="../../assets/js/libs/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="../../assets/js/core/demo/DemoCharts.js"></script>
		<script src="../../assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="../../assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
		<script src="../../assets/js/core/App.js"></script>
		<script src="../../assets/js/core/demo/Demo.js"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
