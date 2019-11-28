<!DOCTYPE html>
<html>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8" />
	<title>Software Engineering Lab - QnA</title>
	
	<link rel="stylesheet" href="../common/css/index.css?var=1" type="text/css" />
	<link rel="stylesheet" href="../common/css/sidebar.css?var=1">
	<link rel="stylesheet" href="./qna.css?var=1" type="text/css" />
	
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">	$(function(){
		var duration = 300;

		var $side = $('#sidebar');
		var $sidebt = $side.find('button').on('click', function(){
			$side.toggleClass('open');

			if($side.hasClass('open')) {
				$side.stop(true).animate({left:'0px'}, duration);
			}else{
				$side.stop(true).animate({left:'-300px'}, duration);

			};
		});
	});
</script>

</head>

<body>
	<?php
		// DB Server Connection
		$connection = new PDO("mysql:dbname=qna;host=localhost", "root", "root");
		$rows = $connection->query("SELECT * FROM question ORDER BY created DESC;");
		// 질문 갯수
		$count = $rows->rowCount(); ?>
			
	<header>
	</header>
	<aside id="sidebar">
		<div>
			<ul>
				<li>Login</li>
				<br><br>
				<li>NOTICE</li>
				<li>RESEARCH</li>
				<li>PUBLICATIONS</li>
				<li>COURSES</li>
				<li>GALLERY</li>
				<li><a href="./qna.php">QnA</a></li>
				<li>CONTACT</li>
			</ul>
		<button>● ● ●</button>
	</aside>

	<article>
		<div class="qna">

			<div class="question-item_title">
					<h1>질문 목록(<?= $count ?>개)</h1>
			</div>
			
			<div class="question-list">

				<?php
					foreach ($rows as $row) { ?>
						<div class="question-item">
							<div class="question-item_header">
								<div class="question-item_header_icon">
									<img src="images/user.gif" />
								</div>

								<div class="question-item_header_top">
									<div class="question-item_writer"><?= $row["writer"] ?></div>
								</div>
								<div class="question-item_date"><?= $row["created"] ?></div>
							</div>
							
							<div class="question-item_body">
								<span><?= $row["content"] ?></span>
							</div>
						</div>
				<?php } ?>
			</div>
		</div>

		<div class="ask">
			<div class="ask-header">
				<h1>교수님께 질문하기</h1>
			</div>

			<form action="./add_question.php" method="post">
				<div class="ask-form">
					<textarea name="ask-content" placeholder="질문 내용을 입력하세요.(200자 이내)" maxlength="200" rows=5 cols=30></textarea>

					<div class="submit">
            			<input type=submit value="제출하기" id="button-blue"/>
            			<div class="ease"></div>
       				</div>

				</div>
			</form>				
		</div>

	</article>

	<footer role="contentinfo">
		<div class="container">
		</div>
	</footer>
</body>
</html>
