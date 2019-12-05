<?php

	$id = $_POST["id"];
	// print $id;
	
	 // qna.php에서 값 넘어오는거 확인
	
	$connection = new PDO("mysql:dbname=qna;host=localhost", "root");
	$query = "delete from question where id = '$id'"; 
	$connection ->exec($query);
	header('Location: ./qna.php');
?> 