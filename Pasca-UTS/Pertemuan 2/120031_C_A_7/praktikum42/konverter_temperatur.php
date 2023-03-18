<?php

/**
 * File : konverter_temperatur.php
 * Deskripsi : program service konverter suhu
 */

//init fungsi mengubah Celcius ke Kelvin
function celciusToKelvin($celcius){
	return $celcius + 273.15;
}

//init fungsi mengubah Celcius ke Reamur
function celciusToReamur($celcius){
	return (9 / 5) * $celcius + 32;
}

//init service
$server = new SoapServer("temcon.wsdl");

//register fungsi
$server->addFunction(array("celciusToKelvin", "celciusToReamur"));

//process soap request
$server->handle();

?>