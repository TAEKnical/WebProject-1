<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "qna";


//$con = new mysqli($db_host, $db_user, $db_password, $db_name); // 데이터베이스 접속
//if ($con->connect_errno) { die('Connection Error : '.$con->connect_error); } // 오류가 있으면 오류 메세지 출력
try{
	$con = new PDO("mysql:dbname=qna;host=localhost", "root", "root");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
	echo $e->getMessage();
}

?>