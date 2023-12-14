<?php
include("../database.php");

if (isset($_POST['bsimpan'])) {
    try {
        $simpan = mysqli_query($conn, "INSERT INTO kategori (nama_kategori) VALUES ('$_POST[nkategori]')");
        echo '<script>
            alert("SIMPAN SUKSES!");
            document.location="kategori.php";
        </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
            alert("SIMPAN DATA GAGAL!");
            document.location="kategori.php";
        </script>';
    }
}
if (isset($_POST['bubah'])) {
    try {
        $ubah = mysqli_query($conn, "UPDATE kategori
            SET nama_kategori = ('$_POST[nkategori]')
            WHERE id_ktg = ('$_POST[idktg]')");
        echo '<script>
                        alert("UPDATE SUKSES!");
                        document.location="kategori.php";
                    </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
            alert("UPDATE DATA GAGAL!");
            document.location="kategori.php";
        </script>';
    }
}
if (isset($_POST['bhapus'])) {
    try {
        $hapus = mysqli_query($conn, "DELETE FROM kategori
        WHERE id_ktg = ('$_POST[idktg]')");
        echo '<script>
                alert("DELETE SUKSES!");
                document.location="kategori.php";
            </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
        alert("DELETE DATA GAGAL!");
        document.location="kategori.php";
    </script>';
    }
}
