<?php

define('HMAC_SHA256', 'sha256');
define('SECRET_KEY', '97f5bd9dcdc847089380c2b425409e541be84bf5772c4dbb9fe0c1781964bba9f903c00b9f7f468bb8632433d826e656a167cbfd0c4c4e589a659f31fa98943a1817d75b6bde40bc9d3afb9a496c29c18712899c470b4f20a4ed831c0a57cc93967df3916ca440629962f3b286bc1838dd5b17d9b8a44f15950ea2bdeb865dd4');

function sign($params)
{
    return signData(buildDataToSign($params), SECRET_KEY);
}

function signData($data, $secretKey)
{
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}

function buildDataToSign($params)
{
    $signedFieldNames = explode(",", $params["signed_field_names"]);
    foreach ($signedFieldNames as $field) {
        $dataToSign[] = $field . "=" . $params[$field];
    }
    return commaSeparate($dataToSign);
}

function commaSeparate($dataToSign)
{
    return implode(",", $dataToSign);
}
