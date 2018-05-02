<?php 
	include("cabecalho.php");
	include("conexao.php");
	include("bloodPressureDB.php"); 

	$sist = $_GET["sist"];
 	$diast = $_GET["diast"];
 	$pulse = $_GET["pulse"];

 	if(medicoes2_insertItem($conexao, $sist, $diast, $pulse)) { ?>
	<p class="text-success">Medição ( <?= $sist; ?>, <?= $diast; ?>, <?= $pulse; ?> ) adicionada com sucesso!</p>
	<?php } else { 
	$msg = msqli_error($conexao);
?>
	<p class="text-danger">A medição <?= $sist; ?> não foi adicionada: <?= $msg; ?></p>
	<?php } ?>

<?php include("rodape.php");?>