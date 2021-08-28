<?php

include 'koneksi.php';

$id = $_GET['id'];


//insert table pengaduan
$sql = "DELETE from satwa where idSatwa=(?)";
$stmt = $mysqli->prepare($sql);
// echo $url." ".$alasan." ".$lokasi." ".$telp; //for debug
$stmt->bind_param("s", $id);
$stmt->execute();
if ($stmt->affected_rows > 0)
{
	echo json_encode(array('result' => 'OK', 'data' => "data satwa dihapus"));
} else {
	echo json_encode(array('result'=> 'ERROR', 'message' => 'No data found'));
	die();
}

?>