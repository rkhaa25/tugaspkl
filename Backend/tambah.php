<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit();
}
include 'function.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
            alert('Data Berhasil ditambahkan!');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Gagal Menambah Data!');
            document.location.href = 'index.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <style>
        li {
            list-style: none;
        }
    </style>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <h2>Tambah Data</h2>
        <ul>
            <li><label for="nama">Nama Barang:</label></li>
            <li><input type="text" name="nama" placeholder="Masukan Nama Barang!"></li><br>

            <li><label for="kode">Kode Barang:</label></li>
            <li><input type="text" name="kode" placeholder="Masukan Kode Barang!"></li><br>

            <li><label for="hargahpp">Harga HPP:</label></li>
            <li><input type="text" name="hargahpp" placeholder="Masukan Harga HPP!"></li><br>

            <li><label for="hargaretail">Harga Retail:</label></li>
            <li><input type="text" name="hargaretail" placeholder="Masukan Harga Retail!"></li><br>

            <li><label for="hargadistributor">Harga Distributor:</label></li>
            <li><input type="text" name="hargadistributor" placeholder="Masukan Harga Distributor!"></li><br>

            <li><label for="hargadistributor">Gambar:</label></li>
            <li><input type="file" name="gambar"></li><br>

            <li><button type="submit" name="submit">Konfirmasi</button>
                <a href="index.php">Cancel</a>
            </li>
        </ul>
    </form>
</body>
</html>