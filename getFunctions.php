<?php

$client = new SoapClient('http://www.dneonline.com/calculator.asmx?WSDL');

echo 'Functions available: '.print_r($client->__getFunctions());
echo PHP_EOL;