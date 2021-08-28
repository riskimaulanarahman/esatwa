<?php

  include 'koneksi.php';

  $sql = "SELECT * FROM lokasi_wisata";
  $stmt = $mysqli->prepare($sql);

  $stmt->execute();
  $result = $stmt->get_result(); 
  if ($result->num_rows > 0) {
  	$data = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
    	$data[$i]['id'] = addslashes(htmlentities($row['id']));
    	$data[$i]['nama_lokasi'] = addslashes(htmlentities($row['nama_lokasi']));
    	$data[$i]['alamat'] = addslashes(htmlentities($row['alamat']));
    	$data[$i]['latitude'] = addslashes(htmlentities($row['latitude']));
		  $data[$i]['longitude'] = addslashes(htmlentities($row['longitude']));
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
