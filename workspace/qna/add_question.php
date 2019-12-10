<?php
	session_start();
	$user_id = $_SESSION['id'];
	$content = $_POST["ask-content"];
	$writer = $_SESSION['name'];
	date_default_timezone_set('Asia/Seoul');
	$date = date("Y-m-d H:i:s");

	try {
		// DB Server Connection
		$connection = new PDO("mysql:dbname=qna;host=localhost", "root", "root");
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// 질문 내용이 null이 아니면 작성자, 내용, 시간을 table에 넣은 후 새로 고침한다. 질문 내용이 null이면 새로 고침만 한다.
		if ($user_id != null) {
			if ($content != null) {
				$user_id = $connection->quote($user_id);
				$writer = $connection->quote($writer);
				$content = $connection->quote($content);
				$date = $connection->quote($date);
				$connection->exec("INSERT INTO question (user_id, writer, content, created, checked) VALUES ($user_id, $writer, $content, $date, 0);");
				header('Location: ./qna.php');
			} else {
				header('Location: ./qna.php');
			}
		} else { ?>
			<script type="text/javascript">
				var chkConfirm = confirm('로그인한 사용자만 질문을 작성하실수 있습니다.\n\n로그인 페이지로 이동할까요?');
				if (chkConfirm) {
					location.href='../login/login.php';
				} else {
					location.href='./qna.php';
				}
			</script>
		<?php }
		
	} catch (PDOException $ex) { ?>
		<p>Sorry, a database error occurred. Please try again later.</p>
		<p>(Error details: <?= $ex->getMessage() ?>)</p>
	<?php } ?>