<?php
include("../database.php");
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
    <title>Karyawan</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            include("../header.php");
            ?>
            <div class="container col-9">
                <h1 class="text-center mt-3">Karyawan</h1>
                <!-- KARYAWAN AKTIF -->
                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        Data Karyawan Aktif
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap Karyawan</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            $tampil = mysqli_query($conn, "SELECT * FROM user WHERE status = 1");
                            while ($data = mysqli_fetch_array($tampil)) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nama_lengkap'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#nonModal<?= $no ?>">Non-Aktif</a>
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $no ?>">Hapus</a>
                                    </td>
                                </tr>
                                <!-- Awal Modal EDIT-->
                                <div class="modal fade" id="nonModal<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Non Aktifkan Karyawan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="CRUD_karyawan.php">
                                                <input type="hidden" name="user" value="<?= $data['username'] ?>">
                                                <div class="modal-body">
                                                    <h5 class="text-center">Apakah Anda yakin MENONAKTIFKAN karyawan ini? <br>
                                                        <span class="text-danger"><?= $data['nama_lengkap'] ?></span>
                                                    </h5>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                                    <button type="submit" class="btn btn-primary" name="bnon">NON AKTIF</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal EDIT-->
                                <!-- Awal Modal DELETE-->
                                <div class="modal fade" id="deleteModal<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="CRUD_karyawan.php">
                                                <input type="hidden" name="user" value="<?= $data['username'] ?>">
                                                <div class="modal-body">
                                                    <h5 class="text-center">Apakah Anda yakin MENGHAPUS karyawan ini? <br>
                                                        <span class="text-danger"><?= $data['nama_lengkap'] ?></span>
                                                    </h5>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                                    <button type="submit" class="btn btn-primary" name="bhapus1">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal DELETE-->
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
                <!-- KARYAWAN NON AKTIF -->
                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        Data Karyawan Non Aktif
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap Karyawan</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            $tampil = mysqli_query($conn, "SELECT * FROM user WHERE status = 0");
                            while ($data = mysqli_fetch_array($tampil)) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nama_lengkap'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#aktifModal<?= $no ?>">Aktifkan</a>
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalz<?= $no ?>">Hapus</a>
                                    </td>
                                </tr>
                                <!-- Awal Modal EDIT-->
                                <div class="modal fade" id="aktifModal<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Aktifkan Karyawan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="CRUD_karyawan.php">
                                                <input type="hidden" name="user" value="<?= $data['username'] ?>">
                                                <div class="modal-body">
                                                    <h5 class="text-center">Apakah Anda yakin MENGAKTIFKAN karyawan ini? <br>
                                                        <span class="text-danger"><?= $data['nama_lengkap'] ?></span>
                                                    </h5>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                                    <button type="submit" class="btn btn-primary" name="baktif">AKTIFKAN</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal EDIT-->
                                <!-- Awal Modal DELETE-->
                                <div class="modal fade" id="deleteModalz<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="CRUD_karyawan.php">
                                                <input type="hidden" name="user" value="<?= $data['username'] ?>">
                                                <div class="modal-body">
                                                    <h5 class="text-center">Apakah Anda yakin MENGHAPUS karyawan ini? <br>
                                                        <span class="text-danger"><?= $data['nama_lengkap'] ?></span>
                                                    </h5>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                                    <button type="submit" class="btn btn-primary" name="bhapus1">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal DELETE-->
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>