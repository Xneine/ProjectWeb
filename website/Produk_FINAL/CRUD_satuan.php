<?php
    include("../database.php");

    if(isset($_POST['bsimpan'])){
        $simpan = mysqli_query($conn, "INSERT INTO satuan (nama_satuan) VALUES ('$_POST[nsatuan]')");
        if($simpan){
            echo '<script>
                    alert("SIMPAN SUKSES!");
                    document.location="satuan.php";
                </script>';
        }
        else{
            echo '<script>
            alert("SIMPAN DATA GAGAL!");
            document.location="satuan.php";
        </script>';
        }
    }
    if(isset($_POST['bubah'])){
        $ubah = mysqli_query($conn, "UPDATE satuan
                                        SET nama_satuan = ('$_POST[nsatuan]')
                                        WHERE id_satuan = ('$_POST[idstn]')");
        if($ubah){
            echo '<script>
                    alert("UPDATE SUKSES!");
                    document.location="satuan.php";
                </script>';
        }
        else{
            echo '<script>
            alert("UPDATE DATA GAGAL!");
            document.location="satuan.php";
        </script>';
        }
    }
    if(isset($_POST['bhapus'])){
        $hapus = mysqli_query($conn, "DELETE FROM satuan
                                    WHERE id_satuan = ('$_POST[idstn]')");
        if($hapus){
            echo '<script>
                    alert("DELETE SUKSES!");
                    document.location="satuan.php";
                </script>';
        }
        else{
            echo '<script>
            alert("DELETE DATA GAGAL!");
            document.location="satuan.php";
        </script>';
        }
    }
?>