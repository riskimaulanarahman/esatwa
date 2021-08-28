<?php

  include 'koneksi.php';

  $sql = "SELECT * FROM satwa";
  $stmt = $mysqli->prepare($sql);

  $stmt->execute();
  $result = $stmt->get_result(); 
  if ($result->num_rows > 0) {
  	$data = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
    	$data[$i]['idSatwa'] = addslashes(htmlentities($row['idSatwa']));
    	$data[$i]['nama'] = addslashes(htmlentities($row['nama']));
    	$data[$i]['spesies'] = addslashes(htmlentities($row['spesies']));
    	$data[$i]['asal'] = addslashes(htmlentities($row['asal']));
		$data[$i]['deskripsi'] = addslashes(htmlentities($row['deskripsi']));
    	$data[$i]['gambar'] = addslashes(htmlentities($row['gambar']));
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
