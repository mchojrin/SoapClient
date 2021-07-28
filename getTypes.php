<?php

$client = new SoapClient('http://www.dneonline.com/calculator.asmx?WSDL');

echo 'Types available: '.print_r($client->__getTypes());
echo PHP_EOL;