<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_motorkita");
// cek koneksi
if (!$koneksi) {
	die("Error koneksi: " . mysqli_connect_errno());
}
