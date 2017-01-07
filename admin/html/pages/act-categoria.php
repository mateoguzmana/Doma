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
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1403937875" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/DataTables/TableTools.css?1403937875" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/toastr/toastr.css?1403937848" />
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1401481649"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1401481651"></script>
		<![endif]-->
        
        
        
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
						<!-- START DATATABLE 1 -->
						<div class="row">
							<div class="col-lg-12">
								<div class="box">
									<div class="box-body table-responsive">
										<table class="table table-striped table-hover">
											<thead>
												<tr>
													<th>Nombre</th>
													<th align="right"></th>

												</tr>
											</thead>
											<tbody id="Fotos">
                                            
												<?
												

							$MosPerz1		=	0;
							$MosPerz2		=	0;
					

							
							$queryPerz1			="SELECT* FROM Permisos where Idtipo = '$tipouzer'  and Men = '$Idmenux' and Submenu = '$Idsubmenux' and Opciones = '$Idopcmenux' ";
							$resultPerz1		=mysql_query($queryPerz1, $id);
							
							while($rowPerz1		=mysql_fetch_array($resultPerz1))
							{
							$MosPerzA			=$rowPerz1["Act"];
							$MosPerzB			=$rowPerz1["Del"];
							
							
								if($MosPerzA > 0)
								{
								$MosPerz1	=	1;
								}
							
								if($MosPerzB > 0)
								{
								$MosPerz2	=	1;
								}
							}

												
												
												
												
												
												
												
                                                $cont				=0;
												$queryUSERS			="SELECT* FROM Sesion Order by Pos";
                                                $resultUSERS		=mysql_query($queryUSERS, $id);
                                                
                                                While($rowUSERS		=mysql_fetch_array($resultUSERS))
                                                {
											    $IdUSERS			=$rowUSERS["Id"];
												$Nombre				=$rowUSERS["Nombre"];
												$cont++;

                                                ?>
<script language="JavaScript">
<!--
function confirmSubmit<?=$cont?>() 
{ 
var agree=confirm("Realmente desea eliminar este registro? "); 
if (agree) 
{
location.href='eli-sesion.php?Id=<?=$IdUSERS?>&Idsubmenu=<?=$_REQUEST["Idsubmenu"]?>&Idmenu=<?=$_REQUEST["Idmenu"]?>&Idopcmenu=<?=$_REQUEST["Idopcmenu"]?>';	
return true ; 
}
else 
return false ; 
}

//-->
</script>
												<tr id="arrayorder_<?php echo $IdUSERS ?>">
													<td><?=$Nombre?></td>
													<td class="text-right">
                                                    
                                                        <?
                                                        if($MosPerz1 == 1)
														{
														?>                                                    
														<input name="Procesar" type="button" class="btn btn-primary" value="MODIFICAR"  onClick="location.href='act-categoria-2.php?Id=<?=$IdUSERS?>&Idsubmenu=<?=$_REQUEST["Idsubmenu"]?>&Idmenu=<?=$_REQUEST["Idmenu"]?>&Idopcmenu=<?=$_REQUEST["Idopcmenu"]?>'"> 
                                                        <?
														}
														?> 
                                                        
                                                        
                                                        <?
                                                        if($MosPerz2 == 1)
														{
														?>  
													<input name="Eliminar" type="button" class="btn btn-danger" value=" ELIMINAR "  onClick='return confirmSubmit<?=$cont?>()'>
                                                        <?
														}
														?> 
                                                    </td>

												</tr>
                                                

                                                
                                                <?
												}
												?>
                                                <tr><td colspan="2" id="response" class="alert alert-success text-center"></td></tr>
											</tbody>
										</table>
									</div><!--end .box-body -->
								</div><!--end .box -->
							</div><!--end .col-lg-12 -->
						</div>
						<!-- END DATATABLE 1 -->


					</div>
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		
		<script src="../../assets/js/libs/jquery/jquery-1.11.0.min.js"></script>
		<script src="../../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="../../assets/js/core/BootstrapFixed.js"></script>
		<script src="../../assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../../assets/js/libs/spin.js/spin.min.js"></script>
		<script src="../../assets/js/libs/DataTables/jquery.dataTables.js"></script>
		<script src="../../assets/js/libs/DataTables/extras/ColVis/js/ColVis.js"></script>
		<script src="../../assets/js/libs/DataTables/extras/TableTools/media/js/TableTools.js"></script>
		<script src="../../assets/js/libs/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="../../assets/js/core/demo/DemoTableDynamic.js"></script>
		<script src="../../assets/js/libs/toastr/toastr.min.js"></script>
		<script src="../../assets/js/core/demo/DemoUIMessages.js"></script>
		<script src="../../assets/js/core/App.js"></script>
		<script src="../../assets/js/core/demo/Demo.js"></script>
		<script>(function($){var a=$.ui.mouse.prototype._mouseMove;$.ui.mouse.prototype._mouseMove=function(b){if($.browser.msie&&document.documentMode>=9){b.button=1};a.apply(this,[b]);}}(jQuery));</script>
		<!-- END JAVASCRIPT -->
		<script type="text/javascript">
			$(document).ready(function(){ 	
			function slideout(){
			  setTimeout(function(){
			  $("#response").slideUp("slow", function () {
			      });
			    
			}, 2000);}
		    $("#response").hide();
			$(function() {
			$("#Fotos").sortable({ opacity: 0.8, cursor: 'move', update: function() {
					var order = $(this).sortable("serialize") + '&update=update&tabla=Sesion'; 
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
