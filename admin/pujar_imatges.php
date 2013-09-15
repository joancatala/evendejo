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
<html xmlns="http://www.w3.org/1999/xhtml"><head><title>Libroservo de KEA</title>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta name="Description" content="">
<meta name="Keywords" content="">
<link rel="stylesheet" href="../stylesheet.css" type="text/css">

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
<p>
<a href="../index.php">Botiga</a> | <a href="../acxetajxojn.php">Cistella</a> | <a href="../formularo.php">Formulari</a> | <a href="./index.php">Administraci&oacute;</a> | <a href="./eixir.php">Eixir de la sessi&oacute;</a></p></td>
</tr></table>
</div>



<table border="0"><tbody><tr>
<td id="wikibody" valign="top">
<font size="2">
<!--PageText-->
</font><div id="wikitext">



<h2>Pujant imatges al servidor</h2>
<?php
define("DESTINATION", "../imatges/productes/");

/* Number of Upload files */
define("UPLOAD_NO", 3);

echo("<p>Pots pujar 3 imatges de cop omplint els 3 camps de baix i fent clic en 'pujar fitxer'. Les imatges estaran al directori <b>'productes'</b>, &eacute;s a dir, just a la direcci&oacute;: <a href='http://www.esperanto.cat/libroservo/imatges/productes'>http://www.esperanto.cat/libroservo/imatges/productes</a></p><p><br /><b>Les imatges han de tindre una ampl&agrave;ria m&agrave;xima de 70px.</b> De lo contrari, no es veuran de manera &ograve;ptima ja que a la plana de la botiga hem definit que l'ampl&agrave;ria ha de ser 70px com a m&agrave;xim..<center>");

if($REQUEST_METHOD!="POST")
{
print "<form enctype=\"multipart/form-data\" method=post>\n";
print "<INPUT TYPE=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"3000000\">\n";
for($i=1; $i<=UPLOAD_NO; $i++)
{
echo "<input type=file name=infile$i><br />";

if($i%4==0)
print"<br>";
}
echo "<br><br><input type=submit value='pujar fitxer'></form>\n";
}
else
{

/* aci comenï¿½ la pujada del fitxer */

$noinput = true;
for($i=1; $noinput && ($i<=UPLOAD_NO); $i++)
{
if(${"infile".$i}!="none") $noinput=false;
}
if($noinput)
{
print "<big><B>Error pujant el fitxer. Si us plau, torna-ho a intentar.</B></big>";
exit();
}
echo("<p align='center'>Fitxer pujat correctament</p><br><table border=\"0\"><tr>");

for($i=1; $i<=UPLOAD_NO; $i++)
{

$just=filesize(${"infile".$i});
$fp_size[i] = $just;

if(${"infile".$i}!="none" &&
copy(${"infile".$i}, DESTINATION.${"infile".$i."_name"}) &&
unlink(${"infile".$i}))
{
echo("<tr>
<td width='14%' height='19'><p>$i</p></td>
<td width='52%' height='19'><p>${"infile".$i."_name"}</p></td>
<td width='34%' height='19'><p>$fp_size[i]</center></p></td>
</tr>
");
}
}
echo "</table>";
}
?>

<center>
  <table border="0" bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="520" class="body">
    <tr> 
      <td width="100%" colspan="2">
        <hr size="1" color="#000000">
      </td>
    </tr>
  </table>
</center>


</td>
</tr>
</tbody></table>
</div>

<?php
include("../inc/peu_ca2.inc");
?>

</div>
</div>
</body></html>
