<?php
	
	$created = $_POST["created"];
	$writer = $_POST["writer"];
	/* qna.php에서 값 넘어오는거 확인
	print $created;
	print $writer; */

	//$check = $_POST[""]
	// DB Server Connection
	$connection = new PDO("mysql:dbname=qna;host=localhost", "root");
	
	$created = $connection->quote($created);
	$writer = $connection->quote($writer);

	// 답변 완료 버튼을 누를 경우 table에서 checked 칼럼의 값을 0에서 1로 변경
	$connection->exec("UPDATE question SET checked = 1 WHERE writer = $writer AND created = $created;");
	header('Location: ./qna.php');
?>