<?
///////////////////////////////////////////////////////////////////////
// Si algu envia el formulari (sent membre de KEA) en la pestanya 2 //
///////////////////////////////////////////////////////////////////////

if (($Correu))
{


$MailToAddress = "joan@riseup.net, l.puig@esperanto.cat, farri@mac.com, h.alos@esperanto.cat";
$MailSubject = "La teua compra";
    if (!$MailFromAddress) {
    $MailFromAddress = "libroservo@esperanto.cat";
    }

$Header = "\n\n................................................\nDades de la compra\n.................................................";
$MissatgeKEA = "Iep,\n$Nom (membre de KEA) ha fet una compra en la libroservo de la web.";
$MissatgeClient = "Hola $Nom!,\n\nHem rebut correctament totes les dades de la teua compra en la Libroservo. Aviat t'enviarem els productes a casa, o si n'hi ha algun problemeta ens ficarem en contacte amb tu.\n\nMerci per la compra i que aprofite! :-) \n\nEls Administradors de la Libroservo\nhttp://www.esperanto.cat/libroservo";

    if (!is_array($HTTP_POST_VARS))
    return;
    reset($HTTP_POST_VARS);
    while(list($key, $val) = each($HTTP_POST_VARS)) {
    $GLOBALS[$key] = $val;
    $val=stripslashes($val);
    $Message .= "$key = $val"."\n";
    $Message2 .= "$key = $val"."<br />";
    }

    if ($Header) {
    $Message = $Header."\n\n".$Message."\n";
    }

    //$Message .= "Dades enviades desde l'ordinador: ". $REMOTE_ADDR."\n";


//Correu que s'ens envia a nosaltres tras una compra
mail( "$MailToAddress", "$MailSubject", "$MissatgeKEA.$Message", "From: $MailFromAddress");

//Correu que s'envia al client
mail( "$Correu", "$MailSubject", "$MissatgeClient.$Message", "From: $MailFromAddress");


$ladata=date("d/m/Y",time());
include ("./conexio.php");
$result=mysql_query("INSERT INTO clients (nom_client,correu_client,compra_client,data_client ) VALUES ('$Nom','$Correu','$Message2','$ladata')",$db);

 if(!$result)
 {
        echo "N'hi ha hagut un error desconegut.";
        die('Error al fer la consulta: ' . mysql_error());
        } else {

        $result;
        mysql_close($db);
  }



header ("Location: ../index.php");

} else {

///////////////////////////////////////////////////////////////////////
// Pero si algu polsa el boto sense escriure un correu electronic    //
///////////////////////////////////////////////////////////////////////

echo "No has escrit totes les dades del formulari, torna a fer-ho, si us plau.";
}
?>
