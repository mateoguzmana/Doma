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



				
					$queryTITMEN		="SELECT* FROM Menusub WHERE Id = ".$_REQUEST["Idsubmenu"] ;
					$resultTITMEN		=mysql_query($queryTITMEN, $id);
					
					While($rowTITMEN	=mysql_fetch_array($resultTITMEN))
					{
					$NombreTITMEN		=$rowTITMEN["Nombre"];
					}
					
					
					$LineaMenuS			=$NombreTITMEN;
					
					
					$query 				="SELECT * FROM Inicio";
					$result 			=mysql_query($query,$id);
					while($row 			=mysql_fetch_array($result)) {
					$IdUS 				=$row["Id"];
					}
					
					$query2 			="SELECT * FROM Lonja";
					$result2 			=mysql_query($query2,$id);

					while($row2 		=mysql_fetch_array($result2)){

					$IdL  				=$row2["Id"];
					$Titulo 			=$row2["Titulo"];	
					$TituloIngles 		=$row2["TituloEN"];	
					$Descripcion 		=$row2["Descripcion"];	
					$DescripcionIngles	=$row2["DescripcionEN"];
					$Foto 				=$row2["Foto"];

					}

					$query3 			="SELECT * FROM ConsigneInicio";
					$result3 			=mysql_query($query3,$id);

					while($row3 		=mysql_fetch_array($result3)){

					$Id2  				=$row3["Id"];
					$Titulo2 			=$row3["Titulo"];	
					$TituloIngles2 		=$row3["TituloEN"];	
					$Descripcion2 		=$row3["Descripcion"];	
					$DescripcionIngles2	=$row3["DescripcionEN"];
					$Foto2 				=$row3["Foto"];

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
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Datos de la página</a></li>
										</ul>
									</div>
									<!-- END PROFILE TABS -->

									<div class="tab-content">

										<!-- START PROFILE EDITOR -->
										<div class="tab-pane active" id="editDetails">
											<div class="box-body style-white">
												
                                                <input id="Id" name="Id" type="hidden" value="<?=$IdUS?>">
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
																			<th>Foto</th>
																			<th></th>
																		</thead>
																		<tbody id="Fotos">
																			<?
																			$query2				="SELECT * FROM FotosInicio WHERE Idpropiedad='$IdUS' ORDER BY Pos";
					 														$result2 			=mysql_query($query2,$id);
					 														while($row2 		=mysql_fetch_array($result2)){
					 														$IdC 				=$row2["Id"];
					 														$Nombre 			=$row2["Nombre"];
					 														$Count++;
					 														?>
					 														<tr id="arrayorder_<?php echo $IdC ?>">
																			<td></td>
																			<td><a href="ImagenesInicio/<?=$Nombre?>" target="_blank"><img src="ImagenesInicio/<?=$Nombre?>" height="70"></a><input type="hidden" name="<?=$IdC?>" value="<?=$IdC?>"><td>
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
													<hr size="90%">
													<form class="form-horizontal form-validate" id="form" role="form" method="post" action="pag-inicio-3.php" enctype="multipart/form-data" novalidate>
													<input type="hidden" name="Id" value="<?=$IdL?>">
													<div class="row">
														<div class="col-sm-12"><h4>Afiliados a la lonja</h4></div>
													</div>
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Titulo" class="control-label">Titulo</label>
																	<input type="text" name="Titulo" id="Titulo" class="form-control" placeholder="Titulo" value="<?=$Titulo?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="TituloIngles" class="control-label">Titulo inglés</label>
																	<input type="text" name="TituloIngles" id="TituloIngles" class="form-control" placeholder="Titulo inglés" value="<?=$TituloIngles?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Descripcion" class="control-label">Descripción</label>
																	<textarea name="Descripcion" id="Descripcion" class="form-control" placeholder="Descripcion"  rows="5" required><?=$Descripcion?></textarea>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="DescripcionIngles" class="control-label">Descripción inglés</label>
																	<textarea name="DescripcionIngles" id="DescripcionIngles" class="form-control" placeholder="Descripcion inglés" rows="5" required><?=$DescripcionIngles?></textarea>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-8">
																	<label for="Foto" class="control-label">Foto</label>
																	<input type="file" name="Foto" id="Foto" class="form-control" accept="image/*">																</div>
																<div class="col-sm-4">
																	<br><br><a href="General/Lonja/<?=$Foto?>" target="_blank">(Ver foto)</a>
																</div>
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-12">
															<label for="email" class="control-label"></label>
															<button type="submit" class="btn btn-primary">Realizar Operación</button>
														</div>
													</div>
													</form>



													<hr size="90%">
													<form class="form-horizontal form-validate" id="form1" role="form" method="post" action="pag-inicio-4.php" enctype="multipart/form-data" novalidate>
													<input type="hidden" name="Id" value="<?=$Id2?>">
													<div class="row">
														<div class="col-sm-12"><h4>Consigne su inmueble</h4></div>
													</div>
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Titulo" class="control-label">Titulo</label>
																	<input type="text" name="Titulo" class="form-control" placeholder="Titulo" value="<?=$Titulo2?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="TituloIngles" class="control-label">Titulo inglés</label>
																	<input type="text" name="TituloIngles" class="form-control" placeholder="Titulo inglés" value="<?=$TituloIngles2?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="Descripcion" class="control-label">Descripción</label>
																	<textarea name="Descripcion" class="form-control" placeholder="Descripcion"  rows="5" required><?=$Descripcion2?></textarea>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-12">
																	<label for="DescripcionIngles" class="control-label">Descripción inglés</label>
																	<textarea name="DescripcionIngles"  class="form-control" placeholder="Descripcion inglés" rows="5" required><?=$DescripcionIngles2?></textarea>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-sm-8">
																	<label for="Foto" class="control-label">Foto</label>
																	<input type="file" name="Foto" class="form-control" accept="image/*">																</div>
																<div class="col-sm-4">
																	<br><br><a href="General/ConsigneInicio/<?=$Foto2?>" target="_blank">(Ver foto)</a>
																</div>
															</div>
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
		<script>(function($){var a=$.ui.mouse.prototype._mouseMove;$.ui.mouse.prototype._mouseMove=function(b){if($.browser.msie&&document.documentMode>=9){b.button=1};a.apply(this,[b]);}}(jQuery));</script>
		<!-- END JAVASCRIPT -->
		<script type="text/javascript">
		//Script para la tabla de fotos
		function IngFilaFotos(){
		var Tabla  = $("#Fotos");	
		var Ultima = $("#Fotos tr").filter(":last");
		var Numero1 = $("#Numero2").val();
		var Numero 	=parseInt(Numero1)+1;
		var Fila   ="<tr id='"+Numero+"'><td>&nbsp;</td><td><input type='file' class='form-control' name='Imagen"+Numero+"' id='Imagen"+Numero+"' accept='image/*'></td><td>&nbsp;</td><td class='text-right'><button type='button' onclick='Add("+Numero+")' class='btn btn-success'>Agregar</button></td></tr>";
		$('#Fotos tr:last').after(Fila);

		$("#Numero2").val(Numero);
		};
		function Eli(Id){
		if(confirm("¿Desea eliminar este registro?")){
		window.location.href="eli-foto-inicio.php?Id="+Id;
		}
		}

		function Add(Num){
		var formData = new FormData();
		formData.append("Foto", document.getElementById("Imagen"+Num).files[0]);
		formData.append("Numero", Num);

		$.ajax({
                url: "act-foto-inicio.php?Id=<?=$IdUS?>",
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

        $(document).ready(function(){ 	
		function slideout(){
		  setTimeout(function(){
		  $("#response").slideUp("slow", function () {
		      });
		    
		}, 2000);}
		    $("#response").hide();
			$(function() {
			$("#Fotos").sortable({ opacity: 0.8, cursor: 'move', update: function() {
					var order = $(this).sortable("serialize") + '&update=update&tabla=FotosInicio'; 
					$.post("updateList.php", order, function(theResponse){
						$("#response").html(theResponse);
						$("#response").slideDown('slow');
						slideout();
					}); 															 
				}								  
				});
			});
		});	
		</script>
	</body>
</html>
