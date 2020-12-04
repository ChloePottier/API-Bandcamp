<?php
    $curl = curl_init('https://bandcamp.com/api/account/1/my_bands');
    require 'access-token.php';
    $headr = array();
    $headr[] = 'Content-length: 0';
    $headr[] = 'Content-type: application/json';
    $headr[] = 'Authorization: Bearer ' . $accesstoken;

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headr);
    curl_setopt($curl, CURLOPT_POST, true);
    $data = curl_exec($curl);
    if ($data === false) {
        var_dump(curl_error($curl));
    } else {
        var_dump($data);
    }
    curl_close($curl);
    print_r($data);
    ?>