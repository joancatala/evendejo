<?php 
if (isset ($_GET['lingvo']))
	{
    	$lingvo = $_GET['lingvo'];	
	}
	elseif (preg_match("/^ca/", $_SERVER['HTTP_ACCEPT_LANGUAGE'])) 
		{
		$lingvo = "ca";

		} else{
		//Escriu aquí la llengua principal de la botiga
		//Skribu cxi-tien la cxefa lingvo de la vendejo
		$lingvo = "ca";
			}
//Aci carreguem el fitxer de les llengues de la Libroservo
include ("./inc/vortoj_".$lingvo.".inc");
?> 

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eo" lang="eo">
<head><title>E-vendejo, malgranda elektronika vendejo por via asocio</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta name="Description" content="E-vendejo estas elektronika vendejo por vendi librojn, muzikon, t-cxemizojn, ktp...">
<meta name="Keywords" content="libroservo, produktoj, botiga, productes, llibres, musica, libroj, muziko, esperanto">
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
			 top.location = "index.php?lingvo=<?php echo ("$lingvo"); ?>";
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

<?php include ("./inc/capcalera_ca.inc"); ?>

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
<div id="wikitext">



<?php
$variable_categoria=($_GET[categoria]);

//Si existeix alguna categoria, veurem els productes propis d'eixa categoria
if (($variable_categoria))
{

//Titol de l'apartat de les categories
include ("./inc/conexio.php");
$result = mysql_query("SELECT id,nom_categoria FROM categories WHERE id=$variable_categoria",$db);
while($myrow = mysql_fetch_array($result))
{
?>
<font size="4" color="black"><strong><?php echo ("$categoria"); ?></a>: <?php echo ($myrow["nom_categoria"]);?></strong></font><br /><br />
<?php
}
mysql_close($db);
?>


<?php 
//taula de les categories
?>

<center>
<div id="taulaPrincipal">
<form NAME="itemsform">
<table border="0" cellspacing="0" width="100%" bgcolor="#ffffff" bordercolor="#dcdcdc" class="">
<?php
include ("./inc/conexio.php");
$result = mysql_query("SELECT dades.iddades, dades.nom, dades.descripcio, dades.preu, dades.id_categoria, dades.imatge, categories.id FROM dades LEFT JOIN categories ON dades.id_categoria=categories.id WHERE categories.id=$variable_categoria",$db);
?>

<?php
while($myrow = mysql_fetch_array($result))
{
?>
 
      <tr>
      <td valign="top"><a href="./articles.php?lingvo=<?php echo ("$lingvo"); ?>&id=<?php echo ($myrow["iddades"]);?>"><img src="./imatges/productes/<?php echo ($myrow["imatge"]);?>" border="0" alt="producte"/></a></td>
        <td width="300" valign="top"><strong><a href="./articles.php?lingvo=<?php echo ("$lingvo"); ?>&id=<?php echo ($myrow["iddades"]);?>"><?php echo ($myrow["nom"]);?></a></strong><br>
          <p><?php echo ($myrow["descripcio"]);?></p></td>
        <td width="50" align="center" valign="top"><font color="#499087"><b><?php echo ($myrow["preu"]);?> &euro;</b></font></td>
        <td width="40" valign="top" align="center">
          <input TYPE="value" NAME="agregar<?php echo ($myrow["iddades"]);?>" VALUE="1" SIZE="2">
        </td>
        <td width="60" valign="top">
          <center><img src="./imatges/compra.gif" alt="Afegir a la cistella"
onclick="buyItem('<?php echo ($myrow["nom"]);?>','<?php echo ($myrow["preu"]);?>', document.itemsform.agregar<?php echo (
$myrow["iddades"]);?>.value)" /><br/><p><?php echo ("$afegir_a_cistella"); ?></p></center>
        </td>
      </tr>
<?php
}
mysql_close($db);
?>
    </table>
</form>


<?php
//
//
// i de lo contrari, veurem tots els productes de la botiga
//
//
} else {



include ("./inc/missio.php");

?>
<center>

<?php
/*
Aci comenca el llistat de productes amb imatge, titol, descripcio, camp de quantitats i 
el simbol verd per fer la compra.
Aquest es l'apartat principal de la botiga, que de moment estic programant a l'index.php
*/
?>

<div id="taulaPrincipal">
<form NAME="itemsform">
<table border="0" cellspacing="0" width="100%" bgcolor="#ffffff" bordercolor="#dcdcdc" class="">
<?php 
include ("./inc/conexio.php");
$result = mysql_query("SELECT * FROM dades ORDER BY iddades desc limit 10",$db);

while($myrow = mysql_fetch_array($result))
{
?>
      
      <tr> 
      <td valign="top"><a href="./articles.php?lingvo=<?php echo ("$lingvo"); ?>&id=<?php echo ($myrow["iddades"]);?>"><img src="./imatges/productes/<?php echo ($myrow["imatge"]);?>" border="0" alt="producte" width="70" /></a></td>
        <td width="300" valign="top"><strong><a href="./articles.php?lingvo=<?php echo ("$lingvo"); ?>&id=<?php echo ($myrow["iddades"]);?>"><?php echo ($myrow["nom"]);?></a></strong><br>
          <p><?php echo ($myrow["descripcio"]);?></p><td>
        <td width="50" align="center" valign="top"><font color="#499087"><b><?php echo ($myrow["preu"]);?> &euro;</b></font></td>
        <td width="40" valign="top" align="center">
          <input TYPE="value" NAME="agregar<?php echo ($myrow["iddades"]);?>" VALUE="1" SIZE="2">
        </td>
        <td width="60" valign="top">
          <center><img src="./imatges/compra.gif" alt="Afegir a la cistella" 
onclick="buyItem('<?php echo ($myrow["nom"]);?>','<?php echo ($myrow["preu"]);?>', document.itemsform.agregar<?php echo ($myrow["iddades"]);?>.value)" /><br/><p><?php echo ("$afegir_a_cistella"); ?></p></center>
        </td>
      </tr>
<?php
}
mysql_close($db);
?>
    </table>
</form>
<?php
}
?>

</div>

</center>
</div>

</td></tr></tbody></table>
</div>

<?php include("inc/peu_ca.inc"); ?>

</div>
</div>
</body>
</html>
