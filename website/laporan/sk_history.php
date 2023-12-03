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
    <title>Stok Keluar</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            include("../header.php");
            ?>
            <div class="container col-9">
                <h1 class="text-center mt-3">HISTORY STOK KELUAR</h1>

                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        Data History Stok Keluar
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#dateModal">
                            SORT DATE
                        </button>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>Tanggal</th>
                                <!-- FOREIGN KEY -->
                                <th>Barcode(id)</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <!-- FOREIGN KEY -->
                                <th>Keterangan</th>
                            </tr>
                            <?php
                            $limit = 10;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $start = ($page - 1) * $limit;

                            $tampil = mysqli_query($conn, "SELECT * FROM stokkeluar ORDER BY id_sk DESC LIMIT $start, $limit");
                            while ($data = mysqli_fetch_array($tampil)) :
                                $produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$data[id_produk]'");
                                $data_produk = mysqli_fetch_assoc($produk);
                                $keterangan = mysqli_query($conn, "SELECT * FROM keterangankeluar WHERE id_kk = '$data[id_keterangan]'");
                                $data_keterangan = mysqli_fetch_assoc($keterangan);
                            ?>
                                <tr>
                                    <td><?= $data['tanggal'] ?></td>
                                    <td><?= $data_produk['id_produk'] ?></td>
                                    <td><?= $data_produk['nama_produk'] ?></td>
                                    <td><?= $data['jumlah'] ?></td>
                                    <td><?= $data_keterangan['nama_kk'] ?></td>
                                </tr>
                            <?php endwhile; ?>

                            <?php
                            $result_count = mysqli_query($conn, "SELECT COUNT(id_sk) AS total FROM stokkeluar");
                            $row = mysqli_fetch_assoc($result_count);
                            $total_records = $row['total'];
                            $total_pages = ceil($total_records / $limit);

                            echo "<ul class='pagination'>";
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item'><a class='page-link' href='sk_history.php?page=$i'>$i</a></li>";
                            }
                            echo "</ul>";
                            ?>
                        </table>
                    </div>
                </div>
                <!-- Awal Modal -->
                <div class="modal fade" id="dateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">PILIH TANGGAL</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="sk_history_date.php">
                                <input type="hidden" name="jenis" value="KELUAR">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Pilih Tanggal</label>
                                        <input type="date" class="form-control" name="ntanggal">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary" name="bsk">Pilih</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal -->
            </div>
        </div>
    </div>
</body>

</html>