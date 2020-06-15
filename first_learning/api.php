<?php 
	function getDataFromAPI($nameCity){
		$urlApi = "http://api.openweathermap.org/data/2.5/forecast?q={$nameCity}&appid=073f342f34bacc8898356a523fa5b4f8&units=metric&lang=vi";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $urlApi);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$res = curl_exec($ch);
		curl_close($ch);
		$data = ($res !== null || $res !== '') ? json_decode($res, true) : [];
		return $data;
	}
?>