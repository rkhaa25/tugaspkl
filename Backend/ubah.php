<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit();
}
include 'function.php';

$id = $_GET["id"];

$uproduk = query("SELECT * FROM tb_produk WHERE id = $id")[0];



if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "
            <script>
            alert('Data Berhasil diubah!');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Gagal Mengubah Data!');
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
    <title>Ubah Data</title>
    <style>
        li {
            list-style: none;
        }
    </style>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <h2>Ubah Data</h2>
        <ul>
            <input type="hidden" name="id" VALUE="<?= $uproduk["id"] ?>">
            <input type="hidden" name="gambarlama" VALUE="<?= $uproduk["gambar"] ?>">
            <li><label for="nama">Nama Barang:</label></li>
            <li><input type="text" name="nama" placeholder="Masukan Nama Barang!"
            value="<?= $uproduk["nama_barang"] ?>"></li><br>

            <li><label for="kode">Kode Barang:</label></li>
            <li><input type="text" name="kode" placeholder="Masukan Kode Barang!"
            value="<?= $uproduk["kd_barang"] ?>"></li><br>

            <li><label for="hargahpp">Harga HPP:</label></li>
            <li><input type="text" name="hargahpp" placeholder="Masukan Harga HPP!"
            value="<?= $uproduk["harga_hpp"] ?>"></li><br>

            <li><label for="hargaretail">Harga Retail:</label></li>
            <li><input type="text" name="hargaretail" placeholder="Masukan Harga Retail!"
            value="<?= $uproduk["harga_retail"] ?>"></li><br>

            <li><label for="hargadistributor">Harga Distributor:</label></li>
            <li><input type="text" name="hargadistributor" placeholder="Masukan Harga Distributor!"
            value="<?= $uproduk["harga_distributor"] ?>"></li><br>

            <li><label for="hargadistributor">Gambar:</label></li><br>
            <img src="img/<?= $uproduk['gambar']?>" width="50px"><br>
            <li><input type="file" name="gambar"></li><br>

            <li><button type="submit" name="submit">Ubah</button>
                <a href="index.php">Cancel</a>
            </li>
        </ul>
    </form>
</body>
</html>