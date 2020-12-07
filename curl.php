<?php
    require 'access-token.php';
    $curl = curl_init('https://bandcamp.com/api/account/1/my_bands');
    // $curl = curl_init('https://bandcamp.com/api/merchorders/1/get_merch_details');
    $headr = array();
    $headr[] = 'Content-length: 0';
    $headr[] = 'Content-type: application/x-www-form-urlencoded';
    $headr[] = 'Authorization: Bearer ' . $accesstoken;
    $headr[] = 'Accept: application/json';
    $headr[] = 'grant_type: client_credentials';
    $headr[] = 'client_id: '.$client_id;
    $headr[] = 'client_secret:'.$client_secret;
    $headr[] = 'bands:';
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headr);
    curl_setopt($curl, CURLOPT_POST, true);
    $data = curl_exec($curl);
    if ($data === false) {
        var_dump(curl_error($curl.'ca marche pas'));
    } else {
        var_dump($data);
    }
    curl_close($curl);

 
    ?>