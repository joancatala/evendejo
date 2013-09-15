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

<script type="text/javascript" src="inc/addclasskillclass.js"></script>
<script type="text/javascript" src="inc/attachevent.js"></script>
<script type="text/javascript" src="inc/addcss.js"></script>
<script type="text/javascript" src="inc/tabtastic.js"></script>
<link rel="stylesheet" href="inc/tabtastic.css" type="text/css">
<link rel="stylesheet" href="./inc/stylesheet.css" type="text/css">

<SCRIPT LANGUAGE="JavaScript">
<!--
function Enviar(form) {
for (i = 0; i < form.elements.length; i++) {
if (form.elements[i].type == "text" && form.elements[i].value == "") {  
alert("Per favor, plena tots els camps del formulari"); form.elements[i].focus(); 
return false; }
}
form.submit();
}
// -->
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
                                document.writeln('<INPUT TYPE="hidden" NAME="Producte'+itemlist+'" VALUE="'+theitem+'" SIZE="40">');
                                document.writeln('<INPUT TYPE="hidden" NAME="Quantitat'+itemlist+'" VALUE="'+thequantity+'" SIZE="40">')
                                document.writeln('<INPUT TYPE="hidden" NAME="ProducteTotal'+itemlist+'" VALUE="'+alterError(itemtotal)+'" SIZE="40">');
                        } else if (fulllist.substring(i,i+1) == ',') {
                                theitem = fulllist.substring(itemstart, i);
                                itemstart = i+1;
                        } else if (fulllist.substring(i,i+1) == '#') {
                                theprice = fulllist.substring(itemstart, i);
                                itemstart = i+1;
                        }
                }

                document.writeln('<INPUT TYPE="hidden" NAME="Total" VALUE="'+alterError(totprice)+'" SIZE="40">');

        }
        function Total() {
                document.writeln(alterError(totprice));
        }
</SCRIPT>



</head>

<?php include ("./inc/capcalera_ca.inc"); ?>


<div id="menucentral">
<table border="0"><tr><td>
<p><a href="./index.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$botiga"); ?></a> | <a href="./acxetajxojn.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$cistella"); ?></a> | <a href="./formularo.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$formulari"); ?></a></p></td></tr></table>
</div>

<table border="0" width="100%"><tbody><tr>
<td id="wikibody" valign="top">
<font size="2">
<!--PageText-->
</font><div id="wikitext">


<table border="0">
<tr><td>



<ul class="tabset_tabs">
   <li><a href="#pestanyeta1" class="active"><?php echo ("$compra_individual"); ?></a></li>
</ul>


<div id="pestanyeta1" class="tabset_content">
   <h2 class="tabset_label">Tab 1</h2>

<table border="0"><tr>
<td>

<FORM method="post" action="inc/enviar_dades.php" target="_top">

  <table cols="2" width="370" class="body">
      <td></td>
      <td>
      </td>
    </tr>
<tr><td><p><?php echo ("$nom_complet"); ?></p></td><td><input type="text" name="Nom" size=34></td></tr>
<tr><td><p><?php echo ("$adreca"); ?></p></td><td><input type="text" name="Direccio" size=34></td></tr>
<tr><td><p><?php echo ("$ciutat_i_cp"); ?></td><td><input type="text" name="Ciutat" size=20>&nbsp;&nbsp;&nbsp; <input type="text" name="CP" size=7></p></td></tr>
<tr><td><p><?php echo ("$pais"); ?></p></td><td><input type="text" name="Pais" size=30></td></tr>
<tr><td><p><?php echo ("$correu"); ?></p></td><td><input type="text" name="Correu" size=20></td></tr>
<tr><td><p><?php echo ("$dades_bancaries"); ?><font color="red"> *</font></p></td><td><input type="text" name="Banc" size=35></td></tr>

<SCRIPT LANGUAGE="JavaScript">
	showItems();
</SCRIPT>
    <tr>
      <td><p><?php echo ("$preu_total"); ?>:</p></td>
      <td>
        <p><font color="red"><SCRIPT LANGUAGE="JavaScript">Total()</SCRIPT> &euro;</font></p>
      </td>
    </tr>

    <tr>
      <td><br><br></td>
      <td>
        <input type="button" value="<?php echo ("$enviar_dades"); ?>" onClick="return Enviar(this.form)">
        <input type="reset" value="<?php echo ("$netejar"); ?>">
      </td>
    </tr>
  </table>
</form>

</td>
<td valign="bottom"><img src="./imatges/carret.gif"></td>
</tr></table>
<font size="1" color="red"><?php echo ("$apunt_sobre_el_pagament"); ?></font>
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

