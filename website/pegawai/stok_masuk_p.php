<?php

include('header_p.php');
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
    <title>Stok Masuk Pegawai</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="container">
                <h1 class="text-center mt-3">STOK MASUK</h1>
                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        Data Stok Masuk Hari Ini
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <!-- FOREIGN KEY -->
                                <th>Barcode(id)</th> 
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <!-- FOREIGN KEY -->
                                <th>Keterangan</th>
                            </tr>
                            <?php
                                $no = 1;
                                $tampil = mysqli_query($conn, "SELECT * FROM stokmasuk WHERE EXTRACT(YEAR FROM tanggal) = EXTRACT(YEAR FROM current_timestamp) AND EXTRACT(MONTH FROM tanggal) = EXTRACT(MONTH FROM current_timestamp) AND EXTRACT(DAY FROM tanggal) = EXTRACT(DAY FROM current_timestamp) ORDER BY id_sm DESC");
                                while($data = mysqli_fetch_array($tampil)):
                                    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$data[id_produk]'");
                                    $data_produk = mysqli_fetch_assoc($produk);
                                    $keterangan = mysqli_query($conn, "SELECT * FROM keteranganmasuk WHERE id_km = '$data[id_keterangan]'");
                                    $data_keterangan = mysqli_fetch_assoc($keterangan);
                            ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $data['tanggal']?></td>
                                <td><?= $data_produk['id_produk']?></td>
                                <td><?= $data_produk['nama_produk']?></td>
                                <td><?= $data['jumlah']?></td>
                                <td><?= $data_keterangan['nama_km']?></td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
