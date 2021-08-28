<?php  
//buka koneksi diawal halaman
//host, username, passw, DBname
$mysqli = new mysqli("localhost", "u349600776_esatwa", "Hostinger123", "u349600776_esatwa");
if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            }


?>