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
<!--PageText-->
<div id="wikitext">



<div id="taulaPrincipalXicoteta">
<?php
// La primera condicio era el "esborrar_categoria.php" per
// tal d'esborrar la categoria senyalada pel nombre de ID

$variable_id=($_GET[id]);

if (($variable_id))
{

include ("../inc/conexio.php");
$result = @mysql_query("DELETE FROM categories WHERE id=$variable_id",$db);
while($myrow = @mysql_fetch_array($result))
{

}
mysql_close($db);
?>
<?php echo ("$categoria_esborrada"); ?>
<?php 
} else {

//no fa res
}
//acaba la condicio esborrar categoria





//si s'ha passat pel formulari alguna variable al camp $nova_categoria
//sera afefegida a la bbdd

if (($nova_categoria))
{
  include ("../inc/conexio.php");
  $result=mysql_query("INSERT INTO categories (nom_categoria) VALUES ('$nova_categoria')",$db);

  if(!$result)
  {
        echo "N'hi ha hagut un error desconegut.";
        die('Error al fer la consulta: ' . mysql_error());
        } else {

        $result;
        echo "Has afegit correctament aquesta categoria:<b>$nova_categoria</b><br>";
        mysql_close($db);
        }
 
} else {
  
//no fa res
}
?>

<?php //despres del condicional, mostra el
//formulariet a baix de la pagina ?>
<h2><?php echo ("$afegir_nova_categoria"); ?></h2><br />
<form action="./categoria.php"  enctype="multipart/form-data" method="post">
<table border="0"><tr>
<td><input name="nova_categoria" size="30" value=""></td>
<td><input type="Submit" name="submit" value="<?php echo ("$afegir_nova"); ?>">
</td></tr></table>
</form>
<p><?php echo ("$descripcio_categories"); ?></p><br />


<h2><?php echo ("$llistat_categories"); ?></h2><br />
<table border='0' width="99%" cellpadding="0" cellspacing="0"><tr>
<?php
include ("../inc/conexio.php");
$result=mysql_query("SELECT * FROM categories ORDER BY id",$db);
$contador=0;

while($myrow = mysql_fetch_array($result))
{
echo "<td bgcolor=\"#dff6ea\"><p><b>";
echo (++$contador);
echo "</b></p></td><td width=\"500\"><p>&nbsp;";
echo ($myrow["nom_categoria"]);
?>
</p></td><td align="right">
<a href="./categoria.php?id=<? echo($myrow[id]); ?>"><img border="0" src="../imatges/esborra2_producte.png" alt="esborra categoria" /></a></td></tr>
<?php
} 
mysql_close($db);
?>
</div>



</div>

</td></tr> </tbody></table>
</div>

<?php
include("../inc/peu_ca.inc");
?>

</div>
</div>
</body></html>
