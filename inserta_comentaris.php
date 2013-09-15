<?php

//recollim les variables
$variable_titol= $_POST['camp_titol'];
$variable_comentari= $_POST['camp_comentari'];
$variable_nomusuari= $_POST['camp_nom_usuari'];
$ladata=date("d/m/Y",time());;
$v_idarticle=($_GET[id]);


//conexio
include ("./inc/conexio.php");

//consulta
//$result=mysql_query("INSERT INTO comentaris (titol, comentari, nom_usuari, data, id_dades) VALUES ('$camp_titol','$camp_comentari','$camp_nom_usuari','$ladata','$v_idarticle')",$db);
$result=mysql_query("INSERT INTO comentaris (titol, comentari, nom_usuari, data, id_dades) VALUES ('$variable_titol', '$variable_comentari', '$variable_nomusuari', '$ladata', '$v_idarticle')",$db);

  if(!$result)
  {
        echo "N'hi ha hagut un error desconegut.";
        die('Error al fer la consulta: ' . mysql_error());
        } else {

        $result;
 	header("Location: ./articles.php?id=$v_idarticle");       
        ?>

       <?php
        mysql_close($connect);
        }
?>
