<?
$host		="localhost";
$user		="domainmobiliaria";
$password	="gm)Ou!wWXmD{";
$database	="domainmo_web2";

$id			=mysql_connect($host,$user, $password);

mysql_query("SET CHARACTER SET utf8 ");
mysql_select_db($database, $id);

?>