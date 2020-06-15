<?php
    function getData($url, $proxy = null, $proxyType = null) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $useragent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36';
        curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
        curl_setopt($ch, CURLOPT_REFERER, 'https://www.google.com/');
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_TIMEOUT, 40);
        curl_setopt($ch, CURLOPT_TIMEOUT, 40);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);

        // proxy
        if (checkProxyLive($proxy)) {
            if (isset($proxy)) {
                curl_setopt($ch, CURLOPT_PROXY, $proxy);
            }
    
            if (isset($proxyType)) {
                curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTPS);
            }
    
            $data = curl_exec($ch);
            curl_close($ch);
            
            return $data;
        }
    }

    function checkProxyLive($proxy) {
        $waitTimeoutInSeconds = 10;

        $proxySplit = explode(':', $proxy);
        $proxyIP = $proxySplit[0];
        $proxyPort = $proxySplit[1];

        $result = false;

        $fp = fsockopen($proxyIP, $proxyPort, $errCode, $errStr, $waitTimeoutInSeconds);
        if ($fp) {
            $result = true;
            fclose($fp);
        }

        return $result;
    }

    function downloadFile($url, $path) {
        $file = fopen($path, 'w');

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_FILE, $file);
        curl_setopt($ch, CURLOPT_TIMEOUT, 28800);

        $error = curl_error($ch);

        curl_exec($ch);
        curl_close($ch);
        fclose($file);

        return $error;
    }
?>