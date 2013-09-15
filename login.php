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
include ("./inc/vortoj_".$lingvo.".inc");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eo" lang="eo">
<head><title>E-vendejo, malgranda elektronika vendejo por via asocio</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta name="Description" content="E-vendejo estas elektronika vendejo por vendi librojn, muzikon, t-cxemizojn, ktp...">
<meta name="Keywords" content="libroservo, produktoj, botiga, productes, llibres, musica, libroj, muziko">
<meta name="Author" content="Joan Català <joan@riseup.net>">
<link rel="stylesheet" href="./inc/stylesheet.css" type="text/css">

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
<?php include ("./inc/capcalera_ca.inc"); ?>

<div id="menucentral">
<table border="0"><tr><td width="200px">
<p>
<a href="./index.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$botiga"); ?></a> |
 <a href="./acxetajxojn.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$cistella"); ?> </a> | <a href="./formularo.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$formulari"); ?></a></p>
</td></tr></table>
</div>

<table border="0" width="100%"><tbody><tr>
<td id="wikibody" valign="top">
<div id="wikitext">




<?php
if(!isset($_GET['error'])){

                       echo ("<center><h2>");  echo ("$introdueix_les_dades");  echo ("</h2></center><br />");
                       ?>
                       <?php print '
                        <center><table border="0"><tr>
			<td><img src="./imatges/login.gif" alt="login"></td><td>
	
			<table border="0"><tr><td>
			<form action="autentificar.php" method="post">
                                <label for="usuari">'; ?>
                                <?php echo ("$nom_usuari");?> <?php print ': </label></td><td>
                                <input type="text" name="usuari" id="usuari" /></td></tr><tr><td>
                                <label for="pwd">' ?>
                                <?php echo ("$clau");?><?php print': </label></td><td>
                                <input type="password" name="pwd" id="pwd" /></td></tr><tr><td></td><td>
                                <input type="submit" value="'?> <?php echo ($entra);?><?php print '"/></td>
                        </form>
        </tr></table></center>

		</td></tr></table>
				';
}
else{
        print 'Error amb aquest usuari o clau, si us plau, torna-ho a intentar';
}
?>


<p><br /><br /></p>
</div>
</div>

</td>
</tr>
</tbody></table>
</div>

<?php
include("./inc/peu_ca.inc");
?>

</div>
</div>
</body></html>
