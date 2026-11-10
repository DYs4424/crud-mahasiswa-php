<?php

include 'koneksi.php';

$id = $_GET['id'];

if (!isset($id)) {

    header("Location: index.php");

    exit();

}

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");

$data  = mysqli_fetch_assoc($query);

if (!$data) {

    header("Location: index.php");

    exit();

}

if (isset($_POST['update'])) {

    $nim     = mysqli_real_escape_string($koneksi, $_POST['nim']);

    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);

    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);

    $email   = mysqli_real_escape_string($koneksi, $_POST['email']);

    $update = mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan', email='$email' WHERE id='$id'");

    if ($update) {

        header("Location: index.php");

        exit();

    } else {

        $error = "Gagal memperbarui data: " . mysqli_error($koneksi);

    }

}

?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Edit Mahasiswa</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <h2>Edit Data Mahasiswa</h2>

        <?php if (isset($error)) echo "<p style='color: #ef4444;'>$error</p>"; ?>

        <form action="" method="POST">

            <div class="form-group">

                <label>NIM</label>

                <input type="text" name="nim" value="<?php echo htmlspecialchars($data['nim']); ?>" required>

            </div>

            <div class="form-group">

                <label>Nama Lengkap</label>

                <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required>

            </div>

            <div class="form-group">

                <label>Jurusan</label>

                <input type="text" name="jurusan" value="<?php echo htmlspecialchars($data['jurusan']); ?>" required>

            </div>

            <div class="form-group">

                <label>Email</label>

                <input type="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>

            </div>

            <button type="submit" name="update">Perbarui Data</button>

            <a href="index.php" class="btn" style="background-color: #4b5563; text-align: center;">Batal</a>

        </form>

    </div>

</body>

</html>

