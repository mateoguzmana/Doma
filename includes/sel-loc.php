<select class="selectpicker" name="Loc" id="Loc" style="display:none;">
<option value="">Seleccione una localizacion</option>
<?
include("conexion.php");

$Id   			 = $_REQUEST["Id"];

$query11         = "SELECT * FROM Localizacion WHERE Idubicacion='$Id' AND Muestra=0";
$result11        = mysql_query($query11,$id);

while($row11     = mysql_fetch_array($result11)){
$Id11            = $row11["Id"];
$Nombre11        = $row11["Nombre"];

$Ids[] 			 = $Id11;
$Nombres[]       = $Nombre11;

?>
<option id="r<?=$f?>" value="<?=$Nombre11?>"><?=$Nombre11?></option>
<?}?>
</select>
<div class="btn-group bootstrap-select">
	<button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown" data-id="Ubc" title="Seleccione una localizacion" aria-expanded="false">
		<span id="ingtet" class="filter-option pull-left">Seleccione una localizacion</span>&nbsp;<span class="caret"></span></button>
		<div class="dropdown-menu open" style="max-height: 480px; overflow: hidden; min-height: 79px;">
			<ul class="dropdown-menu inner selectpicker" role="menu" style="max-height: 479px; overflow-y: auto; min-height: 78px;">
				<li data-original-index="0" onclick="sel(0);"><a tabindex="0" class="" data-normalized-text="<span class=&quot;text&quot;>Seleccione una ubicacion</span>">
					<span class="text">Seleccione una Localización</span>
					<span class="glyphicon glyphicon-ok check-mark"></span></a>
				</li>
					<?
					for($x=0;$x<count($Ids);$x++){
					$r = ($x+1);
					?>
					<li data-original-index="<?=$r?>" onclick="sel(<?=$r?>);"><a tabindex="0" class="" data-normalized-text="<span class=&quot;text&quot;><?=$Nombres[$x]?></span>">
						<span class="text"><?=$Nombres[$x]?></span><span class="glyphicon glyphicon-ok check-mark"></span></a>
					</li>
					<?}?>
		</div>
</div>