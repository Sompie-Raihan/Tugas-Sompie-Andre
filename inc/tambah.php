<?php
include 'function.php';
include 'koneksi.php';
ob_start();

$ID = AutoNumber('tbl_user_kursus', 'id_user', 3 ,'PGN');
$NAMA = mysqli_real_escape_string($KONEKSI,$_POST['nama_user']);
$USERNAME = mysqli_real_escape_string($KONEKSI,$_POST['username']);
$PASSWORD = mysqli_real_escape_string($KONEKSI,$_POST['password']);

// echo $ID;
// echo $NAMA;
// echo $USERNAME;
// echo $PASSWORD;
// echo $USERLEVEL;


if ($ID == "" || $NAMA == "" || $USERNAME == "" || $PASSWORD == "") {
    echo "Gagal";
    } else {
            mysqli_query($KONEKSI,"INSERT INTO tbl_user_kursus SET
            id_user  = '$ID',
            nama_user = '$NAMA',
            username = '$USERNAME',
            password = '$PASSWORD',
            gambar = ''") or die (mysqli_error($KONEKSI));

            @session_start();

            $QUERY = mysqli_query($KONEKSI,"SELECT * FROM tbl_user_kursus WHERE username = '$USERNAME' AND password = '$PASSWORD' ");

            $HASIL = mysqli_num_rows($QUERY);
            $DATA = mysqli_fetch_array($QUERY);

            $_SESSION['username'] = $DATA['username'];
            $_SESSION['nama'] = $DATA['nama_user'];
            $_SESSION['gambar'] = $DATA['gambar'];



            if($HASIL == 1) {    

                echo "Login berhasil";
                header('location:../index.php');
            } else {
                echo "Login Gagal";

            }
                }
?>
<!-- <meta http-equiv="refresh" content="3; url=../index.php?=Staff"> -->