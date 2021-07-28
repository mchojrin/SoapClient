<?php

$client = new SoapClient('http://www.dneonline.com/calculator.asmx?WSDL');

echo $argv[1].' + '.$argv[2].' = '.$client->Add([
    'intA' => $argv[1],
    'intB' => $argv[2],
])->AddResult;