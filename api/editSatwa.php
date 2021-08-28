<?php

include 'koneksi.php';

$id = $_GET['id'];
$nama = $_GET['nama']; //id customer
$spesies = $_GET['spesies'];
$asal = $_GET['asal'];
$deskripsi = $_GET['deskripsi'];
$gambar = $_GET['gambar'];

//insert table pengaduan
$sql = "UPDATE satwa SET nama=(?), spesies=(?), asal=(?), deskripsi=(?), gambar=(?) where idSatwa=(?)";
$stmt = $mysqli->prepare($sql);
// echo $url." ".$alasan." ".$lokasi." ".$telp; //for debug
$stmt->bind_param("ssssss", $nama, $spesies, $asal, $deskripsi, $gambar, $id);
$stmt->execute();
if ($stmt->affected_rows > 0)
{
	echo json_encode(array('result' => 'OK', 'data' => "data diubah"));
} else {
	echo json_encode(array('result'=> 'ERROR', 'message' => 'No data found'));
	die();
}

?>