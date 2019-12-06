<?php
	
	session_destroy();

	alert('로그아웃되었습니다.');
	echo "<script>location.href='./login.php';</script>";
?>