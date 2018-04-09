<?php include("cabecalho.php");?>
	<h1>
		Formulário Teste
	</h1>
	<br/><br/>
	<form action="addMedicao.php">
		<table class="table">
			<tr>
				<td>Pressão sistólica</td>
				<td><input type="number" name="sist"></td>
			</tr>
			<tr>
				<td>Pressão diastólica</td>
				<td><input type="number" name ="diast"></td>
			</tr>
			<tr>
				<td>Pulso</td>
				<td><input type="number" name="pulse"></td>
			</tr>
			<tr>
				<td ><button class="btn button-primary" type="submit">Cadastrar</button></td>
			</tr>
		</table>
	</form>
<?php include("rodape.php");?>