<?php
    include("../database.php");
    $non = mysqli_query($conn, "SELECT status FROM user WHERE username = '$_SESSION[user]';");
    $error = mysqli_fetch_assoc($non);
    if ($error['status'] == 0) {
        echo '<script>
            alert("ANDA BELUM DITERIMA ATAU SUDAH DINONAKTIFKAN!");
            </script>';
        session_destroy();
        echo '<script>window.location.href="../index.php";</script>';
        exit();
    }
?>