<?php

/*
 * File : service.php
 * Deskripsi : program PHP u/ service pd. web service TANPA WSDL
 */

//definisikan fungsi
function tambahRDBMS($nik, $nama, $alamat) {
	// Include our login information
	require_once('db_login.php');

	// Connect
	$db = new mysqli($db_host, $db_username, $db_password,$db_database);
	if ($db->connect_errno){
		return "Could not connect to the database";
	}

	//escape input data
	$nik = $db->real_escape_string($nik);
	$nama = $db->real_escape_string($nama);
	$alamat = $db->real_escape_string($alamat);
	//Asign a query
	$query = " INSERT INTO karyawan (nik, nama, alamat) VALUES('$nik', '$nama', '$alamat') ";
	// Execute the query
	$result = $db->query( $query );
	if (!$result){
		return "Could not query the database";
	}else{
		return "1 record added.";
	}
}

//init service
$server = new SoapServer(null, array('uri' => "urn://localhost/p11"));
//register fungsi penjumlahan
$server->addFunction("tambahRDBMS");
//proses soap request
$server->handle();

?>