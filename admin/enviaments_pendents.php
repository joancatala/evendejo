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


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eo" lang="eo">
<head><title>E-vendejo, malgranda elektronika vendejo por via asocio</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta name="Description" content="E-vendejo estas elektronika vendejo por vendi librojn, muzikon, t-cxemizojn, ktp...">
<meta name="Keywords" content="libroservo, produktoj, botiga, productes, llibres, musica, libroj, muziko">
<meta name="Author" content="Joan Catala <joan@riseup.net>">
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

<h2><?php echo ("$productes_pendents"); ?></h2>
<p><?php echo ("$descripcio_pendents"); ?></p><br />




<?php
//Si existeix la variable id_client modificarem el color de roig a verd de
//la taula del client
//
$variable_id_client=($_GET[id_client]);

if (($variable_id_client))
{

include ("../inc/conexio.php");
$result = mysql_query("UPDATE clients SET finalitzat_client='1' WHERE id_client='$variable_id_client'",$db);


   if(!$result)
   {
   echo "N'hi ha hagut un error desconegut al fer la modificaci&oacute; de dades.<br>";
   die('Error al fer la consulta: ' . mysql_error());
   } else {
          $result;
          echo "<font color='red'>Operaci&oacute; realitzada correctament.</font><br>";
          mysql_close($db);
          }

} else {
//no fa res de res
}




// llistat de dades dels clients: nom, ciutat, cp, productes, etc...
include ("../inc/conexio.php");
$result = @mysql_query("SELECT id_client, nom_client, adreca_client, ciutat_client, cp_client, pais_client, correu_client, banc_client, compra_client, data_client, finalitzat_client FROM clients ORDER BY id_client desc",$db);
?>
<br /><br /><center>

<?php
while($myrow = @mysql_fetch_array($result))
{


if (($myrow["finalitzat_client"])>0) {
//antic color verd
//ara NO FA RES 
} else {

//COLOR ROIG: clients nous pendents d'enviar els productes
echo ("<div id=\"taulaEnviamentsRoig\">");
echo ("<table border=\"0\" width=\"99%\" cellspacing=\"0\" cellpadding=\"0\"><tr>");
echo ("<td><p><font color=\"black\" size=\"1\">Compra solicitada el dia ");
echo ($myrow["data_client"]);
echo ("</font><br />");
echo ("<table border=\"0\" width=\"100%\"><tr><td><p>");
echo ("<a href=\"mailto:");
echo ($myrow["correu_client"]);
echo ("\"><font color=\"white\" size=\"4\"><strong>");
echo ($myrow["nom_client"]);
?>
</strong></font></a><td align="right"><p><form action="./enviaments_pendents.php?id_client=<?php echo ($myrow["id_client"]);?>" method="POST">
<input type="submit" name="q7_" value="<?php echo ("$producte_enviat"); ?>">
</p></td></tr></table>
<?php
echo ("</font><br /><font color=\"white\">");
echo ($myrow["adreca_client"]);
echo (", ");
echo ($myrow["ciutat_client"]);
echo (", ");
echo ($myrow["cp_client"]);
echo (" ");
echo ($myrow["pais_client"]);
echo ("</font><br /><br /><b><font color=\"white\">Banc del client: ");
echo ($myrow["banc_client"]);
echo ("</font><br /><br /><b><font color=\"white\">----------------------------------------<br />Dades de la compra:<br />----------------------------------------</b><br />");
echo ($myrow["compra_client"]);
echo "</td></tr></table><br /></div>";

}
}
mysql_close($db);
?>

</div>
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
