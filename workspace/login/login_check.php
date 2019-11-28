<?php
session_start();
include ("connect.php");

	$id = $_POST["inputid"];
	$pw = $_POST["inputpw"];

	$query = "select * from info where id='$id' and pw='$pw'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);

	if($id != null && $pw != null){
		if($id==$row['id'] && $pw==$row['pw']){ // id와 pw가 맞다면 login

			$_SESSION['id']=$row['id'];
			$_SESSION['name']=$row['name'];
			echo "<script>location.href='signup.html';</script>";
		}else{
			echo "<script>histroy.back();</script>";
		}
	}else{ // id 또는 pw가 다르다면 login 폼으로
		echo "<script>window.alert('invalid username or password');</script>"; // 잘못된 아이디 또는 비빌번호 입니다
		echo "<script>location.href='login.php';</script>";
}

?>