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
    <title>Produk</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
          <?php
          include("../header.php");
          ?>
            <div class="container col-9">
                <h1 class="text-center mt-3">DETAIL PRODUK</h1>

                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        Data Produk
                    </div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                            Add
                        </button>

                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>No</th>
                                <th>Barcode(id)</th>
                                <th>Nama Produk</th>
                                <th>Satuan</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                                $no = 1;
                                $tampil = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
                                while($data = mysqli_fetch_array($tampil)):
                                    $satuan = mysqli_query($conn, "SELECT * FROM satuan WHERE id_satuan = $data[satuan]");
                                    $data_satuan = mysqli_fetch_assoc($satuan);
                                    $kategori = mysqli_query($conn, "SELECT * FROM kategori WHERE id_ktg = $data[kategori]");
                                    $data_kategori = mysqli_fetch_assoc($kategori);
                            ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $data['id_produk']?></td>
                                <td><?= $data['nama_produk']?></td>
                                <td><?= $data_satuan['nama_satuan']?></td>
                                <td><?= $data_kategori['Nama_Kategori']?></td>
                                <td><?= $data['stok']?></td>
                                <td><?= $data['harga']?></td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $no?>">Ubah</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $no?>">Hapus</a>
                                </td>
                            </tr>
                            <!-- Awal Modal EDIT-->
                            <div class="modal fade" id="editModal<?= $no?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Produk</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="CRUD_produk.php">
                                        <input type="hidden" name="idpdk" value="<?= $data['id_produk']?>">
                                        <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Produk</label>
                                                    <input type="text" class="form-control" value="<?= $data['nama_produk']?>" name="nproduk">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Pilih Satuan</label>
                                                    <select class="form-select" name="nsatuan">
                                                        <option></option>
                                                        <?php 
                                                            $satusatu = mysqli_query($conn, "SELECT * FROM satuan ORDER BY id_satuan DESC");
                                                            while($hehe = mysqli_fetch_array($satusatu)):
                                                        ?>
                                                        <option value="<?= $hehe['id_satuan']?>">
                                                            <?php
                                                                echo $hehe['nama_satuan']
                                                            ?>
                                                        </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Pilih Kategori</label>
                                                    <select class="form-select" name="nkategori">
                                                        <option></option>
                                                        <?php 
                                                            $katekate = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_ktg DESC");
                                                            while($xixi = mysqli_fetch_array($katekate)):
                                                        ?>
                                                        <option value="<?= $xixi['id_ktg']?>">
                                                            <?php 
                                                                echo $xixi['Nama_Kategori']
                                                            ?>
                                                        </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Harga</label>
                                                    <input type="number" class="form-control" min="1" 
                                                    name="nharga"  value="<?= $data['harga']?>">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                            <button type="submit" class="btn btn-primary" name="bubah">Edit</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal EDIT-->
                            <!-- Awal Modal DELETE-->
                            <div class="modal fade" id="deleteModal<?= $no?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Produk</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="CRUD_produk.php">
                                        <input type="hidden" name="idpdk" value="<?= $data['id_produk']?>">
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah Anda yakin menghapus data ini? <br>
                                                <span class="text-danger"><?= $data['id_produk']. "-" . $data['nama_produk']?></span>                                    
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
                            <?php endwhile; ?>
                        </table>

                        <!-- Awal Modal -->
                        <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="CRUD_produk.php">
                                    <div class="modal-body">
                                            <div class="mb-3">
                                            <label class="form-label">Barcode(id)</label>
                                                <input type="text" class="form-control" placeholder="Masukan ID Baru!" name="nid">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Produk</label>
                                                <input type="text" class="form-control" placeholder="Masukan Nama Produk Baru!" name="nproduk">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pilih Satuan</label>
                                                <select class="form-select" name="nsatuan">
                                                        <option></option>
                                                        <?php 
                                                            $satusatu = mysqli_query($conn, "SELECT * FROM satuan ORDER BY id_satuan DESC");
                                                            while($hehe = mysqli_fetch_array($satusatu)):
                                                        ?>
                                                        <option value="<?= $hehe['id_satuan']?>">
                                                            <?php
                                                                echo $hehe['nama_satuan']
                                                            ?>
                                                        </option>
                                                        <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pilih Kategori</label>
                                                <select class="form-select" name="nkategori">
                                                        <option></option>
                                                        <?php 
                                                            $katekate = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_ktg DESC");
                                                            while($xixi = mysqli_fetch_array($katekate)):
                                                        ?>
                                                        <option value="<?= $xixi['id_ktg']?>">
                                                            <?php 
                                                                echo $xixi['Nama_Kategori']
                                                            ?>
                                                        </option>
                                                        <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Harga</label>
                                                <input type="number" class="form-control"
                                                 name="nharga" min="1">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
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
</body>
</html>
