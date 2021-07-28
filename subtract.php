<?php

$client = new SoapClient('http://www.dneonline.com/calculator.asmx?WSDL');

$result = $client->__soapCall('Subtract', [
    new SoapParam($argv[1], 'intA'),
    new SoapParam($argv[2], 'intB'),
]);

echo $argv[1].' - '.$argv[2].' = '. $result->SubtractResult;