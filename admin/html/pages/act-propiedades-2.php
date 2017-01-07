<?
session_start();

if (empty($_SESSION['sesionx']))
{
?>
<script type="text/javascript">

	alert('Su sesion ha finadlizado.');
	parent.location.href=('login.php');

</script>
<?
}

include("../../includes/conexion.php");

$_SESSION['anterior']	=	$_SERVER['REQUEST_URI']; 

$IdUS						=	$_REQUEST['Id']; 


				
					$queryTITMEN		="SELECT* FROM Menusub WHERE Id = ".$_REQUEST["Idsubmenu"] ;
					$resultTITMEN		=mysql_query($queryTITMEN, $id);
					
					While($rowTITMEN	=mysql_fetch_array($resultTITMEN))
					{
					$NombreTITMEN		=$rowTITMEN["Nombre"];
					}
					
					
					$queryTITMENO		="SELECT* FROM Menuopc WHERE Id = ".$_REQUEST["Idopcmenu"] ;
					$resultTITMENO		=mysql_query($queryTITMENO, $id);
					
					While($rowTITMENO	=mysql_fetch_array($resultTITMENO))
					{
					$NombreTITMENO		=$rowTITMENO["Nombre"];
					}
					
					$LineaMenuS			=$NombreTITMEN;
					
					
					
					
					
					
					 $query				="SELECT* FROM Propiedades where Id = '$IdUS'";
					 $result			=mysql_query($query, $id);
													
					 while($row			=mysql_fetch_array($result))
					 {
					 $Nombre			=$row["Nombre"];
					 $NombreEN 			=$row["NombreEN"];
					 $Codigo 			=$row["Codigo"];
					 $Tipo				=$row["Tipo"];	
					 $Ubicacion			=$row["Ubicacion"];
					 $Localizacion		=$row["Localizacion"];
					 $Area				=$row["Area"];
					 $Habitaciones		=$row["Habitaciones"];
					 $Banos				=$row["Banos"];
					 $Garaje			=$row["Garaje"];
					 $Precio 			=$row["Precio"];
					 $Descripcion 		=$row["Descripcion"];
					 $DescripcionEN 	=$row["DescripcionEN"];
					 $Mapa 				=$row["Mapa"];
					 }
						
					 $Count				=0;


					 $decimales 	= explode(".",$Precio);
					 $CuantosS	= $decimales[1];
					 $CuantosDS	= strlen($CuantosS);
						
					if($CuantosDS == 1)
					{
					$Precio				=$Precio.'0';	
					}
					elseif($CuantosDS == 0)
					{
					$Precio				=$Precio.'00';	
					}
					elseif($CuantosDS == 2)
					{
					$Precio				=$Precio;	
					}

					$queryR   	="SELECT * FROM Tipo WHERE Id='$Tipo'";
					$resultR	=mysql_query($queryR,$id);
					while($rowR =mysql_fetch_array($resultR)){
					$NombreR 	=$rowR["Nombre"];
					}

						
					$query88            = "SELECT * FROM Ubicacion WHERE Nombre='$Ubicacion'";
					$result88 			= mysql_query($query88,$id);
					while($row88 		= mysql_fetch_array($result88)){

					$Idubicacion		= $row88["Id"];

					}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?
        include("../../includes/title.php");
		?>

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
        
        
<SCRIPT language=Javascript>
<!--
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
	return true;
	}
	//-->
</SCRIPT> 
        
	</head>
	<body >

		<!-- BEGIN HEADER-->
		<header id="header">

<?
include("../../includes/navbar.php");
?>

		</header>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN SIDEBAR-->
			<div id="sidebar">
			  <div class="sidebar-back"></div>
			  <div class="sidebar-content">
			    <div class="nav-brand"> <a class="main-brand" href="zona.php">
			      <h3 class="text-light text-white"><span>Doma</span></h3>
			      </a> 
               </div>

<?
include("../../includes/menu.php");
?>


		      </div>
		  </div><!--end #sidebar-->
			<!-- END SIDEBAR -->
            
            
			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> <?=$LineaMenuS?></h3>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="box style-transparent">
									<!-- START PROFILE TABS -->
									<div class="box-head">
										<ul class="nav nav-tabs tabs-transparent" data-toggle="tabs">
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Datos de la propiedad</a></li>
										</ul>
									</div>
									<!-- END PROFILE TABS -->

									<div class="tab-content">

										<!-- START PROFILE EDITOR -->
										<div class="tab-pane active" id="editDetails">
											<div class="box-body style-white">
												
												<form class="form-horizontal form-validate" role="form" method="post" action="act-propiedades-3.php" enctype="multipart/form-data" novalidate>
                                                
                                                <input id="Id" name="Id" type="hidden" value="<?=$IdUS?>">
													<div class="row">
                                                		<div class="col-sm-12">
                                                			<h4>Información de la propiedad</h4>
                                                			<hr size="90%">
                                                		</div>
                                                	</div>
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Nombre" class="control-label">Nombre</label>
																	<input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Nombre" value="<?=$Nombre?>" onChange="javascript:this.value=this.value.toUpperCase();" required>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="NombreEN" class="control-label">Nombre inglés</label>
																	<input type="text" name="NombreEN" id="NombreEN" class="form-control" placeholder="Nombre inglés" value="<?=$NombreEN?>" onChange="javascript:this.value=this.value.toUpperCase();" required>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Codigo" class="control-label">Código del inmueble</label>
																	<input type="text" name="Codigo" id="Codigo" class="form-control" placeholder="Codigo" value="<?=$Codigo?>" onChange="javascript:this.value=this.value.toUpperCase();" required>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Tipo" class="control-label">Tipo</label>
																	<select name="Tipo" id="Tipo" class="form-control" required>
																	<option value="<?=$Tipo?>"><?=$NombreR?></option>
																	<?
																	$query3   	="SELECT * FROM Tipo WHERE Muestra=0 AND Id<>'$Tipo'";
																	$result3	=mysql_query($query3,$id);
																	while($row3 =mysql_fetch_array($result3)){
																	$IdQ 		=$row3["Id"];
																	$NombreQ 	=$row3["Nombre"];
																	?>
																	<option value="<?=$IdQ?>"><?=$NombreQ?></option>
																	<?
																	}
																	?>
																	</select>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Ubicacion" class="control-label">Ubicación</label>
																	<!--<input type="text" name="Ubicacion" id="Ubicacion" class="form-control" value="<?=$Ubicacion?>" onChange="javascript:this.value=this.value.toUpperCase();" equired>-->
																	<select name="Ubicacion" id="Ubicacion" class="form-control" required onchange="Carga2();">
																	<option value="<?=$Ubicacion?>"><?=$Ubicacion?></option>
																	<?
																	$queryZ   	="SELECT * FROM Ubicacion WHERE Muestra=0 AND Nombre<>'$Ubicacion'";
																	$resultZ	=mysql_query($queryZ,$id);
																	while($rowZ =mysql_fetch_array($resultZ)){
																	$IdZ 		=$rowZ["Id"];
																	$NombreZ 	=$rowZ["Nombre"];
																	?>
																	<option value="<?=$NombreZ?>"><?=$NombreZ?></option>
																	<?
																	}
																	?>
																	</select>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Localizacion" class="control-label">Localización</label>
																	<!--<input type="text" name="Localizacion" id="Localizacion" class="form-control" value="<?=$Localizacion?>" onChange="javascript:this.value=this.value.toUpperCase();" required>-->
																	<select name="Localizacion" id="Localizacion" class="form-control" required>
																	<option value="<?=$Localizacion?>"><?=$Localizacion?></option>
																	<?
																	$queryK   	="SELECT * FROM Localizacion WHERE Muestra=0 AND Nombre<>'$Localizacion' AND Idubicacion='$Idubicacion'";
																	$resultK	=mysql_query($queryK,$id);
																	while($rowK =mysql_fetch_array($resultK)){
																	$IdK 		=$rowK["Id"];
																	$NombreK 	=$rowK["Nombre"];
																	?>
																	<option value="<?=$NombreK?>"><?=$NombreK?></option>
																	<?
																	}
																	?>
																	</select>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Precio" class="control-label">Precio</label>
																	<input type="text" name="Precio" id="Precio" class="form-control dollar-mask" placeholder="Precio" value="<?=$Precio?>" onChange="javascript:this.value=this.value.toUpperCase();" required>
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Area" class="control-label">Area</label>
																	<input type="text" name="Area" id="Area" class="form-control" placeholder="Area" value="<?=$Area?>" onChange="javascript:this.value=this.value.toUpperCase();" required>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Habitaciones" class="control-label">Habitaciones</label>
																	<input type="number" name="Habitaciones" id="Habitaciones" class="form-control" placeholder="Habitaciones" value="<?=$Habitaciones?>" onChange="javascript:this.value=this.value.toUpperCase();" required>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Banos" class="control-label">Baños</label>
																	<input type="number" name="Banos" id="Banos" class="form-control" placeholder="Baños" value="<?=$Banos?>" onChange="javascript:this.value=this.value.toUpperCase();" required>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Garaje" class="control-label">Garaje</label>
																	<input type="number" name="Garaje" id="Garaje" class="form-control" placeholder="Garaje" value="<?=$Garaje?>" onChange="javascript:this.value=this.value.toUpperCase();" required>
																</div>
															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Mapa" class="control-label">Mapa de la propiedad</label>
																	<textarea name="Mapa" id="Mapa" class="form-control" placeholder="Mapa" required><?=$Mapa?></textarea>
																</div>
															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Descripcion" class="control-label">Descripción</label>
																	<textarea name="Descripcion" id="Descripcion" class="form-control" placeholder="Descripcion" onChange="javascript:this.value=this.value.toUpperCase();" required><?=$Descripcion?></textarea>
																</div>
															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="DescripcionEN" class="control-label">Descripción inglés</label>
																	<textarea name="DescripcionEN" id="DescripcionEN" class="form-control" placeholder="DescripcionEN" onChange="javascript:this.value=this.value.toUpperCase();" required><?=$DescripcionEN?></textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-12">
															<div class="box box-outlined">
																<div class="box-head">
																	<header><h4 class="text-light"><i class="fa fa-fw fa-cogs"></i> Fotos</h4></header>
																	<div class="tools">
																		<div class="btn-group btn-group-transparent">
																			<a class="btn btn-equal btn-sm" onclick="IngFilaFotos();"><i class="fa fa-plus-square"></i></a>
																			<a class="btn btn-equal btn-sm btn-refresh"><i class="fa fa-refresh"></i></a>
																			<a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
																			<a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
																		</div>
																	</div>
																</div>
																<div class="box-body">
																	<table class="table table-hover">
																		<thead>
																			<th></th>
																			<th>Cambiar imagen</th>
																			<th>Foto</th>
																			<th></th>
																		</thead>
																		<tbody id="Fotos">
																			<?
																			$query2				="SELECT * FROM FotosPropiedades WHERE Idpropiedad='$IdUS' ORDER BY Pos";
					 														$result2 			=mysql_query($query2,$id);
					 														while($row2 		=mysql_fetch_array($result2)){
					 														$IdC 				=$row2["Id"];
					 														$Nombre 			=$row2["Nombre"];
					 														$Count++;
					 														?>
					 														<tr id="arrayorder_<?php echo $IdC ?>">
																			<td><?=$Count?></td>
																			<td><input type="file" class="form-control" name="Imagen<?=$Count?>" id="Imagen<?=$Count?>" accept="image/*"></td>
																			<td><a href="ImagenesPropiedades/<?=$Nombre?>" target="_blank">(Ver foto)</a><td>
					 														<td class="text-right"><button type="button" class="btn btn-danger" onclick="Eli(<?=$IdC?>);">Eliminar</button></td>
					 														</tr>
					 														<?
					 														}
					 														?>
					 														<tr><td colspan="4" id="response" class="alert alert-success text-center"></td></tr>
																		</tbody><input type="hidden" id="Numero2" name="Numero2" value="<?=$Count?>">
																	</table>
																</div><!--end .box-body -->
															</div><!--end .box -->
														</div>
													</div>

													<div class="form-group">
														<div class="col-sm-12">
															<label for="email" class="control-label"></label>
															<button type="submit" class="btn btn-primary">Realizar Operación</button>
														</div>
													</div>

												</form>
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
		<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
		<script src="../../assets/js/libs/jquery/jquery-1.11.0.min.js"></script>
		<script src="../../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
		<script src="../../assets/js/libs/inputmask/jquery.inputmask.bundle.min.js"></script>
		<script src="../../assets/js/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
		<script src="../../assets/js/core/demo/DemoFormComponents.js"></script>
		<script>(function($){var a=$.ui.mouse.prototype._mouseMove;$.ui.mouse.prototype._mouseMove=function(b){if($.browser.msie&&document.documentMode>=9){b.button=1};a.apply(this,[b]);}}(jQuery));</script>
		<!-- END JAVASCRIPT -->
		<script type="text/javascript">
		//Script para la tabla de fotos
		function IngFilaFotos(){
		var Tabla  = $("#Fotos");	
		var Ultima = $("#Fotos tr").filter(":last");
		var Numero1 = $("#Numero2").val();
		var Numero 	=parseInt(Numero1)+1;
		var Fila   ="<tr id='"+Numero+"'><td>"+Numero+"</td><td><input type='file' class='form-control' name='Imagen"+Numero+"' id='Imagen"+Numero+"' accept='image/*'></td><td>&nbsp;</td><td>&nbsp;</td><td class='text-right'><button type='button' onclick='Add("+Numero+")' class='btn btn-success'>Agregar</button></td></tr>";
		$('#Fotos tr:last').after(Fila);

		$("#Numero2").val(Numero);
		};
		function Eli(Id){
		if(confirm("¿Desea eliminar este registro?")){
		window.location.href="http://domainmobiliaria.com/web2/admin/html/pages/eli-foto-propiedades.php?Id="+Id;
		}
		}

		function Add(Num){
		var formData = new FormData();
		formData.append("Foto", document.getElementById("Imagen"+Num).files[0]);
		formData.append("Numero", Num);

		$.ajax({
                url: "act-foto-propiedades.php?Id=<?=$IdUS?>",
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
	    		processData: false
               })
                .done(function(res){
                    alert("Se ha actualizado con éxito");
                    window.location.reload();
                });	
		};
		CKEDITOR.replace('Descripcion');
		CKEDITOR.replace('DescripcionEN');
		$(document).ready(function(){ 	
		function slideout(){
		  setTimeout(function(){
		  $("#response").slideUp("slow", function () {
		      });
		    
		}, 2000);}
		    $("#response").hide();
			$(function() {
			$("#Fotos").sortable({ opacity: 0.8, cursor: 'move', update: function() {
					var order = $(this).sortable("serialize") + '&update=update&tabla=FotosPropiedades'; 
					$.post("updateList.php", order, function(theResponse){
						$("#response").html(theResponse);
						$("#response").slideDown('slow');
						slideout();
					}); 															 
				}								  
				});
			});
		});	


		function Carga2(){

		var Id = $("#Ubicacion").val();

		$.get("sel-loc.php?Id="+Id, function(data) {
		  $("#Localizacion").html(data);
		});

		}  
		</script>
	</body>
</html>
