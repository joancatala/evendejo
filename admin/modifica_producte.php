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



<?php
$variable_mod=($_GET[modifica]);

if (($variable_mod))
{

include ("../inc/conexio.php");
$result = @mysql_query("UPDATE dades SET nom='$_POST[camp_nom]', autor='$_POST[camp_autor]', descripcio='$_POST[camp_descripcio]', preu='$_POST[camp_preu]', imatge='$_POST[camp_imatge]'  WHERE iddades='$variable_mod'",$db);


if(!$result)
{
echo "N'hi ha hagut un error desconegut al fer la modificaci&oacute; de dades.<br>";
die('Error al fer la consulta: ' . mysql_error());
} else {
  $result;
	echo "<font color='red'>Has actualitzat aquest camp correctament!</font>";

	}

mysql_close($db);





} else {


$variable_id=($_GET[iddades]);


if (($variable_id))
{


include ("../inc/conexio.php");
$result = @mysql_query("SELECT iddades, nom, autor, descripcio, preu, id_categoria, imatge FROM dades WHERE iddades=$variable_id",$db);
while($myrow = @mysql_fetch_array($result))
{
?>



<h2><?php echo ("$modificar_producte"); ?></h2>
<p><?php echo ("$descripcio_modificacions"); ?> </p><br />

<form action="./modifica_producte.php?modifica=<?php echo ($myrow["iddades"]);?>" method="POST">
<table width="520" cellpadding="5" cellspacing="0">
 <tr valign="bottom">
  <td width="150" valign="bottom" maxsize="100" >
   <label for="q9">Títol del producte</label>
  </td>
  <td valign="bottom">
   <input type="text" size="40" name="camp_nom" id="q9" value="<?php echo ($myrow["nom"]);?>">
  </td>
 </tr>
</table>

<table width="520" cellpadding="5" cellspacing="0">
 <tr valign="bottom">
  <td width="150" valign="bottom" maxsize="100" >
   <label for="q9">Autor (camp opcional)</label>
  </td>
  <td valign="bottom">
   <input type="text" size="40" name="camp_autor" id="q9" value="<?php echo ($myrow["autor"]);?>">
  </td>
 </tr>
</table>

<table width="520" cellpadding="5" cellspacing="0">
 <tr valign="bottom">
  <td width="150" valign="top"  >
   <label for="q6">Descripci&oacute;</label>
  </td>
  <td valign="bottom">
   <textarea wrap="soft" cols="40" rows="4" name="camp_descripcio" id="q6"><?php echo ($myrow["descripcio"]);?></textarea>
  </td>
 </tr>
</table>

<table width="520" cellpadding="5" cellspacing="0">
 <tr valign="bottom">
  <td width="150" valign="bottom" >
   <label for="q0">Imatge</label>
  </td>
  <td valign="bottom">
   <input type="text" size="20" name="camp_imatge" id="q0" value="<?php echo ($myrow["imatge"]);?>">
  </td>
 </tr>
</table>

<table width="520" cellpadding="5" cellspacing="0">
 <tr valign="bottom">
  <td width="150" valign="bottom" maxsize="5" >
   <label for="q1">Preu (en euros)</label>
  </td>
  <td valign="bottom">
   <input type="text" size="4" name="camp_preu" id="q1" value="<?php echo ($myrow["preu"]);?>">
  </td>
 </tr>
</table>

<table width="520" cellpadding="5" cellspacing="0">
 <tr valign="bottom">
  <td width="150" valign="bottom" >
  </td>
  <td valign="bottom">
  <input type="submit" name="q7_" value="Modificar">
  </td>
 </tr>
</table>
</form>
<?php
}
mysql_close($db);
?>



<?php
} else {
?>
<div id="taulaPrincipalXicoteta">
<h2><?php echo ("$modificar_producte"); ?></h2>
<font size="2"><?php echo ("$descripcio_modificacions"); ?></font><br />
<?php
include ("../inc/conexio.php");
$result = mysql_query("SELECT iddades, nom, descripcio, preu FROM dades ORDER BY iddades desc",$db);
$contador=0;
?>
<br /><br />
<center>
<table border="0" width="99%" cellspacing="0" cellpadding="0"><tr>
<?php
while($myrow = mysql_fetch_array($result))
{
echo ("<td width=\"2\" bgcolor=\"#dff6ea\"><p><b>");
echo (++$contador);
echo ("</b></p></td><td><p>");
echo ($myrow["nom"]);
echo ("</p></td><td><p>");
echo ($myrow["preu"]);
echo "&nbsp;&euro;";
?>
</p></td><td><a href="./modifica_producte.php?iddades=<?php echo ($myrow["iddades"]); ?>"><img src="../imatges/text-editor.png" alt="<?php echo ("$modificar_producte"); ?>" border="0" /></a></td></tr><tr>

<?php
}
mysql_close($db);
?>
</table>
</center>
</div>
<?php
}
}
?>


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

</td></tr></tbody></table>
</div>

<?php
include("../inc/peu_ca.inc");
?>

</div></div>
</body></html>
