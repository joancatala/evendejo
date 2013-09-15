<body>

<!--PageHeaderFmt-->
<div id="border">
<div id="container">
<div id="content">

<div id="header">
<table border="0" width="100%">  
<tbody><tr><td>

<table border="0">
<tbody><tr><td>

<a href="<?php echo ("$PHP_SELF"); ?>?lingvo=ca"><img alt="catala" src="./imatges/catala.jpg" border="0"/></a>&nbsp;<a href="<?php echo ("$PHP_SELF"); ?>?lingvo=eo"><img alt="esperanto" src="./imatges/esperanto.jpg" border="0"/></a>&nbsp;<a href="<?php echo ("$PHP_SELF"); ?>?lingvo=pl"><img alt="polac" src="./imatges/polac.jpg" border="0"/></a>&nbsp
</font>
</td></tr></tbody></table>

</td>
<td>
<div id="wikihead">
    
<?php
//
// EL SELECT DE LES CATEGORIES
//
include ("./inc/conexio.php");
$result = mysql_query("SELECT id,nom_categoria FROM categories ORDER BY nom_categoria",$db);
?>

<form method=POST onSubmit="return dropdown(this.gourl)">
<SELECT NAME="gourl">
<option value="./index.php"><?php echo ("$selecciona_una_categoria"); ?></option>

<?php
while($myrow = mysql_fetch_array($result))
{
?>
<option value="./index.php?lingvo=<?php echo ("$lingvo"); ?>&categoria=<?php echo ($myrow["id"]);?>"><?php echo ($myrow["nom_categoria"]);?></option>
<?php
}
mysql_close($db);
?>
</select>
<input value="<?php echo ("$productes"); ?>" type="submit">
</form>
</div>

</td></tr></tbody></table>
<a href="./index.php"><img alt="logo" src="imatges/evendejo-<?php echo ("$lingvo"); ?>.png" border="0"/></a>
</div>

