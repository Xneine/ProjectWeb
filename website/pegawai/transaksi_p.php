<?php
include('header_p.php');
include("../database.php");
$total = 0;
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
    <title>Transaksi Pegawai</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="container">
                <h1 class="text-center m-3">TRANSAKSI</h1>
                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        Data Transaksi
                    </div>
                    <div class="card-body">
                        <!-- FORM selesai -->
                        <form method="POST" action="CRUD_transaksi_p.php" class="col-4 mb-3">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Pilih Barcode</label>
                                    <select class="form-select" name="nproduk" id="fpro" required>
                                        <option value="<?= null ?>"></option>
                                        <?php
                                        $propro = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
                                        $jumlah;
                                        while ($hehe = mysqli_fetch_array($propro)) :
                                            $keranjang = mysqli_query($conn, "SELECT * FROM temp_trans WHERE id_produk = '$hehe[id_produk]'");
                                            if ($keranjang) {
                                                $row = mysqli_fetch_assoc($keranjang);
                                                $jumlah = $row['jumlah'];
                                            } else {
                                                $jumlah = 0;
                                            }
                                        ?>
                                            <option value="<?= $hehe['id_produk'] ?>" data-stok="<?= $hehe['stok'] - $jumlah ?>">
                                                <?php
                                                echo "$hehe[id_produk] - $hehe[nama_produk]";
                                                ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" name="njumlah" min="1" step="1" id="maxStok" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary m-3" name="btambah">Tambah</button>
                                <button type="button" class="btn btn-success m-3" data-bs-toggle="modal" data-bs-target="#addModal">Bayar</button>
                            </div>
                        </form>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>No</th>
                                <th>Barcode(id)</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>total</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            $tampil = mysqli_query($conn, "SELECT * FROM temp_trans ORDER BY id_temp DESC");
                            while ($data = mysqli_fetch_array($tampil)) :
                                $produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$data[id_produk]'");
                                $data_produk = mysqli_fetch_assoc($produk);
                                $total = $total + $data_produk['harga'] * $data['jumlah'];
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data_produk['id_produk'] ?></td>
                                    <td><?= $data_produk['nama_produk'] ?></td>
                                    <td><?= $data_produk['harga'] ?></td>
                                    <td><?= $data['jumlah'] ?></td>
                                    <td><?= $data['jumlah'] * $data_produk['harga'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?= $no ?>">Edit</a>
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $no ?>">Hapus</a>
                                    </td>
                                </tr>
                                <!-- Awal Modal DELETE-->
                                <div class="modal fade" id="deleteModal<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Keranjang</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="CRUD_transaksi_p.php">
                                                <input type="hidden" name="idtemp" value="<?= $data['id_temp'] ?>">
                                                <div class="modal-body">
                                                    <h5 class="text-center">Apakah Anda yakin menghapus data ini dari Keranjang?<br>
                                                        <span class="text-danger"><?= $data['id_produk'] . "-" . $data_produk['nama_produk'] ?></span>
                                                    </h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                                    <button type="submit" class="btn btn-primary" name="bhapus">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal DELETE-->
                                <!-- Awal Modal EDIT-->
                                <div class="modal fade" id="editModal<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit jumlah <?= $data_produk['nama_produk'] ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="CRUD_transaksi_p.php">
                                                <input type="hidden" name="idtemp" value="<?= $data['id_temp'] ?>">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Jumlah</label>
                                                        <input type="number" class="form-control" placeholder="<?= $data['jumlah'] ?>" name="njumlahh" min="1" max="<?= $data_produk['stok'] ?>" step="1" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                                    <button type="submit" class="btn btn-primary" name="bedit">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal EDIT-->
                            <?php endwhile; ?>
                        </table>
                        <!-- SHOW TOTAL -->
                        <div class="row">
                            <div class="col-9 text-end">
                                <h1>
                                    TOTAL:
                                </h1>
                            </div>
                            <div class="col-3">
                                <h1 class="text-danger">
                                    <?= $total ?>
                                </h1>
                            </div>
                        </div>
                        <!-- Awal Modal -->
                        <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">PEMBAYARAN</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="CRUD_transaksi_p.php">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Qris" required>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Qris
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Transfer" required>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Transfer
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="Tunai" required>
                                                    <label class="form-check-label" for="flexRadioDefault3">
                                                        Tunai
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-3" id="capek">
                                                <label class="form-label">Jumlah Uang</label>
                                                <input type="number" class="form-control" name="nbayar" id="bayar" min="<?= $total ?>">
                                            </div>
                                            <div class="mb-3" id="capekk">
                                                <div id="kembalian" class="form-label">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                            <button type="submit" class="btn btn-primary" name="bbayar">Bayar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#capek").hide();
            $("#flexRadioDefault3").click(function() {
                $("#bayar").val(0);
                // $("#kembalian").text($total);
                $("#capek").show();
                $("#capekk").show();
            });
            $("#flexRadioDefault1").click(function() {
                $("#bayar").val(<?=$total?>);
                $("#capek").hide();
                $("#capekk").hide();
            });
            $("#flexRadioDefault2").click(function() {
                $("#bayar").val(<?=$total?>);
                $("#capek").hide();
                $("#capekk").hide();
            });
        });
    </script>
    <script>
        document.getElementById('bayar').addEventListener('input', function() {
            var kembalian = document.getElementById('bayar').value - <?= $total ?>;
            document.getElementById('kembalian').textContent = 'kembalian : ' + kembalian;
        });
        document.getElementById('bayar').addEventListener('change', function() {
            var kembalian = document.getElementById('bayar').value - <?= $total ?>;
            document.getElementById('kembalian').textContent = 'kembalian : ' + kembalian;
        });
        document.getElementById('fpro').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var maxStok = selectedOption.getAttribute('data-stok');
            document.getElementById('maxStok').setAttribute('max', maxStok);
        });
    </script>
</body>

</html>