<?php
	// require_once('api.php');
	// require_once('showResult.php');
	// require_once('controller.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thời tiết</title>
</head>
<body>
    <div class="container">
		<header id="header" class="header">
			<div class="logo">
				<!-- <img src="public/img/weather.png" alt="weather"> -->
			</div>
			<nav>
				<div class="form-group">
					<input type="text" name="txtCity" id="txtCity" class="form-control" placeholder="Nhập tên thành phố">
					<button type="button" class="btn" id="btnSearch">Tìm kiếm</button>
				</div>
			</nav>
			<div id="loading">
				<!-- <img src="public/img/loading.gif" alt="loading"> -->
			</div>
			<section id="mainResult">
				
			</section>
		</header>
	</div>
</body>
</html>