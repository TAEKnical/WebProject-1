<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8" />

	<title>Login page</title>

	<link rel="stylesheet" href="./css/login.css?var=1" type="text/css" />

	<link rel="stylesheet" href="../common/css/sidebar.css?var=2">

		

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script src="../common/scripts/sidebar.js" type="text/javascript"></script>

</head>

<body>

	<header>

		<div id=background>

			<a href="../index.html"><img src=../common/images/selab_logo_S.png></a>

		</div>

	</header>

	<aside id="sidebar">

		<div>

			<ul>

				<li><a href="./login.php">Login</a></li>

				<br><br>

				<li><a href="../login/login.php">NOTICE</a></li>

				<li><a href="../login/login.html">RESEARCH</a></li>

				<li><a href="../login/login.html">PUBLICATIONS</a></li>

				<li><a href="../login/login.html">COURSES</a></li>

				<li><a href="../login/login.html">GALLERY</a></li>

				<li><a href="../qna/qna.php">QnA</a></li>

				<li><a href="../login/login.html">CONTACT</a></li>

			</ul>

		<button>● ● ●</button>

	</aside>

 

	<div class=box>

		<div class="container">

			<h1>Login</h1>

			<?php
			if($_SESSION['id']==null){
			?>

			<form method='post' action="./login_check.php">
			<div class="label">아이디</div>

			<div class="form">

				<input type="text" id="id" placeholder="ID" name='inputid'/>

			</div>

 

			<div class="label">비밀번호</div>

			<div class="form">

				<input type="password" id="pw" placeholder="PW" name='inputpw'/>

			</div>

			<br>

			<input id="signup" type="submit" value="login"/>
			</form>
			<?php
			}else{
				echo "<center><br><br><br>";
   				echo $_SESSION['name']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
   				echo "&nbsp;<a href='logout.php'><input type='button' value='Logout'></a>";
   				echo "</center>";
			}
			?>
			<a href="./signup.html"><button id="signup">회원가입</button></a>

		</div>

	</div>

 

</body>

</html>