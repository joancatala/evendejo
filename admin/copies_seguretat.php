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


<center><h1>C&ograve;pies de seguretat</h1></center><br />
<p>En una botiga virtual, el nivell de criticitat &eacute;s prou alt, per tant seria recomanable fer una c&ograve;pia de seguretat de la base de dades cada setmana.</p>

<p>Passos a fer:<br />
1.- Hem d'entrar via "ssh" al servidor (ssh iladmin@esperanto.cat) amb la contrassenya de sempre.<br />
2.- Despr&eacute;s accedim a l'entorn del MySQL ($ mysql -p ) i la contrassenya &eacute;s la de sempre.<br />
3.- Ara fem un "mysqldump botiga -p > copia_seguretat_botiga.sql" i la contrassenya que et demana &eacute;s la de sempre.</p>

<center><h1>Restauraci&oacute; de la base de dades</h1></center><br />

<p>Per restaurar una c&ograve;pia farem: <i>mysql botiga -p < FITXER_DE_LA_COPIA.sql</i> (on diu FITXER_DE_LA_COPIA.sql vol dir el fitxer de la copia de seguretat que vas fer abans).<br />
</p>

<center><h1>Imatges en la Libroservo</h1></center><br />

<p>Si vols pujar imatges al servidor, pots fer servir <a href="./pujar_imatges.php">aquest script</a> de la Libroservo. Et recordem que les imatges dels productes les tens al directori <a href="../imatges/productes/">/imatges/productes</a>.</p>

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
