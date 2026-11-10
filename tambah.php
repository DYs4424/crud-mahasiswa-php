<?php

include 'koneksi.php';

if (isset($_POST['submit'])) {

    $nim     = mysqli_real_escape_string($koneksi, $_POST['nim']);

    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);

    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);

    $email   = mysqli_real_escape_string($koneksi, $_POST['email']);

    $insert = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, jurusan, email) VALUES ('$nim', '$nama', '$jurusan', '$email')");

    if ($insert) {

        header("Location: index.php");

        exit();

    } else {

        $error = "Gagal menambahkan data: " . mysqli_error($koneksi);

    }

}

?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Tambah Mahasiswa</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <h2>Tambah Data Mahasiswa</h2>

        <?php if (isset($error)) echo "<p style='color: #ef4444;'>$error</p>"; ?>

        <form action="" method="POST">

            <div class="form-group">

                <label>NIM</label>

                <input type="text" name="nim" required placeholder="Masukkan NIM">

            </div>

            <div class="form-group">

                <label>Nama Lengkap</label>

                <input type="text" name="nama" required placeholder="Masukkan Nama Lengkap">

            </div>

            <div class="form-group">

                <label>Jurusan</label>

                <input type="text" name="jurusan" required placeholder="Masukkan Jurusan">

            </div>

            <div class="form-group">

                <label>Email</label>

                <input type="email" name="email" required placeholder="Masukkan Alamat Email">

            </div>

            <button type="submit" name="submit">Simpan Data</button>

            <a href="index.php" class="btn" style="background-color: #4b5563; text-align: center;">Batal</a>

        </form>

    </div>

</body>

</html>

