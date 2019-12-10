<?php
	session_start();
	session_unset();

	echo "<script>alert('로그아웃되었습니다.');</script>";
	echo "<script>location.href='./login.php';</script>";
?>