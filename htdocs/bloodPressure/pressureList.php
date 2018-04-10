<?php 
	include("cabecalho.php");
	include("conexao.php");
	include("bloodPressureDB.php"); 

	if(array_key_exists("rmv", $_GET) && $_GET["rmv"] == true){ ?>
		<p class="text-success">Item removido com sucesso.</p>
<?php } ?>

<table class="table table-striped table-bordered">
	<?php $items = listItems($conexao);
	foreach($items as $item):
	?>
	<tr>
		<td><?= $item['sist'] ?></td>
		<td><?= $item['diast'] ?></td>
		<td><?= $item['pulse'] ?></td>
		<td>
			<form action="rmvMedicao.php" method="post">
				<input type="hidden" name="id" value="<?=$item['id']?>"/>
				<button class="btn btn-danger">Remover</button>
			</form>
		</td>
	</tr>
	<?php endforeach ?>
</table>
<?php include("rodape.php");?>