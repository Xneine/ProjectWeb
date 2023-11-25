<?php
    include("../database.php");

    if(isset($_POST['bsimpan'])){
        $simpan = mysqli_query($conn, "INSERT INTO kategori (nama_kategori) VALUES ('$_POST[nkategori]')");
        if($simpan){
            echo '<script>
                    alert("SIMPAN SUKSES!");
                    document.location="kategori.php";
                </script>';
        }
        else{
            echo '<script>
            alert("SIMPAN DATA GAGAL!");
            document.location="kategori.php";
        </script>';
        }
    }
    if(isset($_POST['bubah'])){
        $ubah = mysqli_query($conn, "UPDATE kategori
                                        SET nama_kategori = ('$_POST[nkategori]')
                                        WHERE id_ktg = ('$_POST[idktg]')");
        if($ubah){
            echo '<script>
                    alert("UPDATE SUKSES!");
                    document.location="kategori.php";
                </script>';
        }
        else{
            echo '<script>
            alert("UPDATE DATA GAGAL!");
            document.location="kategori.php";
        </script>';
        }
    }
    if(isset($_POST['bhapus'])){
        $hapus = mysqli_query($conn, "DELETE FROM kategori
                                    WHERE id_ktg = ('$_POST[idktg]')");
        if($hapus){
            echo '<script>
                    alert("DELETE SUKSES!");
                    document.location="kategori.php";
                </script>';
        }
        else{
            echo '<script>
            alert("DELETE DATA GAGAL!");
            document.location="kategori.php";
        </script>';
        }
    }
?>