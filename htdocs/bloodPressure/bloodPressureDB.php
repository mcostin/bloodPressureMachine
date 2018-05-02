<?php

	function listItems($conexao){
		$items = array();
		$result = mysqli_query($conexao, "select * from medicoes");
		while($item = mysqli_fetch_assoc($result)){
			array_push($items, $item);
		}
		return $items;
	}
	function medicoes2_listItems($conexao){
		$items = array();
		$result = mysqli_query($conexao, "select * from medicoes2");
		while($item = mysqli_fetch_assoc($result)){
			array_push($items, $item);
		}
		return $items;
	}
	function insertItem($conexao, $sist, $diast, $pulse){
		$query = "insert into medicoes (sist, diast, pulse) values ('{$sist}','{$diast}','{$pulse}')";
		return mysqli_query($conexao, $query);
	}
	function medicoes2_insertItem($conexao, $sist, $diast, $pulse){
		$query = "insert into medicoes2 (sist, diast, pulse) values ('{$sist}','{$diast}','{$pulse}')";
		return mysqli_query($conexao, $query);
	}
	function removeItem($conexao, $id){
		$query = "delete from medicoes where id = {$id}";
		return mysqli_query($conexao, $query);
	}
	function medicoes2_removeItem($conexao, $id){
		$query = "delete from medicoes2 where id = {$id}";
		return mysqli_query($conexao, $query);
	}