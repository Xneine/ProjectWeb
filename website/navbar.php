<?php
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
    <title>Pegawai</title>
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Cashier</a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ADMIN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="transaksi_p.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle" role="button" aria-expanded="false" aria-controls="submenu1">
                                <i class="bi-speedometer2"></i> <span >Produk</span>
                                <i class="bi bi-caret-down-fill"></i>
                            </a>
                            <div class="collapse" id="submenu1">
                                <ul class="flex-column">
                                    <li>
                                        <a href="//localhost//website/Produk_FINAL/kategori.php" class="nav-link">Kategori
                                        </a>
                                    </li>
                                    <li>
                                        <a href="//localhost//website/Produk_FINAL/satuan.php" class="nav-link">Satuan</a>
                                    </li>
                                    <li>
                                        <a href="//localhost//website/Produk_FINAL/produk.php" class="nav-link">Detail Produk</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle" role="button" aria-expanded="false" aria-controls="submenu1">
                                <i class="bi-speedometer2"></i> <span >Stok</span>
                                <i class="bi bi-caret-down-fill"></i>
                            </a>
                            <div class="collapse" id="submenu2">
                                <ul class="flex-column">
                                    <li>
                                        <a href="//localhost//website/Produk_FINAL/kategori.php" class="nav-link">Stok Masuk
                                        </a>
                                    </li>
                                    <li>
                                        <a href="//localhost//website/Produk_FINAL/satuan.php" class="nav-link">Stok Keluar</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle" role="button" aria-expanded="false" aria-controls="submenu3">
                                <i class="bi-speedometer2"></i> <span >Laporan</span>
                                <i class="bi bi-caret-down-fill"></i>
                            </a>
                            <div class="collapse" id="submenu3">
                                <ul class="flex-column">
                                    <li>
                                        <a href="//localhost//website/Produk_FINAL/kategori.php" class="nav-link">History Transaksi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="//localhost//website/Produk_FINAL/satuan.php" class="nav-link">Data Transaksi</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stok_keluar_p.php">Pengaturan</a>
                        </li>
                        <li class="nav-item position-absolute bottom-0 mb-3">
                            <a href="//localhost//website/logout.php" class="nav-link">
                                <i class="bi bi-power"></i><span class="ms-1 d-none d-sm-inline">logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>