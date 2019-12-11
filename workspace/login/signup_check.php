<?php

try {
    //include("connect.php");
	// DB Server Connection
	$con = new PDO("mysql:dbname=qna;host=localhost", "root", "root");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$id = $_POST["id"]; 
	$pw = $_POST["pw"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	
	if($id != null && $pw != null && $name != null && $email != null){
		if(preg_match("/^[a-zA-Z0-9]+$/", $id)){
			if(preg_match("/^[a-zA-Z]+(([ -])?[a-zA-Z])*$/", $name)) {
				if(preg_match("/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/", $email)){
					$id = $con->quote($id);
					$pw = $con->quote($pw);
					$name = $con->quote($name);
					$email = $con->quote($email);
					//$query = "INSERT INTO info (id, pw, name, email) VALUES ($id, $pw, $name, $email);";
			
					if($con->exec("INSERT INTO info (id, pw, name, email, admin) VALUES ($id, $pw, $name, $email, 0);")){
						echo "<script>alert('회원가입이 완료되었습니다.');</script>";
						echo "<script>location.href='./login.php';</script>";
					} else{
						echo "<script>alert('회원가입 실패.');</script>";
						echo "<script>location.href='./signup.html';</script>";
					}
				} else {
					echo "<script>alert('E-mail 양식이 틀렸습니다.');</script>";
					echo "<script>location.href='./signup.html';</script>";
				}
			} else {
				echo "<script>alert('이름 양식이 틀렸습니다.');</script>";
				echo "<script>location.href='./signup.html';</script>";
			}
		} else {
			echo "<script>alert('ID는 영어와 숫자만 입력 가능합니다.');</script>";
			echo "<script>location.href='./signup.html';</script>";
		}
	} else {
		echo "<script>alert('빈칸없이 입력해주세요.'); history.back();</script>";

	}


} catch (PDOException $ex) {
    ?>
    <p>Sorry, a database error occurred. Please try again later.</p>
    <p>(Error details: <?= $ex->getMessage() ?>)</p>
    <?php
}
 

?>

<meta charset="utf-8" />
<!--<meta http-equiv="refresh" content="0 url=/">-->
