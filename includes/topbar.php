  <?
  session_start();

  include("conexion.php");
  
  $Actual   =    $_SERVER["REQUEST_URI"];
  $Actual   =    str_replace("?Lang=EN", "", $Actual);
  $Actual   =    str_replace("?Lang=ES", "", $Actual);
  $Actual   =    str_replace("&Lang=ES", "", $Actual);
  $Actual   =    str_replace("&Lang=EN", "", $Actual);

  $query    =    "SELECT * FROM Informacion";
  $result   =    mysql_query($query,$id);

  while($row=    mysql_fetch_array($result)){

  $Telefono =    $row["Telefono"];
  $Celular  =    $row["Celular"];
  $Email    =    $row["Email"];

  } 

  if(!empty($_REQUEST["Id"]) || !empty($Pag)){
  $indi="&";
  }else{
  $indi="?";  
  }

  ?>

  <div class="top-bar">
  
   <div class="container">
      <ul class="left-bar-side">
        <li>
          <p><i class="fa fa-phone"></i>  <?=$Telefono?> - <?=$Celular?> </p>
          <span>|</span> 
        </li>
        <li>
          <p><i class="fa fa-envelope-o"></i> <?=$Email?> </p>
          <span>|</span> 
        </li>
      </ul>
      <ul class="right-bar-side social_icons">
        <li style="margin-right:-13px;" ><a style="cursor:pointer;" onclick="changeLang('ES');"><img src="images/es.png"/> </a></li>
        <li><a style="cursor:pointer;" onclick="changeLang('EN');"><img src="images/us.png"/></a></li>
      </ul>
    </div>
  
  </div>
  <script type="text/javascript">
function changeLang(Lang){
  $.ajax({
    url: "change_lang.php?Lang="+Lang
  }).done(function() {
   document.location.reload();
  });
}
  </script>