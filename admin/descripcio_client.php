<?php

// Gestió de permisos
//----------------------------------------------

session_start();
if(!session_is_registered('usuari')){
        header('Location: ../login.php?error');
        exit();
}

?>





<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml"><head><title>Libroservo de KEA</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta name="Description" content="">
<meta name="Keywords" content="">
<link rel="stylesheet" href="../stylesheet.css" type="text/css">

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
<p><a href="../index.php">Botiga</a> | <a href="../acxetajxojn.php">Cistella</a> | <a href="../formularo.php">Formulari</a> | <a href="./index.php">Administraci&oacute;</a> | <a href="./eixir.php">Eixir de la sessi&oacute;</a>
</p></td></tr></table>
</div>

<table border="0" width="100%"><tbody><tr>
<td id="wikibody" valign="top">
<font size="2">
<!--PageText-->
</font><div id="wikitext">

<h2>Descripci&oacute; del client</h2><br />

<?php
$variable_id_client=($_GET[id_client]);

if (($variable_id_client))
{

// llistat de dades dels clients
include ("../inc/conexio.php");
$result = @mysql_query("SELECT id_client, nom_client, adreca_client, compra_client, ciutat_client, cp_client, pais_client, correu_client, banc_client, data_client FROM clients WHERE id_client=$variable_id_client",$db);
$contador = 0;

while($myrow = @mysql_fetch_array($result))
{

if (!isset($myrow["banc_client"])) {

echo ("<p>Des del ");
echo ($myrow["data_client"]);
echo (" // <a href=\"mailto:");
echo ($myrow["correu_client"]);
echo ("\"><strong>");
echo ($myrow["nom_client"]);
echo ("</strong></a><font color=\"red\"> ( membre de KEA )</font></p>");
echo ("<p>------------------------------------------------------------<br />Dades de la compra:<br />------------------------------------------------------------</b><br />");
echo ($myrow["compra_client"]);
?>

<?php
} else {

echo ("<p><strong>Alta del client el dia:</strong> ");
echo ($myrow["data_client"]);
echo ("<br /><strong>Nom:</strong> ");
echo ($myrow["nom_client"]);
echo ("<br /><strong>Correu de contacte:</strong> ");
echo ($myrow["correu_client"]);
echo ("<br /><strong>Adre&ccedil;a:</strong> ");
echo ($myrow["adreca_client"]);
echo ("<br /><strong>Ciutat:</strong> ");
echo ($myrow["ciutat_client"]);
echo ("<br /><strong>CP i Pa&iacute;s:</strong> ");
echo ($myrow["cp_client"]);
echo (" - ");
echo ($myrow["pais_client"]);
echo ("<br /><br /><strong>Dades del banc del client:</strong> ");
echo ($myrow["banc_client"]);
echo ("<p>------------------------------------------------------------<br />Dades de la compra:<br />------------------------------------------------------------</b><br />");
echo ($myrow["compra_client"]);

}
}
mysql_close($db);
}
?>
<br />
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
