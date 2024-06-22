<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit();
}
include 'function.php';
$id = $_GET["id"];

if(hapus($id)>0){
    echo "
            <script>
            alert('Data Berhasil dihapus!');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Gagal Menghapus Data!');
            document.location.href = 'index.php';
            </script>
        ";
    }

?>