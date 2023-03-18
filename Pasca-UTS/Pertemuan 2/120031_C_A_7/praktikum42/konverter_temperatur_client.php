<?php

/*
 *
 * File : konverter_temperatur_client.php
 * Dekripsi : program client konverter suhu
 */

//init client
$wsdl = "http://localhost/phpws/praktikum42/konverter_temperatur.php?wsdl";
$client = new SoapClient($wsdl);
$celcius = 30;

//panggil fungsi pada service
$c2k = $client->__soapCall("celciusToKelvin", array($celcius));
$c2r = $client->__soapCall("celciusToReamur", array($celcius));

//tampilkan
echo "30 C = " . $c2k . " K <br />";
echo "30 C = " . $c2r . " R <br />";

?> 
