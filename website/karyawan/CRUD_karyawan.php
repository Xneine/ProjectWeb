<?php
include("../database.php");

if (isset($_POST['bnon'])) {
    try {
        $non = mysqli_query($conn, "UPDATE user
            SET status = 0
            WHERE username = '$_POST[user]';");
        echo '<script>
                        alert("NON AKTIF SUKSES!");
                        document.location="karyawan.php";
                    </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
            alert("NON AKTIF GAGAL!");
            document.location="karyawan.php";
        </script>';
    }
}
if (isset($_POST['bhapus1'])) {
    try {
        $hapus1 = mysqli_query($conn, "DELETE FROM user WHERE username = '$_POST[user]';");
        echo '<script>
            alert("delete SUKSES!");
            document.location="karyawan.php";
        </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
            alert("delete GAGAL!");
            document.location="karyawan.php";
        </script>';
    }
}
if (isset($_POST['baktif'])) {
    try {
        $aktif = mysqli_query($conn, "UPDATE user
            SET status = 1
            WHERE username = '$_POST[user]';");
        echo '<script>
                        alert("AKTIF SUKSES!");
                        document.location="karyawan.php";
                    </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
            alert("AKTIF GAGAL!");
            document.location="karyawan.php";
        </script>';
    }
}
if (isset($_POST['bhapus2'])) {
    try {
        $hapus2 = mysqli_query($conn, "DELETE FROM user WHERE username = '$_POST[user]';");
        echo '<script>
        alert("delete SUKSES!");
        document.location="karyawan.php";
    </script>';
    } catch (mysqli_sql_exception) {
        echo '<script>
            alert("delete GAGAL!");
            document.location="karyawan.php";
        </script>';
    }
}
?>
