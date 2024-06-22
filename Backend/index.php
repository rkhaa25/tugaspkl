<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit();
}
include 'function.php';

// Periksa apakah pengguna sudah login


$tb_produk = query("SELECT * FROM tb_produk");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="tambah.php" class="btn btn-primary mb-2">
    <b>Tambah</b>
    <i class="fa fa-plus"></i>
</a>
<table border=3>
    <thead>
        <tr align="center">
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga HPP</th>
            <th>Harga Retail</th>
            <th>Harga Distributor</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($tb_produk as $result):
        ?>
        <tr>
            <td><?php echo $i; ?>.</td>
            <td><?php echo $result['kd_barang']; ?></td>
            <td><?php echo $result['nama_barang']; ?></td>
            <td><?php echo $result['harga_hpp']; ?></td>
            <td><?php echo $result['harga_retail']; ?></td>
            <td><?php echo $result['harga_distributor']; ?></td>
            <td><img src="img/<?php echo $result['gambar']; ?>" width="100"></td>
            <td>
                <a href="ubah.php?id=<?php echo $result['id']; ?>" type="button">Edit</a>
                <a href="hapus.php?id=<?php echo $result['id']; ?>" type="button" 
                    onClick="return confirm('Anda yakin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php
        $i++;
        endforeach;
        ?>
    </tbody>
</table>
</body>
</html>