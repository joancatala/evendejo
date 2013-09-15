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
$variable_id=($_GET[id]);
?>

<center>
<h2><?php echo ("$missio_web"); ?></h2>

<?php

if (($variable_id))
{

include ("../inc/conexio.php");
$result = mysql_query("UPDATE configuracions SET camps='$_POST[camps]' WHERE id='$variable_id'",$db);


   if(!$result)
   {
   echo "N'hi ha hagut un error desconegut al fer la modificaci&oacute; de dades.<br>";
   die('Error al fer la consulta: ' . mysql_error());
   } else {
          $result;
          echo "<font color='red'>Has modificat la missi&oacute; de la web correctament</font><br>";
          mysql_close($db);
          }

} else {
//no fa res de res
}







include ("../inc/conexio.php");
$result = mysql_query("SELECT id,camps FROM configuracions WHERE id=1",$db);

while($myrow = mysql_fetch_array($result))
{
?>
<form action="editar_missio.php?id=<?php echo($myrow[id]); ?>" method="post">
<textarea cols="70" rows="6" name="camps"><?php echo($myrow[camps]); ?></textarea><br />
<input name="missio" value="<?php echo ("$desar_dades"); ?>" type="submit">
</form>
<?php
}
mysql_close($db);
?>
</center>

<h2><?php echo ("$versio_actual"); ?></h2>
<?php
include ("../inc/conexio.php");
$result = mysql_query("SELECT id,camps FROM configuracions WHERE id=1",$db);

while($myrow = mysql_fetch_array($result))
{
echo($myrow[camps]); 
}
mysql_close($db);

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
