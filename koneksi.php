<?php

$host     = "sql111.infinityfree.com";

$user     = "if0_43399755";

$password = "ISI_PASSWORD_DISINI";

$database = "if0_43399755_data_mahasiswa1";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {

    die("Koneksi ke database gagal: " . mysqli_connect_error());

}

?>
