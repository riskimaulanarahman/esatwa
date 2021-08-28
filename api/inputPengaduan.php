<?php

include 'koneksi.php';

$url = $_GET['url']; //id customer
$alasan = $_GET['alasan'];
$lokasi = $_GET['lokasi'];
$telp = $_GET['telp'];

//insert table pengaduan
$sql = "INSERT INTO pengaduan_satwa (gambar, alasan, lokasi_satwa, telepon) values(?,?,?,?)";
$stmt = $mysqli->prepare($sql);
// echo $url." ".$alasan." ".$lokasi." ".$telp; //for debug
$stmt->bind_param("ssss", $url, $alasan, $lokasi, $telp);
$stmt->execute();
if ($stmt->affected_rows > 0)
{
	echo json_encode(array('result' => 'OK', 'data' => "data masuk"));
} else {
	echo json_encode(array('result'=> 'ERROR', 'message' => 'No data found'));
	die();
}

?>