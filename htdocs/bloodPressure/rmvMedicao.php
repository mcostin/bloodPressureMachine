<?php 
	include("cabecalho.php");
	include("conexao.php");
	include("bloodPressureDB.php"); 

	$id = $_POST['id'];
	medicoes2_removeItem($conexao, $id);
	header("Location: pressureList.php?rmv=true");
	die();
?>

