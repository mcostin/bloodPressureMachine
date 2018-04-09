<?php 
	include("cabecalho.php");
	include("conexao.php");
	include("bloodPressureDB.php"); 
?>

<table class="table table-striped table-bordered">
	<?php $items = listItems($conexao);
	foreach($items as $item):
	?>
	<tr>
		<td><?= $item['sist'] ?></td>
		<td><?= $item['diast'] ?></td>
		<td><?= $item['pulse'] ?></td>
	</tr>
	<?php endforeach ?>
</table>
<?php include("rodape.php");?>