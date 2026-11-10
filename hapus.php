<?php

include 'koneksi.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $delete = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");

    if ($delete) {

        header("Location: index.php");

        exit();

    } else {

        echo "Gagal menghapus data: " . mysqli_error($koneksi);

    }

} else {

    header("Location: index.php");

    exit();

}

?>

