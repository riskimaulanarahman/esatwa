<?php

  include 'koneksi.php';

  $sql = "SELECT * FROM pengaduan_satwa";
  $stmt = $mysqli->prepare($sql);

  $stmt->execute();
  $result = $stmt->get_result(); 
  if ($result->num_rows > 0) {
  	$data = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
    	$data[$i]['id'] = addslashes(htmlentities($row['id']));
    	$data[$i]['gambar'] = addslashes(htmlentities($row['gambar']));
    	$data[$i]['alasan'] = addslashes(htmlentities($row['alasan']));
    	$data[$i]['lokasi_satwa'] = addslashes(htmlentities($row['lokasi_satwa']));
		  $data[$i]['telepon'] = addslashes(htmlentities($row['telepon']));
      $data[$i]['tanggal'] = addslashes(htmlentities($row['tanggal']));
    	$i++;
    }
    echo json_encode(array ('result' => 'OK', 'data' => $data));

  } else {
  echo "Unable to process you request, please try again";
  die();
  }


  $stmt->close();
  $mysqli->close();
?>
