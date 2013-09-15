<?
	$usuari = $_POST['usuari'];
	$clau = $_POST['pwd'];
	
	if(($usuari == 'demo') && ($clau == '1234')){

		session_start();
		session_register('usuari');
		
		header('Location: admin/index.php');
	}
	else{
		header('Location: login.php?error');
	}
?>
