<?php
	require 'api.php';
	$nameCity = $_POST['name'] ?? '';
	$nameCity = strip_tags($nameCity);
	$data = getDataFromAPI($nameCity);
    $listWeather = isset($data['list']) ? $data['list'] : [];
    
    var_dump($nameCity);
    var_dump($data);
    var_dump($listWeather);
	require 'showResult.php';
?>