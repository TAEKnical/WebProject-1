<?php

include("connect.php");



	$id = $_POST["id"]; 
	$pw = $_POST["pw"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	if($id != null && $pw != null && $name != null && $email != null)
	{	
		
		$sql = "SELECT * FROM info WHERE $id='{$id}'";
		$query = "INSERT INTO info (id,pw,name,email) VALUES ($id, $pw, $name, $email)";

		$query = $query;
		if($con->query($query)){
			echo "<script>alert('회원가입이 완료되었습니다.');</script>";
			echo "<script>location.href='./login.php';</script>";	
		}else{
			echo "<script>alert('회원가입 실패.');</script>";
			echo "<script>location.href='./signup.html';</script>";
		}
		} /*else{
			if(is_int($_POST['id']) && !is_string($_POST['name']))
			{
				echo "<script>alert('이름을 다시 입력해주세요.');</script>";
				echo "<script>history.back();</script>";
			}else if(!is_int($_POST['id']) && !is_string($_POST['name']){
				echo "<script>alert('이름과 아이디를 다시 입력해주세요.');</script>";
				echo "<script>history.back();</script>";
			}else{
				echo "<script>alert('아이디를 다시 입력해주세요.');</script>";
				echo "<script>history.back();</script>"; 
			}
		}
		*/	
	else{
		echo "<script>alert('빈칸없이 입력해주세요.'); history.back();</script>";
	}


 

?>

<meta charset="utf-8" />
<!--<meta http-equiv="refresh" content="0 url=/">-->
