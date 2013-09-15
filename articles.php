<?php 
if (isset ($_GET['lingvo']))
{
  $lingvo = $_GET['lingvo'];
} elseif (preg_match("/^ca/", $_SERVER['HTTP_ACCEPT_LANGUAGE']))
	{
	$lingvo = "ca";
		} else {
		$lingvo = "ca";
		}

//
//Aci carreguem el fitxer de les llengues de la Libroservo
//
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

<SCRIPT LANGUAGE="JavaScript">
        function buyItem(newItem, newPrice, newQuantity) {
                if (newQuantity <= 0) {
                        rc = alert('La kvanto ke vi skribis ne estas korekta');
                        return false;
                }
                if (confirm('<?php echo ("$vols_afegir"); ?> '+newQuantity+' de "'+newItem+'" <?php echo ("$a_la_cistella"); ?>?')) {
                        index = document.cookie.indexOf("TheBasket");
                        countbegin = (document.cookie.indexOf("=", index) + 1);
                        countend = document.cookie.indexOf(";", index);
                        if (countend == -1) {
                                countend = document.cookie.length;
                        }
                        document.cookie="TheBasket="+document.cookie.substring(countbegin, countend)+"["+newItem+","+newPrice+"#"+newQuantity+"]";
			window.location.href=window.location.href;
                }
                return true;
        }

        function resetShoppingBasket() {
                index = document.cookie.indexOf("TheBasket");
                document.cookie="TheBasket=.";
        }
</SCRIPT>



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




<SCRIPT LANGUAGE="JavaScript">
        function alterError(value) {
                if (value<=0.99) {
                        newPounds = '0';
                } else {
                        newPounds = parseInt(value);
                }
                newPence = parseInt((value+.0008 - newPounds)* 100);
                if (eval(newPence) <= 9) newPence='0'+newPence;
                newString = newPounds + '.' + newPence;
                return (newString);
        }
        function showItems() {
                index = document.cookie.indexOf("TheBasket");
                countbegin = (document.cookie.indexOf("=", index) + 1);
                countend = document.cookie.indexOf(";", index);
                if (countend == -1) {
                        countend = document.cookie.length;
                }
                fulllist = document.cookie.substring(countbegin, countend);
                totprice = 0;

                itemlist = 0;
                for (var i = 0; i <= fulllist.length; i++) {
                        if (fulllist.substring(i,i+1) == '[') {
                                itemstart = i+1;
                        } else if (fulllist.substring(i,i+1) == ']') {
                                itemend = i;
                                thequantity = fulllist.substring(itemstart, itemend);
                                itemtotal = 0;
                                itemtotal = (eval(theprice*thequantity));
                                temptotal = itemtotal * 100;
                                var tax = itemtotal / 100 * (0 - 0);
                                tax = Math.floor(tax * 100)/100
                                totprice = totprice + itemtotal + tax;
                                itemlist=itemlist+1;
                        } else if (fulllist.substring(i,i+1) == ',') {
                                theitem = fulllist.substring(itemstart, i);
                                itemstart = i+1;
                        } else if (fulllist.substring(i,i+1) == '#') {
                                theprice = fulllist.substring(itemstart, i);
                                itemstart = i+1;
                        }
        }
document.writeln('<font color="#3f9287">&nbsp;'+alterError(totprice)+' &euro;</font>');
}
</SCRIPT>

</head>

<?php include ("./inc/capcalera_articles.inc"); ?>

<div id="menucentral">
<table border="0"><tr><td width="200px">
<p><a href="./index.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$botiga"); ?></a> | <a href="./acxetajxojn.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$cistella"); ?></a> | <a href="./formularo.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$formulari"); ?></a></p>
</td><td width="330px" align="right"><p><font color="#3f9287"><?php echo ("$preu_total"); ?>:  
<SCRIPT LANGUAGE="JavaScript">
        showItems();
</SCRIPT>
</font>
</p></td><td valign="top"><img src="./imatges/icona_cistella.gif" alt=""></td></tr></table>
</div>


<table border="0"><tbody><tr>
<td id="wikibody" valign="top">
<font size="2">
<!--PageText-->
</font>

<div id="wikitext">

<?php
//
//AQUESTA ES LA PART DEL PRODUCTES I ELS SEUS
//COMENTARIS ORDENATS PER DATA ANTIGA A NOVA
//
// ?>

<table border="0"><tr><td>
<?php  
$article_concret=($_GET[id]);

include ("./inc/conexio.php");
$result = mysql_query("SELECT iddades, imatge, nom, descripcio, preu FROM dades WHERE iddades=$article_concret",$db);  

while($myrow = mysql_fetch_array($result))  
{  
?>  

<p><img src="./imatges/productes/<?php echo ($myrow["imatge"]);?>" border="0" alt="" align="left">
<font size='4'><?php echo ($myrow["nom"]);?></font><br />
<?php echo ($myrow["descripcio"]);?>

<table border="0" width="100%">
<tr>
<td valign="top">
<p><?php echo ("$preu_daquest_llibre"); ?>:<strong>
<?php echo ($myrow["preu"]);?> &euro;</strong></p></font>
</td>
<td align="right">
<form NAME="itemsform">
<input TYPE="hidden" NAME="agregar<?php echo ($myrow["iddades"]);?>" VALUE="1" SIZE="2">
<table border="0"><tr><td><center><img src="./imatges/compra.gif" alt="afegir producte"  onclick="buyItem('<?php echo ($myrow["nom"]);?>','<?php echo ($myrow["preu"]);?>',document.itemsform.agregar<?php echo ($myrow["iddades"]);?>.value)"><p><?php echo($afegir_a_cistella);?></p></center></td></tr></table> 
&nbsp;&nbsp;</form>
</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr></table>



<?php
}
mysql_close($db);
?>
</p>
</td></tr></table>




<br /><center><strong>... ... ... ... ... ... ... ... ... ... ... ... ... ... ... ... ...</strong></center><br />

<?php

include ("./inc/conexio.php");
$result = mysql_query("SELECT titol, comentari, id_dades, data, nom_usuari FROM comentaris WHERE id_dades=$article_concret ORDER BY id asc",$db);
while($myrow = mysql_fetch_array($result))
{

echo "<font size='4'>";
echo ($myrow["titol"]);
echo "</font><br />";
echo "<font color='black' size='1'>Escrit per ";
echo ($myrow["nom_usuari"]);
echo " el dia ";
echo ($myrow["data"]);
echo "</font><br />";
echo ($myrow["comentari"]);
echo "<br /><br />";
echo "<center><strong>... ... ... ... ... ... ... ... ... ... ... ... ... ... ... ... ...</strong></center><br />";

}
mysql_close($db);
?>
     



<br />
<?php //EL FORMULARI  ?>
<form action="./inserta_comentaris.php?id=

<?php
$article_concret=($_GET[id]);

include ("./inc/conexio.php");
$result = mysql_query("SELECT iddades FROM dades WHERE iddades=$article_concret",$db);

while($myrow = mysql_fetch_array($result))
{

echo ($myrow["iddades"]);

}
mysql_close($db);
?>


" method="POST">
<table width="520" cellpadding="5" cellspacing="0">
 <tr valign="bottom">
  <td width="150" valign="bottom" >
   <label for="q0"><p><?php echo($nom_usuari);?>:</p></label>
  </td>
  <td valign="bottom">
   <input type="text" size="20" name="camp_nom_usuari" id="q0">
  </td>
 </tr>
</table>

<table width="520" cellpadding="5" cellspacing="0">
 <tr valign="bottom">
  <td width="150" valign="bottom" >
   <label for="q1"><p><?php echo($titol);?>:</p></label>
  </td>
  <td valign="bottom">
   <input type="text" size="40" name="camp_titol" id="q1">
  </td>
 </tr>
</table>

<table width="520" cellpadding="5" cellspacing="0">
 <tr valign="bottom">
  <td width="150" valign="top"  >
   <label for="q6"><p><?php echo($comentari)?>:</p></label>
  </td>
  <td valign="bottom">
   <textarea wrap="soft" cols="40" rows="6" name="camp_comentari" id="q6"></textarea>
  </td>
 </tr>
</table>

<table width="520" cellpadding="5" cellspacing="0">
 <tr valign="bottom">
  <td width="150" valign="bottom" >
   
  </td>
  <td valign="bottom">
  <input type="submit" name="q7_" value="<?php echo($publicar_comentari);?>">
  </td>
 </tr>
</table>
</form>

<p>S'esborraran comentaris que no estiguen directament relacionats amb el producte per tal de garantir una bona qualitat en les informacions. Si coneixes la llengua, escriu en esperanto, per favor, ja que la botiga de KEA la llegueix gent de tot arreu.</p>

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
include("./inc/peu_ca.inc");
?>

</div>
</div>
</body></html>
