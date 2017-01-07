  <?
  include("conexion.php");

  $query       =   "SELECT * FROM Informacion";
  $result      =   mysql_query($query,$id);

  while($row   =  mysql_fetch_array($result)){

  $Telefono    =  $row["Telefono"]; 
  $Celular     =  $row["Celular"];
  $Email       =  $row["Email"];
  $Fb          =  $row["Fb"];
  $It          =  $row["It"];
  }
  
  ?>
  <div class="rights">
    <div class="container">
    
       <div class="col-sm-9"  >
   <p class="font-montserrat">© 2016 Doma Inmobiliaria.&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp; <i class="fa fa-phone"></i> <?=$Telefono?> - <?=$Celular?>  &nbsp;&nbsp;&nbsp; <i class="fa fa-envelope-o"></i>  <?=$Email?>  </p></div>
      
      
      <div class="col-sm-3" >
      
      <ul style="float:right;" class="right-bar-side social_icons">
      
        <li class="facebook"> <a href="<?=$Fb?>" target="_blank"><i class="fa fa-facebook"></i> </a></li>
        <li class="twitter"> <a href="<?=$It?>" target="_blank"><i class="fa fa-instagram"></i> </a></li>
      
      </ul>
      
      </div>
      
    </div>
  </div>