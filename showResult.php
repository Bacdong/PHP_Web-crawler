<?php if($listWeather): ?>
	<?php foreach ($listWeather as $key => $items): ?>
	<div class="weatherData" style="border-bottom: 1px solid #ccc; margin: 8px 0px; width: 100%;">
		<h4>Thời gian: <?php echo $items['dt_txt']; ?></h4>
		<p>Nhiệt độ: <?php echo $items['main']['temp']; ?>°C</p>
		<p>Độ ẩm: <?php echo $items['main']['humidity']; ?>%</p>
		<p>Mực nước biển: <?php echo $items['main']['sea_level']; ?> m</p>
		<p>Trạng thái: <?php echo $items['weather'][0]['description']; ?></p>
		<p><img src="http://openweathermap.org/img/w/<?php echo $items['weather'][0]['icon']; ?>.png" alt=""></p>
		<p>Sức gió: <?php echo $items['wind']['speed']; ?> m/h</p>
	</div>
	<?php endforeach; ?>
<?php else: ?>
	<h3 style="text-align: center;">Không có kết quả</h3>
<?php endif; ?>