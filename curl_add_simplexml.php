<?php

$curl = curl_init();

$envelope = new SimpleXMLElement('<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"/>', 0, false, 'soap');
$body = $envelope->addChild('soap:Body');
$operation = $body->addChild('Add', null, 'http://tempuri.org/');
$operation->addChild('intA', $argv[1]);
$operation->addChild('intB', $argv[2]);

$xml = $envelope->asXML();

curl_setopt_array($curl, [
    CURLOPT_URL => 'http://www.dneonline.com/calculator.asmx?WSDL',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $xml,
    CURLOPT_HTTPHEADER => [
        'Content-Type: text/xml; charset=utf-8',
    ]
]);

$response = curl_exec($curl);

curl_close($curl);
$matches = [];
preg_match('|<AddResult>([0-9]+)</AddResult>|', $response, $matches);
echo $argv[1].' + '.$argv[2].' = '.$matches[1].PHP_EOL;