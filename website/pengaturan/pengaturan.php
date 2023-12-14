<?php
include("../database.php");
if (isset($_POST['bganti'])) {
    $ulama = htmlspecialchars($_POST['user']);
    $plama = htmlspecialchars($_POST['password']);
    $ubaru = htmlspecialchars($_POST['userganti']);
    $pbaru = htmlspecialchars($_POST['passwordganti']);
    $cari = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$ulama'");
    if (mysqli_num_rows($cari) > 0) {
        $row = mysqli_fetch_assoc($cari);
        if (password_verify($plama, $row['password'])) {
            $hash = password_hash($pbaru, PASSWORD_DEFAULT);
            try {
                $update = mysqli_query($conn, "UPDATE admin SET username = '$ubaru',password = '$hash' WHERE username = '$ulama'");
                echo '<script>
                    alert("SIMPAN DATA BERHASIL!");
                        </script>';
                $_SESSION['user'] = $ubaru;
            } catch (mysqli_sql_exception) {
                echo '<script>
                    alert("SIMPAN DATA GAGAL!");
                        </script>';
            }
        } else {
            echo '<script>
                alert("PASSWORD SALAH!");
                    </script>';
        }
    } else {
        echo '<script>
            alert("USER TIDAK DITEMUKAN!");
                </script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="produkStyle.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </script>
    <title>Pengaturan</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            include("../header.php");
            ?>
            <div class="container col-9">
                <h1 class="text-center mt-3">PENGATURAN</h1>

                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        Pengaturan Admin
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Username Baru</label>
                                        <input type="text" class="form-control" name="userganti">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password Baru</label>
                                        <input type="password" class="form-control" name="passwordganti">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Username Lama</label>
                                        <input type="text" class="form-control" name="user">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password Lama</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary m-3" name="bganti">Ganti</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>