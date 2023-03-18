<?php

/*
 * File : client.php
 * Deskripsi : program PHP u/ web service client
 */

//init client
$client = new SoapClient(null, array('location' => "http://localhost/phpws/praktikum41/service.php", 'uri' => "urn://localhost/p11"));
//panggil fungsi pada service
$return = $client->__soapCall("tambah",array(3,2));
//tampilkan
echo "Hasil penjumlahan web service 3+2 = ".$return;

?>