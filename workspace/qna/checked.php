<?php
	session_start();
	$created = $_POST["created"];
	$writer = $_POST["writer"];
	$user_id = $_SESSION['id'];
	/* qna.php에서 값 넘어오는거 확인
	print $created;
	print $writer; */

	//$check = $_POST[""]
	// DB Server Connection
	$connection = new PDO("mysql:dbname=qna;host=localhost", "root", "root");
	$created = $connection->quote($created);
	$writer = $connection->quote($writer);
	$user_id = $connection->quote($user_id);
	$stmt = $connection->prepare("SELECT admin FROM info WHERE id = $user_id;");
	$stmt->execute();
	$admin = $stmt->fetch();
	
	// 관리자 권한이 있으면 답변 완료 버튼을 클릭 시 table에서 checked 칼럼의 값을 0에서 1로 변경
	// 관리자 권한이 없으면 alert 띄워준 후 qna.php로 되돌아감
	if ($admin['admin'] == '1') {
		$stmt = $connection->prepare("UPDATE question SET checked = 1 WHERE writer = $writer AND created = $created;");
		$stmt->execute();
		header('Location: ./qna.php');
	} else {
		echo "<script>alert('교수님만 사용할 수 있는 기능입니다.');</script>";
		echo "<script>location.href='./qna.php';</script>";
	}
	
?>