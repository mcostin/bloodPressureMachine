<?php 
	include("cabecalho.php");
	include("conexao.php");
	include("bloodPressureDB.php"); 

	if(array_key_exists("rmv", $_GET) && $_GET["rmv"] == true){ ?>
		<p class="text-success">Item removido com sucesso.</p>
<?php } ?>

<table class="table table-striped table-bordered">
	<thead>
    <tr>
    	<th scope="col">Horário da medição</th>
      	<th scope="col">Pressão sistólica (mmHg)</th>
      	<th scope="col">Pressão diastólica (mmHg)</th>
      	<th scope="col">Pulso (bpm)</th>
      	<th scope="col"></th>
    </tr>
  </thead>
	<?php $items = medicoes2_listItems($conexao);
	foreach($items as $item):
	?>
	<tr>
		<td><?= $item['ts'] ?></td>
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