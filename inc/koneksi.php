<?php 
$SERVER ='localhost';
$USERNAME ='root';
$PASS = '';
$DATABASE ='db_kursus';

$KONEKSI = mysqli_connect($SERVER,$USERNAME,$PASS,$DATABASE);
 
 if (mysqli_connect_error()) {
 	echo "Koneksi Error Try Again ".
 	 mysqli_connect_error($KONEKSI);
 }

 ?>