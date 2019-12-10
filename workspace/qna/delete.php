<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$user_id = $_POST["user_id"];
		$writer = $_POST["writer"];
		$created = $_POST["created"];
	
		// qna.php에서 값 넘어오는것 확인용(삭제 금지)
		
		// print $user_id;
		// print $writer;
		// print $created;
		
		
		$connection = new PDO("mysql:dbname=qna;host=localhost", "root", "root");
		
		if ($_SESSION['id'] == $user_id) {
			$user_id = $connection->quote($user_id);
			$writer = $connection->quote($writer);
			$created = $connection->quote($created);
			echo "<script>alert('삭제하였습니다.');</script>";
			$connection->exec("DELETE FROM question WHERE user_id = $user_id AND writer = $writer AND created = $created;");
			echo "<script>location.href='./qna.php';</script>";
			/*
			echo "<script>var delConfirm = confirm('질문을 삭제하시면 삭제한 질문은 복구할 수 없습니다.\n\n질문을 삭제하시겠습니까?');</script>";
			echo "<script>if (delConfirm) {</script>";		
			echo "<script>} else {</script>";
			echo "<script>location.href='./qna.php';</script>";
			echo "<script>}</script>";	
			*/
			} else {
				echo "<script>alert('본인이 작성한 글만 삭제가 가능합니다.');</script>";
				echo "<script>location.href='./qna.php';</script>";
			}
		?>
</body>
</html>