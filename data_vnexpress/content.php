<?php
    error_reporting(E_ERROR);
    set_time_limit(0);
    require_once('./function.php');

    $url = 'https://vnexpress.net/';

    $proxyID = trim(file_get_contents('./proxy.txt'));

    // $proxyType = 'CURLPROXY_HTTPS';
    $proxyType = null;


    $data = getData($url, $proxyID, $proxyType);

    $r = downloadFile('https://i1-vnexpress.vnecdn.net/2020/06/13/tainan-1592060010-7407-1592060399.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=AZcO6zzHPfrPMmGqK-nkbg', 'data/img1.jpg');
    if (empty($r)) {
        echo 'download success';
    } else {
        echo 'download fail';
    }
    echo htmlspecialchars($data);
?>