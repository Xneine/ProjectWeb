<?php
    include("../database.php");

    if(isset($_POST['bsimpan'])){
        $tambah = mysqli_query($conn, "UPDATE produk
                                        SET stok = stok - '$_POST[njumlah]'
                                        WHERE id_produk = '$_POST[nproduk]'");
        if($tambah){
            $simpan = mysqli_query($conn, "INSERT INTO stokKeluar (tanggal, id_produk, jumlah, id_keterangan) VALUES (DEFAULT,'$_POST[nproduk]','$_POST[njumlah]','$_POST[nket]')");
            if($simpan){
                echo '<script>
                alert("SIMPAN SUKSES!");
                document.location="stok_keluar.php";
            </script>';
            }
            else{
                echo '<script>
                alert("SIMPAN DATA GAGAL!");
                document.location="stok_keluar.php";
            </script>';
            }
        }
        else{
            echo '<script>
            alert("ADA YANG SALAH DENGAN PRODUK!");
            document.location="stok_keluar.php";
        </script>';
        }
    }
?>
<!-- STOP -->