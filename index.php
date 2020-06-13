<?php
    $curl = curl_init();
    $url = 'https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22hanoi%2C%20vietnam%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys';
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 0,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'thongvang.local/php_curl',
        CURLOPT_SSL_VERIFYPEER => false
    ));
    
    $resp = curl_exec($curl);
    
    //Dữ liệu thời tiết ở dạng JSON
    $weather = json_decode($resp);
    var_dump($weather);
    
    curl_close($curl);
?>