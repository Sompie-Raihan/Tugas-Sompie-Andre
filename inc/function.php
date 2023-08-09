
<?php 
function SALDO($ID) {
    include "koneksi.php";

    $SQL1 = "SELECT SUM(nominal) AS TOTAL_1 FROM tbl_transaksi WHERE id_nasabah='$ID' AND jenis_transaksi= 1 AND status_transaksi= 1 OR status_transaksi=2 ";
    $SQL2 = "SELECT COUNT(nominal) AS TOTAL_2 FROM tbl_transaksi WHERE id_nasabah='$ID' AND jenis_transaksi= 2 AND status_transaksi= 1 OR status_transaksi=2 ";
    $SQL3 = "SELECT SUM(nominal) AS TOTAL_3 FROM tbl_transaksi WHERE id_nasabah='$ID' AND jenis_transaksi= 2 AND status_transaksi= 1 OR status_transaksi=2";


    $QUERY1 = mysqli_query($KONEKSI, $SQL1) or die(mysqli_connect_error($QUERY1));
    $QUERY2 = mysqli_query($KONEKSI, $SQL2) or die(mysqli_connect_error($QUERY2));
    $QUERY3 = mysqli_query($KONEKSI, $SQL3) or die(mysqli_connect_error($QUERY2));

    $HASIL1 = mysqli_fetch_assoc($QUERY1);
    $HASIL2 = mysqli_fetch_assoc($QUERY2);
    $HASIL3 = mysqli_fetch_assoc($QUERY3);


    if($HASIL2["TOTAL_2"] == 0){
        $NOMINAL = $HASIL1["TOTAL_1"];
    } else {
        $NOMINAL = $HASIL1["TOTAL_1"] - $HASIL3["TOTAL_3"];
    }


    return $NOMINAL;

}


?>

<?php
function AutoNumber($tabel, $kolom, $lebar = 0, $awalan = '') {
    include "koneksi.php";

    $query = "SELECT $kolom FROM $tabel WHERE $kolom LIKE '$awalan%' ORDER BY $kolom DESC LIMIT 1";
    $auto = mysqli_query($KONEKSI, $query) or die(mysqli_connect_error($auto));

    $num_rows = mysqli_num_rows($auto);
    if ($num_rows == 0) {
        $number = 1;
    } else {
        $row = mysqli_fetch_array($auto);
        $number = intval(substr($row[0], strlen($awalan))) + 1;
    }

    if ($lebar > 0) {
        $angka = $awalan.str_pad($number, $lebar, "0", STR_PAD_LEFT);
    } else {
        $angka = $awalan.$number;
    }

    return $angka;
};?>

<?php
function AutoNumber2($tabel, $kolom, $lebar = 0, $awalan = '', $awalan_nomor = '') {
    include "koneksi.php";

    $query = "SELECT $kolom FROM $tabel WHERE $kolom LIKE '$awalan%' ORDER BY $kolom DESC LIMIT 1";
    $auto = mysqli_query($KONEKSI, $query) or die(mysqli_connect_error($auto));

    $num_rows = mysqli_num_rows($auto);
    if ($num_rows == 0) {
        $number = 1;
    } else {
        $row = mysqli_fetch_array($auto);
        $number = intval(substr($row[0], strlen($awalan))) + 1;
    }

    if ($lebar > 0) {
        $angka = $awalan_nomor.str_pad($number, $lebar, "0", STR_PAD_LEFT);
    } else {
        $angka = $awalan_nomor.$number;
    }

    return $angka;
};
?>

<?php
function rp($ANGKA) {
	$hasil_rp = "Rp. ". number_format($ANGKA, 2, ',','.');
	return $hasil_rp;
}
?>

<?php 
function user() {
	include "koneksi.php";
	$USER =  @$_SESSION['username'];
	$QUERY = mysqli_query($KONEKSI, "SELECT * FROM tbl_user WHERE username='$USER'");

	$RISZ = mysqli_fetch_array($QUERY);
	$PENGGUNA = $RISZ['nama_user'];
	return $PENGGUNA;
}
?>

