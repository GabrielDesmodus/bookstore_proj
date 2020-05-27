<?php
	$_SESSION['link'] = mysqli_connect("localhost", "aluno", "aluno","bookshop_db");

	if (mysqli_connect_errno() != 0) 
	{
			$error = mysqli_connect_error();
			echo ("<p>Impossível acessar o Banco de Dados!</p>
				   <p>Erro: $error</p>");
			return;
			
	}

	mysqli_query($_SESSION['link'],"SET NAMES 'utf8'");
	mysqli_query($_SESSION['link'],"SET character_set_connection=utf8");
	mysqli_query($_SESSION['link'],"SET character_set_client=utf8");
	mysqli_query($_SESSION['link'],"SET character_set_results=utf8");


	function insere($table, $fields, $values){
		$sql = "INSERT into $table ($fields) values ($values)";

		if(mysqli_query($_SESSION['link'],$sql)){
			return true;
		}
	}

	function seleciona($table, $fields, $args){
		
		$sql = "SELECT $fields from $table $args";		
		$return = mysqli_query($_SESSION['link'], $sql); # retorna registros (SELECT)
		$list = array();
		while($reg = mysqli_fetch_assoc($return)){
			array_push($list, $reg);
		}
		return $list;
	}

	function atualiza($table, $edit, $args){
		
		$sql = "UPDATE $table SET $edit $args";			
		if(mysqli_query($_SESSION['link'],$sql)){
			return true;
		}
	}

	function deletar($table, $args){
		$sql = "DELETE from $table $args";

		if(mysqli_query($_SESSION['link'], $sql)){
			return true;
		}
	}
?>
