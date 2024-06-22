<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a =($_POST["awal"]);
        function count_odd_numbers($a) {
            $count = 0;
            for ($i = 1; $i <= $a; $i++) {
                if ($i % 2 != 0) {
                    $count++;
                }
            }
            return $count;
        }
        
        $Hasil = count_odd_numbers($a);
        
        echo "<h2>Hasil Perhitungan Bilangan Ganjil</h2>";
        echo "<p>Jumlah bilangan ganjil dari 1 Sampai $a adalah: $Hasil</p>";
    }
   
    ?> 
    <a href="basic1.php">kembali</a>