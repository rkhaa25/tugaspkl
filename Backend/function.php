<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugaspkl";

$conn = new mysqli($servername, $username, $password, $dbname); 

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    //htmlspecialchars untuk mencegah orang jahil di web kita
    $nama = $data['nama'];
    $kode = $data['kode'];
    $hargahpp = $data['hargahpp'];
    $hargaretail = $data['hargaretail'];
    $hargadistributor = $data['hargadistributor'];
    $gambar = upload();
    if(!$gambar){
        return false;
    }

    $query = "INSERT INTO tb_produk
              VALUES ('','$kode', '$nama', '$hargahpp', '$hargaretail', '$hargadistributor', '$gambar')";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload(){
    $namafile = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    if($error === 4){
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
              return false;
    }
    $ekstensigambarvalid = ['jpg','png','jpeg'];
    $ekstensigambar = explode('.',$namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if(!in_array($ekstensigambar, $ekstensigambarvalid)){
        echo "<script>
                alert('Upload Gambar!');
              </script>";
      return false;
    }
    if($ukuran > 5000000){
        echo "<script>
                alert('Ukuran Gambar Terlalu Besar!');
              </script>";
      return false;
    }

    $filebaru = uniqid();
    $filebaru .= '.';
    $filebaru .= $ekstensigambar;
    move_uploaded_file($tmpname, 'img/'.$filebaru);
    return $filebaru;
}

function hapus($id) {
    global $conn;

    $query = "DELETE FROM tb_produk WHERE id = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function ubah($data){
    global $conn;
    
    $id = $data["id"];
    $nama = $data['nama'];
    $kode = $data['kode'];
    $hargahpp = $data['hargahpp'];
    $hargaretail = $data['hargaretail'];
    $hargadistributor = $data['hargadistributor'];
    $gambarlama = $data['gambarlama'];

    if($_FILES['gambar']['error']===4){
        $gambar = $gambarlama;
    }else{
        $gambar = upload();
    }
    $gambarlama = $data['gambarlama'];

    $query = "UPDATE tb_produk SET
                nama_barang = '$nama',
                kd_barang = '$kode',
                harga_hpp = '$hargahpp',
                harga_retail = '$hargaretail',
                harga_distributor = '$hargadistributor',
                gambar = '$gambar'
                WHERE id = $id
            ";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
?>