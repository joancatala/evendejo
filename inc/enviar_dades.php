<?
///////////////////////////////////////////////////////////////////////
// Si algu envia el formulari en la pestanya 1 //
///////////////////////////////////////////////////////////////////////
if (($Correu))
{


$MailToAddress = "joan@riseup.net";
$MailSubject = "La teua compra";
    if (!$MailFromAddress) {
    $MailFromAddress = "info@mondakalendaro.org";
    }

$Header = "\n\n................................................\nDades de la compra\n.................................................";
$MissatgeKEA = "Tenim una nou client que ha fet una compra a la Libroservo.";
$MissatgeClient = "Hola $Nom!,\n\nHem rebut correctament totes les dades de la teua compra en la Libroservo de KEA. Aviat t'enviarem els productes a casa, o si veiem que n'hi ha algun problemeta amb les teues dades ens ficarem en contacte amb tu per correu, d'acord?.\n\nMerci per la compra i que aprofite! :-) \n\nEls Administradors de la Libroservo\nhttp://www.esperanto.cat/libroservo";

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



//
//Ara fiquem tota aquesta informacio sobre el client en la nostra BBDD
//
$ladata=date("d/m/Y",time());
include ("./conexio.php");
$result=mysql_query("INSERT INTO clients (nom_client,adreca_client,ciutat_client,cp_client,pais_client,correu_client,banc_client,compra_client,data_client ) VALUES ('$Nom','$Direccio','$Ciutat','$CP','$Pais','$Correu','$Banc','$Message2','$ladata')",$db);

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
