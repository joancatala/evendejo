<div id="mission">

<div class="box">
<div class="w1">
<div class="w2">
<div class="w3">
<div class="w4">


<?php

include("./inc/conexio.php");
mysql_select_db("botiga",$db);
$result = mysql_query("SELECT id,camps FROM configuracions WHERE id=1",$db);

while($myrow = mysql_fetch_array($result))
{
echo ($myrow["camps"]);
}
mysql_close($db);
?>



</div>
</div>
</div>
</div>
</div>
<br />
