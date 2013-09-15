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
$lingvo = "eo";

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
		document.writeln('<form><table border="1" cellspacing="0" width="100%" bgcolor="#ffffff" bordercolor="#000000" class="td">');

document.writeln('<TR><TD width="250"><p><b><?php echo ("$producte"); ?></b></p></TD><TD width="80" align="right"><p><b><?php echo ("$quants"); ?>?</b></p></TD><TD width="85" align="right"><p><b><?php echo ("$euro_la_unitat"); ?></b></p></TD><td width="100" align="right"><p><b><?php echo ("$preu_total"); ?></b></p><TD width="35">&nbsp;</TD></TR>');
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
document.writeln('<tr><td><p>'+theitem+'</p></td><td align=right><p>'+thequantity+'</p></td><td align=right><p>'+theprice+'</p></td><td align=right><p>'+alterError(itemtotal)+' &euro;</p></td><td align=center><img src="./imatges/esborra_producte.jpg" name="esborra_linea" alt="esborra producte" onclick="javascript:removeItem('+itemlist+')"></td></tr>');
			} else if (fulllist.substring(i,i+1) == ',') {
				theitem = fulllist.substring(itemstart, i);
				itemstart = i+1;
			} else if (fulllist.substring(i,i+1) == '#') {
				theprice = fulllist.substring(itemstart, i);
				itemstart = i+1;
			}
		}

		

		document.writeln('<tr><td colspan=3><b><?php echo ("$quantitat_total_compra"); ?>:</b></td><td align=right><b>'+alterError(totprice)+' &euro;</b></td><td>&nbsp;</td></tr>');
		document.writeln('</TABLE>');
	}

	function removeItem(itemno) {
		newItemList = null;
		itemlist = 0;
		for (var i = 0; i <= fulllist.length; i++) {
			if (fulllist.substring(i,i+1) == '[') {
				itemstart = i+1;
			} else if (fulllist.substring(i,i+1) == ']') {
				itemend = i;
				theitem = fulllist.substring(itemstart, itemend);
				itemlist=itemlist+1;
				if (itemlist != itemno) {
					newItemList = newItemList+'['+fulllist.substring(itemstart, itemend)+']';
				}
			}
		}
		index = document.cookie.indexOf("TheBasket");
		document.cookie="TheBasket="+newItemList;
		top.location = "acxetajxojn.php?lingvo=<?php echo ("$lingvo"); ?>";
	}

	function clearBasket() {
		if (confirm('<?php echo ("$vols_esborrar"); ?>')) {
			index = document.cookie.indexOf("TheBasket");
			document.cookie="TheBasket=.";
			top.location = "index.php?lingvo=<?php echo ("$lingvo"); ?>";
		}
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
</head>

<?php include ("./inc/capcalera_ca.inc"); ?>

<div id="menucentral">
<table border="0">
<tr><td><p><a href="./index.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$botiga"); ?></a> | <a href="./acxetajxojn.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$cistella"); ?></a> | <a href="./formularo.php?lingvo=<?php echo ("$lingvo"); ?>"><?php echo ("$formulari"); ?></a></p></td></tr></table>
</div>



<table border="0"><tbody><tr>
<td id="wikibody" valign="top">
<font size="2">
<!--PageText-->
</font><div id="wikitext">


<font size="4" color="black"><strong><?php echo ("$la_teua_cistella"); ?></strong></font><br />
<p><?php echo ("$descripcio_la_teua_cistella"); ?></p>




<div id="taulaCistella">
<center>
  <br>
<table border="0">
<tr><td>
<SCRIPT LANGUAGE="JavaScript">
	showItems();
</SCRIPT>
</td></tr></table>
  <br>	
  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="body">
    <tr> 
      <td width="100%" colspan="2">
        <hr size="1" color="#000000">
      </td>
    </tr> 
    <tr> 
      <td width="50%"></td>
      <td width="50%" align="right"><p>[ <a href="javascript:clearBasket()"><?php echo ("$esborrar_tots_prod"); ?>
</a> ]</p></td>
    </tr>
  </table>
</center>
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
