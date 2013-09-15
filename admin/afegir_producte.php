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




<h2><?php echo ("$afegint_producte"); ?></h2><br />

<form action="afegir_producte2.php"  enctype="multipart/form-data" method="post">
<table border="0"><tr>
<td><p><?php echo ("$nom_del_producte"); ?>:</p></td><td><input name="camp_nom" size="40" value=""></td></tr><tr>
<td><p><?php echo ("$autor_opcional"); ?>:</p></td><td><input name="camp_autor" size="25" value=""></td></tr><tr>
<td><p><?php echo ("$breu_descripcio"); ?>:</p></td><td><textarea name="camp_descripcio" rows='6' cols='50'></textarea></td></tr>
<td><p><?php echo ("$pujar_imatge"); ?>:</p></td><td><input type="file" name="archivo" size="30"></td></tr><tr>
<td><p><?php echo ("$pujar_categoria"); ?>:</p></td><td>

<?php
include ("../inc/conexio.php");
$result = mysql_query("SELECT id,nom_categoria FROM categories ORDER BY nom_categoria",$db);
?>

<SELECT NAME="camp_categoria">
<option value="#"><?php echo ("$selecciona_una_categoria"); ?></option>

<?php
while($myrow = mysql_fetch_array($result))
{
?>
<option value="<?php echo ($myrow["id"]);?>"><?php echo ($myrow["nom_categoria"]);?></option>
<?php
}
mysql_close($db);
?>
</select>
</td></tr>
<tr><td><p><?php echo ("$preu_en_euros"); ?>:</p></td><td><input name="camp_preu" size="5"></b></td></tr>
<td></td><td></td></tr><tr><td></td><td><input type="Submit" name="submit" value="<?php echo ("$afegir_poducte"); ?>">
</td></tr></table>
</form>


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
