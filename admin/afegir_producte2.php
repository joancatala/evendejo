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
<html xmlns="http://www.w3.org/1999/xhtml"><head><title></title>

<meta http-equiv="content-type" content="text/html; charset=iso-UFT-8">
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

<br /><br /><br /><br />

<?
//Capturem les variables del formulari de insercio de productes
//
$variable_nom= $_POST['camp_nom'];
$variable_autor= $_POST['camp_autor'];
$variable_descripcio= $_POST['camp_descripcio'];
$variable_preu= $_POST['camp_preu'];
$variable_categoria= $_POST['camp_categoria'];

//extensions que no volem que es pujen al servidor (nomes imatges!!!)
$extensiones=array("html","exe","php");

$path="../imatges/productes/";
$nombre=$HTTP_POST_FILES['archivo']['name'];
$tamanio=$HTTP_POST_FILES['archivo']['size'];
$tipo=$HTTP_POST_FILES['archivo']['type'];
$var = explode(".","$nombre");
$num = count($extensiones);
$valor = $num-1;
for($i=0; $i<=$valor; $i++) {
    if($extensiones[$i] == $var[1]) {
    echo "No pots pujar aquest tipus de fitxer.";
    exit;
    }
}
if (is_uploaded_file($HTTP_POST_FILES['archivo']['tmp_name']))
 {
 copy($HTTP_POST_FILES['archivo']['tmp_name'], "$path/$nombre");
 echo "<table border=\"0\"><tr><td valign=\"top\"><img src=\"../imatges/productes/$nombre\" alt=\"imatge\"></td><td valign=\"top\"><font size=\"3\"><strong>$camp_nom</strong></font><p>$camp_descripcio</p></td></tr></table><br /><br />"; 
 echo "<p>L'imatge <font color=\"black\">'$nombre'</font> del producte s'ha pujat correctament al servidor.</p><br />";

  include ("../inc/conexio.php");
  $result=mysql_query("INSERT INTO dades (nom, autor, descripcio, preu, id_categoria, imatge) VALUES ('$variable_nom', '$variable_autor', '$variable_descripcio', '$variable_preu', '$variable_categoria', '$nombre')",$db);

  if(!$result)
  {
        echo "N'hi ha hagut un error desconegut.";
        die('Error al fer la consulta: ' . mysql_error());
        } else {

        $result;
        //echo "Has afegit correctament aquest producte.<br>";
        ?>
        <p>Les dades s'han desat correctament a la base de dades.</p>
	
       <?php
        mysql_close($db);
        }
 }
else { echo "N'hi ha hagut un error pujant aquesta informaci&oacute; del producte, torna-ho a fer, per favor."; }
?>



<br /><br /><br /><br />


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
include("../inc/peu_ca2.inc");
?>

</div>
</div>
</body>

        <script language="javascript">
        <!--
        alert("<?php echo ("$fitxer_pujat"); ?>");
        //-->
        </script>
</html>
