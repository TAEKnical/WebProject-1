<?php
	session_start();
	$content = $_POST["ask-content"];
	$writer = $_SESSION['name'];
	date_default_timezone_set('Asia/Seoul');
	$date = date("Y-m-d H:i:s");

	// DB Server Connection
	$connection = new PDO("mysql:dbname=qna;host=localhost", "root", "root");
	
	// 질문 내용이 null이 아니면 작성자, 내용, 시간을 table에 넣은 후 새로 고침한다. 질문 내용이 null이면 새로 고침만 한다.
	if ($content != null) {
		$writer = $connection->quote($writer);
		$content = $connection->quote($content);
		$date = $connection->quote($date);
		$connection->exec("INSERT INTO question (writer, content, created, checked) VALUES ($writer, $content, $date, 0);");
		header('Location: ./qna.php');
	} else {
		header('Location: ./qna.php');
	}
?>