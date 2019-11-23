<?php
	$content = $_POST["ask-content"];
	$writer = "강동완";
	date_default_timezone_set('Asia/Seoul');
	$date = date("Y-m-d H:i:s");

	// DB Server Connection
	$connection = new PDO("mysql:dbname=qna;host=localhost", "root", "root");
	
	if ($content != null) {
		$writer = $connection->quote($writer);
		$content = $connection->quote($content);
		$date = $connection->quote($date);
		$connection->exec("INSERT INTO question (writer, content, created) VALUES ($writer, $content, $date);");
		header('Location: ./qna.php');
	} else {
		header('Location: ./qna.php');
	}
?>