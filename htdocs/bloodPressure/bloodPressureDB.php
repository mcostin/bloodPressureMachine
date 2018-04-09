<?php
	function insertItem($conexao, $sist, $diast, $pulse){
		$query = "insert into medicoes (sist, diast, pulse) values ('{$sist}','{$diast}','{$pulse}')";
		return mysqli_query($conexao, $query);
	}
	function listItems($conexao){
		$items = array();
		$result = mysqli_query($conexao, "select * from medicoes");
		while($item = mysqli_fetch_assoc($result)){
			array_push($items, $item);
		}
		return $items;
	}