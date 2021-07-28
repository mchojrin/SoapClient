<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => 'http://www.dneonline.com/calculator.asmx?WSDL',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <Add xmlns="http://tempuri.org/">
      <intA>50</intA>
      <intB>5</intB>
    </Add>
  </soap:Body>
</soap:Envelope>',
    CURLOPT_HTTPHEADER => [
        'Content-Type: text/xml; charset=utf-8',
    ]
]);

$response = curl_exec($curl);

curl_close($curl);

$matches = [];
preg_match('|<AddResult>([0-9]+)</AddResult>|', $response, $matches);
echo $argv[1].' + '.$argv[2].' = '.$matches[1].PHP_EOL;