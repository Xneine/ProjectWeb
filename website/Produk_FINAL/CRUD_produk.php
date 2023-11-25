<?php
    include("../database.php");

    if(isset($_POST['bsimpan'])){
        $simpan = mysqli_query($conn, "INSERT INTO produk (id_produk, nama_produk, satuan, kategori, harga, stok) VALUES ('$_POST[nid]','$_POST[nproduk]','$_POST[nsatuan]','$_POST[nkategori]','$_POST[nharga]',DEFAULT)");
        if($simpan){
            echo '<script>
                    alert("SIMPAN SUKSES!");
                    document.location="produk.php";
                </script>';
        }
        else{
            echo '<script>
            alert("SIMPAN DATA GAGAL!");
            document.location="produk.php";
        </script>';
        }
    }
    if(isset($_POST['bubah'])){
        $ubah = mysqli_query($conn, "UPDATE produk
                                        SET nama_produk = ('$_POST[nproduk]'),
                                        satuan = ('$_POST[nsatuan]'),
                                        kategori = ('$_POST[nkategori]'),
                                        harga = ('$_POST[nharga]')
                                        WHERE id_produk = ('$_POST[idpdk]')");
        if($ubah){
            echo '<script>
                    alert("UPDATE SUKSES!");
                    document.location="produk.php";
                </script>';
        }
        else{
            echo '<script>
            alert("UPDATE DATA GAGAL!");
            document.location="produk.php";
        </script>';
        }
    }
    if(isset($_POST['bhapus'])){
        $hapus = mysqli_query($conn, "DELETE FROM produk
                                    WHERE id_produk = ('$_POST[idpdk]')");
        if($hapus){
            echo '<script>
                    alert("DELETE SUKSES!");
                    document.location="produk.php";
                </script>';
        }
        else{
            echo '<script>
            alert("DELETE DATA GAGAL!");
            document.location="produk.php";
        </script>';
        }
    }
?>