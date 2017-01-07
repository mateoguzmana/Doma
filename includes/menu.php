<?

$Act    =    $_SERVER["REQUEST_URI"];
$Act    =    explode("/", $Act);
$Ect    =    explode(".", $Act[2]);
$Rean   =    $Ect[0];

if(empty($Rean) || ($Act[2]=="?Lang=EN") || ($Act[2]=="?Lang=ES")){
$Rean="index";	
}
/*
$Lang   =    $_REQUEST["Lang"];

if($Lang=="EN"){
$UR     ="?Lang=EN";
}*/

?>
        <ul class="ownmenu">
          <li <?if($Rean=="index"){?>class="active"<?}?>><a href="index.php<?=$UR?>"><?if($_SESSION["Lang"]=="EN"){?>Home<?}else{?>Inicio<?}?></a></li>
          <li <?if($Rean=="empresa"){?>class="active"<?}?>><a href="empresa.php<?=$UR?>"><?if($_SESSION["Lang"]=="EN"){?>About us<?}else{?>Quienes Somos<?}?></a></li>
          <li <?if($Rean=="propiedades"){?>class="active"<?}?>><a href="propiedades.php<?=$UR?>"><?if($_SESSION["Lang"]=="EN"){?>Properties for sale<?}else{?>Propiedades en Venta<?}?></a></li>
          <li <?if($Rean=="consigne"){?>class="active"<?}?>><a href="consigne.php<?=$UR?>"><?if($_SESSION["Lang"]=="EN"){?>Allocate your Property<?}else{?>Consigne su Inmueble<?}?></a></li>
          <li <?if($Rean=="contacto"){?>class="active"<?}?>><a href="contacto.php<?=$UR?>"><?if($_SESSION["Lang"]=="EN"){?>Contact<?}else{?>Contácto<?}?></a></li>
        </ul>