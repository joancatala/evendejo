<?php

// Gestió de permisos
//----------------------------------------------

session_start();
if(!session_is_registered('usuari')){
        header('Location: ../login.php?error');
        exit();
}

?>


<?php

if (isset ($_GET['lingvo']))
{
    $lingvo = $_GET['lingvo'];
}
elseif (preg_match("/^ca/", $_SERVER['HTTP_ACCEPT_LANGUAGE']))
{
$lingvo = "ca";
}
else
{
$lingvo = "ca";

}
//
//
//Aci carreguem el fitxer de les llengues de la Libroservo
include ("../inc/vortoj_".$lingvo.".inc");
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml"><head><title>Libroservo de KEA</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta name="Description" content="">
<meta name="Keywords" content="">
<link rel="stylesheet" href="../inc/stylesheet.css" type="text/css">

<SCRIPT TYPE="text/javascript">
<!--
function dropdown(mySel)
{
var myWin, myVal;
myVal = mySel.options[mySel.selectedIndex].value;
if(myVal)
   {
   if(mySel.form.target)myWin = parent[mySel.form.target];
   else myWin = window;
   if (! myWin) return true;
   myWin.location = myVal;
   }
return false;
}
//-->
</SCRIPT>
</head>

<?php include ("../inc/capcalera2_ca.inc"); ?>

<div id="menucentral">
<table border="0"><tr><td>              
<p><a href="../index.php?lingvo=<?php echo ($lingvo); ?>"><?php echo ("$botiga"); ?></a> | <a href="../acxetajxojn.php?lingvo=<?php echo ($lingvo); ?>"><?php echo ("$cistella"); ?></a> | <a href="../formularo.php?lingvo=<?php echo ($lingvo); ?>"><?php echo ("$formulari"); ?></a> | <a href="./index.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$administracio"); ?></a> | <a href="./eixir.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$eixir_sessio"); ?></a></p></td></tr></table>
</div>

<table border="0"><tbody><tr>
<td id="wikibody" valign="top">
<font size="2">
<!--PageText-->
</font><div id="wikitext">

<div id="taulaPrincipalXicoteta">
<h2><?php echo ("$esborrar_producte"); ?></h2>
<p><?php echo ("$descripcio_esborrar"); ?></p><br />
<?php
// La primera condicio era el "esborrar_categoria.php" per
// tal d'esborrar la categoria senyalada pel nombre de ID


$variable_id=($_GET[id]);

if (($variable_id))
{
include ("../inc/conexio.php");

@mysql_query("DELETE FROM comentaris WHERE id_dades=$variable_id",$db);

$result = @mysql_query("DELETE FROM dades WHERE iddades=$variable_id",$db);
while($myrow = @mysql_fetch_array($result))
{
}
mysql_close($db);
?>
<font color="red">El producte ha segut esborrat correctament!</font>
<?php
} else {

//no fa res
}
//acaba la condicio esborrar producte

include ("../inc/conexio.php");
$result = @mysql_query("SELECT iddades, nom, descripcio, preu FROM dades ORDER BY iddades desc",$db);
$contador=0;
?>
<br /><br />
<center>
<table border="0" width="99%" cellspacing="0" cellpadding="0"><tr>
<?php
while($myrow = @mysql_fetch_array($result))
{
echo ("<td width=\"2\" bgcolor=\"#dff6ea\"><p><b>");
echo (++$contador);
echo ("</b></p></td><td><p>");
echo ($myrow["nom"]);
echo ("</p></td><td><p>");
echo ($myrow["preu"]);
echo "&nbsp;&euro;";
?>
</p></td><td><a href="./esborra_producte.php?id=<?php echo ($myrow["iddades"]); ?>"><img src="../imatges/esborra2_producte.png" alt="esborra producte" border="0" /></a></td></tr><tr>

<?php
}
mysql_close($db);
?>
</table>
</center>
</div>

<center>
  <table border="0" cellpadding="0" cellspacing="0" width="520" class="body">
    <tr> 
      <td width="100%" colspan="2">
        <hr size="1" color="#000000">
      </td>
    </tr>
  </table>
</center>
</div>

</td>
</tr>
</tbody></table>
</div>

<?php
include("../inc/peu_ca.inc");
?>

</div>
</div>
</body></html>
