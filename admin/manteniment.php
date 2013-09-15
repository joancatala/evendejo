<?php

// Gestió de permisos
//----------------------------------------------

session_start();
if(!session_is_registered('usuari')){
        header('Location: ../login.php?error');
        exit();
}

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml"><head><title></title>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta name="Description" content="">
<meta name="Keywords" content="">
<link rel="stylesheet" href="../stylesheet.css" type="text/css"></head>

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



<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<body onLoad="MM_preloadImages('imatges/bot1.gif','imatges/bot1-2.gif','imatges/bot2.gif','imatges/bot2-2.gif','imatges/bot3.gif','imatges/bot3-2.gif','imatges/bot4.gif','imatges/bot4-2.gif')">




<!--PageHeaderFmt-->
<div id="border">
<div id="container">
<div id="content">

<div id="header">
  
<table border="0" width="100%">
<tbody><tr><td>

<table border="0">
<tbody><tr><td>

<a href="#"><img src="../imatges/catala.jpg" border="0"></a>&nbsp;<a href="#"><img src="../imatges//esperanto.jpg" border="0"></a>
</font>
</td></tr></tbody></table>

</td>
<td>
<div id="wikihead">
    
<?php
//
// EL SELECT DE LES CATEGORIES
//
$db=mysql_connect("ike.sakeos.net","root","XZA4wp");
mysql_select_db("tenda_virtual",$db);
$result = mysql_query("SELECT nom_categoria FROM categories ORDER BY nom_categoria",$db);
?>

<form method=POST onSubmit="return dropdown(this.gourl)">
<SELECT NAME="gourl">
<option value="#">Selektu kategorion...</option>

<?php
while($myrow = mysql_fetch_array($result))
{
?>
<option value="#"><?php echo ($myrow["nom_categoria"]);?></option>
<?php
}
mysql_close($db);
?>
</select>
<input value="Produktojn" type="submit">
</form>






</div>

</td></tr></tbody></table>

<a href="./index.php"><img src="../imatges/logoviki.gif" border="0"></a>
</div>



<div id="menucentral">
<table border="0" width="100%" padding="0" cellspacing="0">
<tr>
<td><a href="../index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('botiga','','imatges/bot1-2.gif',1)"><img border="0" src="../imatges/bot1.gif" name="botiga"></a></td><td><a href="../acxetajxojn.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('cistella','','./imatges/bot2-2.gif',1)"><img border="0" src="../imatges/bot2.gif" alt="" name="cistella"></a> </td><td><a href="../formularo.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('formulari','','./imatges/bot3-2.gif',1)"><img border="0" src="../imatges/bot3.gif" alt="" name="formulari"></a> </td><td><a href="./index.php" onMouseOut="MM_swapImgRestore()" onMouseOver
="MM_swapImage('admin','','./imatges/bot4-2.gif',1)"><img border="0" src="../imatges/bot4.gif" alt="" name="admin"></a> </td><td width="200">&nbsp;</td>
</tr></table>
</div>



<table border="0"><tbody><tr>
<td id="wikibody" valign="top">
<font size="2">
<!--PageText-->
</font><div id="wikitext">





<h2>manteniment</h2>

<?
echo "Fent una c&ograve;pia\n<br>";
system("mysqldump --host=ike.sakeos.net --user=root --password=XZA4wp base --add-drop-table > /home/jk/public_html/tendeta/admin/copia.sql");
echo "Fin. Puede recuperar la base por FTP";
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
include("../peu_ca.inc");
?>

</div>
</div>
</body></html>
