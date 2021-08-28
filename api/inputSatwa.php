<?php

include 'koneksi.php';

$nama = $_GET['nama']; //id customer
$spesies = $_GET['spesies'];
$asal = $_GET['asal'];
$deskripsi = $_GET['deskripsi'];
$gambar = $_GET['gambar'];

//insert table pengaduan
$sql = "INSERT INTO satwa (nama, spesies, asal, deskripsi, gambar) values(?,?,?,?,?)";
$stmt = $mysqli->prepare($sql);
// echo $url." ".$alasan." ".$lokasi." ".$telp; //for debug
$stmt->bind_param("sssss", $nama, $spesies, $asal, $deskripsi, $gambar);
$stmt->execute();
if ($stmt->affected_rows > 0)
{
	echo json_encode(array('result' => 'OK', 'data' => "data masuk"));
} else {
	echo json_encode(array('result'=> 'ERROR', 'message' => 'No data found'));
	die();
}

?>