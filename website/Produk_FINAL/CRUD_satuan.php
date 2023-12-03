<?php
include("../database.php");

if (isset($_POST['bsimpan'])) {
    try {
        $simpan = mysqli_query($conn, "INSERT INTO satuan (nama_satuan) VALUES ('$_POST[nsatuan]')");
        echo '<script>
            alert("SIMPAN SUKSES!");
            document.location="satuan.php";
        </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
            alert("SIMPAN DATA GAGAL!");
            document.location="satuan.php";
        </script>';
    }
}
if (isset($_POST['bubah'])) {
    try {
        $ubah = mysqli_query($conn, "UPDATE satuan
            SET nama_satuan = ('$_POST[nsatuan]')
            WHERE id_satuan = ('$_POST[idstn]')");
        echo '<script>
                        alert("UPDATE SUKSES!");
                        document.location="satuan.php";
                    </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
            alert("UPDATE DATA GAGAL!");
            document.location="satuan.php";
        </script>';
    }
}
if (isset($_POST['bhapus'])) {
    try {
        $hapus = mysqli_query($conn, "DELETE FROM satuan
            WHERE id_satuan = ('$_POST[idstn]')");
        echo '<script>
                        alert("DELETE SUKSES!");
                        document.location="satuan.php";
                    </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
            alert("DELETE DATA GAGAL!");
            document.location="satuan.php";
        </script>';
    }
}
