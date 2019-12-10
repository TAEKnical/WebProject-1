<?php
session_start();
include ("connect.php");
	$login_ok = false;
	$id = $_POST["inputid"];
	$pw = $_POST["inputpw"];

	$query = "select * from info where id='$id' and pw='$pw'";
	// $result = mysqli_query($con, $query);
	// $row = mysqli_fetch_array($result);
try { 
				$stmt = $con->prepare('select * from info where id=:id');
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			   
			} catch(PDOException $e) {
				die("Database error. " . $e->getMessage()); 
			}

			$row = $stmt->fetch();  
			$password = $row['pw'];
			if ( $pw == $password) {
				$login_ok = true;
			}

	if($login_ok){
		$_SESSION['id']=$row['id'];
				$_SESSION['name']=$row['name'];	
				echo "<script>location.href='login.php';</script>";
							echo "<script>histroy.back();</script>";
						// echo "<script>location.href='qna/qna.php';</script>";
				// echo $_SESSION['name'];
				// header("Location : qna.php?name=writer");
	}
	else{
		// echo "<script>window.alert('invalid username or password');</script>"; // 잘못된 아이디 또는 비빌번호 입니다
		// echo "<script>location.href='login.php';</script>";
		print $_SESSION['name'];
	}


// 	if($id != null && $pw != null){
// 		//if($id==$row['id'] && $pw==$row['pw']){ // id와 pw가 맞다면 login
// 		if(select * from info where id == $id && select * from info where pw == $pw){
// 			$_SESSION['id']=$row['id'];
// 			$_SESSION['name']=$row['name'];
// 			echo "<script>location.href='signup.html';</script>";
// 		}else{
// 			echo "<script>histroy.back();</script>";
// 		}
// 	}else{ // id 또는 pw가 다르다면 login 폼으로
// 		echo "<script>window.alert('invalid username or password');</script>"; // 잘못된 아이디 또는 비빌번호 입니다
// 		echo "<script>location.href='login.php';</script>";
// }

?>