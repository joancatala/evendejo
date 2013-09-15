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
<html xmlns="http://www.w3.org/1999/xhtml"><head><title></title>

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


<head>

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


<center><h1><?php echo ("$admin_botiga"); ?></h1></center><br />
<center>
<table border="0" width="100%">
<tr>
<td align="center"><img border="0" src="../imatges/4.jpg" alt=""><br /><a href="./afegir_producte.php?lingvo=<?php echo ("$lingvo"); ?>"><font size="1"><?php echo ("$afegir_poducte"); ?></font></a></td>
<td  align="center"><img border="0" src="../imatges/11.jpg" alt=""><br /><a href="./modifica_producte.php?lingvo=<?php echo ("$lingvo"); ?>"><font size="1"><?php echo ("$modificar_producte"); ?></font></a></td>
<td  align="center"><img border="0" src="../imatges/3.jpg"><br /><font size="1"><a href="./esborra_producte.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$esborrar_producte"); ?></a></font></td></tr><tr>


<td  align="center"><img src="../imatges/12.jpg" border="0" alt=""><br /><a href="./copies_seguretat.php?lingvo=<?php echo ("$lingvo"); ?>"><font size="1"><?php echo ("$copies_seguretat"); ?></font></a></td>
<td  align="center"><img src="../imatges/10.jpg"><br /><a href="./editar_missio.php?lingvo=<?php echo ("$lingvo"); ?>"><font size="1"><?php echo ("$editar_missio"); ?></font></a></td>
<td  align="center"><img src="../imatges/8.jpg" border="0"><br /><a href="./esborra_comentari.php?lingvo=<?php echo ("$lingvo"); ?>"><font size="1"><?php echo ("$esborrar_comentaris"); ?></font></a></td></tr><tr>


<td align="center"><img border="0" src="../imatges/14.jpg" alt=""><br /><a href="./enviaments_pendents.php?lingvo=<?php echo ("$lingvo"); ?>"><font size="1"><?php echo ("$productes_pendents"); ?></font></a></td>
<td  align="center"><img border="0" src="../imatges/15.jpg" alt=""><br /><a href="./clients.php?lingvo=<?php echo ("$lingvo"); ?>"><font size="1"><?php echo ("$historic_clients"); ?></font></a></td>
<td  align="center"><img src="../imatges/1.jpg" border="0"><br /><a href="./categoria.php?lingvo=<?php echo ("$lingvo"); ?>"><font size="1"><?php echo ("$categoria_productes"); ?></font></a></td></tr></table>



</center>

<br /><br />

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
