<?php

include 'koneksi.php';

?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Data Mahasiswa - CRUD PHP</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <h2>Daftar Mahasiswa</h2>

        <a href="tambah.php" class="btn">+ Tambah Mahasiswa Baru</a>

        

        <table>

            <thead>

                <tr>

                    <th>No</th>

                    <th>NIM</th>

                    <th>Nama</th>

                    <th>Jurusan</th>

                    <th>Email</th>

                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                <?php

                $no = 1;

                $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC");

                if (mysqli_num_rows($query) > 0) {

                    while ($data = mysqli_fetch_assoc($query)) {

                ?>

                <tr>

                    <td><?php echo $no++; ?></td>

                    <td><?php echo htmlspecialchars($data['nim']); ?></td>

                    <td><?php echo htmlspecialchars($data['nama']); ?></td>

                    <td><?php echo htmlspecialchars($data['jurusan']); ?></td>

                    <td><?php echo htmlspecialchars($data['email']); ?></td>

                    <td>

                        <a href="edit.php?id=<?php echo $data['id']; ?>" class="action-btn edit-btn">Edit</a>

                        <a href="hapus.php?id=<?php echo $data['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>

                    </td>

                </tr>

                <?php 

                    }

                } else {

                    echo "<tr><td colspan='6' style='text-align:center;'>Belum ada data.</td></tr>";

                }

                ?>

            </tbody>

        </table>

    </div>

</body>

</html>
