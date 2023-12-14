<?php
    include("../database.php");
    if(isset($_POST['bsimpan'])){
        try {
            $tambah = mysqli_query($conn, "UPDATE produk
            SET stok = stok + '$_POST[njumlah]'
            WHERE id_produk = '$_POST[nproduk]'");
            $simpan = mysqli_query($conn, "INSERT INTO stokMasuk (tanggal, id_produk, jumlah, id_keterangan) VALUES (DEFAULT,'$_POST[nproduk]','$_POST[njumlah]','$_POST[nket]')");
            echo '<script>
            alert("SIMPAN SUKSES!");
            document.location="stok_masuk.php";
        </script>';
        } catch (mysqli_sql_exception) {
            echo '<script>
            alert("SIMPAN DATA GAGAL!");
            document.location="stok_masuk.php";
        </script>';
        }
    }
?>