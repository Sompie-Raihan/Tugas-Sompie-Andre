<?php 
echo "<div class='"."d-none'".">";
@session_start();
include 'koneksi.php';
$USER = addslashes($_POST['username']);
$PASS = addslashes($_POST['password']);

$QUERY = mysqli_query($KONEKSI,"SELECT * FROM tbl_user_kursus WHERE username = '$USER' AND password = '$PASS' ");

$HASIL = mysqli_num_rows($QUERY);
$DATA = mysqli_fetch_array($QUERY);

$_SESSION['id'] = $DATA['id_user'];
$_SESSION['username'] = $DATA['username'];
$_SESSION['nama'] = $DATA['nama_user'];
$_SESSION['gambar'] = $DATA['gambar'];

echo "</div>";


if($HASIL == 1) {    

    echo "Login berhasil";
    header('location:../index.php');
} else {
    echo "<p>Login Gagal <strong>Password</strong> atau <strong>Username</strong> salah</p>";

}

?>